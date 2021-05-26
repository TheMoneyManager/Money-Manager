@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">EDITAR CUENTA</h1>
        </div>

        <div class="w-6/12 h-4/6 mx-auto mt-20">
            <a href="{{ route('account.index') }}" class="text-green-600 mb-5 mt-10">Regresar a cuentas</a>

            <div class="h-4/6 w-full mx-auto">
                <form action="{{ route('account.update', ['account' => $account])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Nombre</h3>
                    <input type="text" placeholder="Efectivo" value="{{$account->name}}" name="name" class="w-full rounded-lg bg-gray-100 border-0 inline-block">

                    <div class="grid grid-cols-2 gap-12">
                        <div class="w-full">
                            <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Saldo</h3>
                            <input type="text" placeholder="$300" value="{{ $account->balance }}" name="balance" id="balance" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                        </div>
                        <div class="w-full">
                            <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Terminación de Tarjeta</h3>
                            <input type="text" placeholder="9998" value="{{ $account->card_termination }}" name="card_termination" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-12">
                        <div class="w-full">
                            <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Tipo de Moneda</h3>
                            <select name="currency_id" id="currency_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                @foreach ($currencies as $currency)
                                        <option value="{{$currency->currency}}" @if ($account->currency_id == $currency->id) selected="selected" @endif>
                                            {{ $currency->currency }}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Descripción</h3>
                    <input name="description" placeholder="Dinero en la cartera" value="{{$account->description}}" class="w-full rounded-lg bg-gray-100 border-0 inline-block h-52">

                    <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer">Guardar cambios</button>
                </form>
                <form action="{{ route('account.destroy', ['account' => $account])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="text-red-600 bg-white w-full text-left hover:text-red-900 mt-10 ml-10" type="submit" value="Eliminar cuenta">
                </form>
            </div>
        </div>
    </div>

    <script>
        const selectElement = document.querySelector('#currency_id');
        let source = selectElement.value;
        console.log(source);

        selectElement.addEventListener('change', (event) => {
            let destination = event.target.value;
            let amount = $('#balance').val();

            $.ajax({
                url: '{{ route('account.conversion') }}',
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    source_currency: source,
                    destination_currency: destination,
                    amount: amount
                }
            })
            .done(function(response) {
                console.log(response['rates'][destination]['rate_for_amount']);
                $('#balance').val(response['rates'][destination]['rate_for_amount']);
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });


        });


        $(document).ready(function() {
                //console.log("ando ready");
                window.Echo.channel('ExpensesChannel').listen('NewExpenseNotification', (e) => {
                    if(e.account.user_id == {{auth()->user()->id}}){
                        $('#mensajeNoti').text("se hizo un gasto de " + e.expense.amount + "$ en tu cuenta " + e.account.name);
                        document.getElementById('notification').style.visibility="visible";
                        setTimeout(function() {
                            document.getElementById('notification').style.visibility="hidden";
                        }, 5000);
                    }else{
                        e.users.forEach(user => {
                            if(user.id == {{auth()->user()->id}}){
                                $('#mensajeNoti').text("se hizo un gasto de " + e.expense.amount + "$ en tu cuenta COMPARTIDA " + e.account.name);
                                document.getElementById('notification').style.visibility="visible";
                                setTimeout(function() {
                                    document.getElementById('notification').style.visibility="hidden";
                                }, 5000);
                            }
                        });
                    }
                });
            });
    </script>
@endsection
