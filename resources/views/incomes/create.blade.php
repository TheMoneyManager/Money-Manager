@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">Registro de Ingresos</h1>
        </div>
        <div class="w-6/12 h-4/6 mx-auto mt-10">
            <a class="text-green-600 underline" href="{{ route('incomes.index')}}" class="text-sm">
                Regresar a ingresos
            </a>
            <form action="{{ route('incomes.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ auth()->user()->id}}" name="user_id">
            <div class="h-4/6 w-full mx-auto">
                <div class="grid grid-cols-2 gap-12">
                    <div class="w-full">
                        <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Cuenta de Origen</h3>
                        <select required name="account_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        @foreach ($accounts as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                        @foreach ($shared_accounts as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="w-full">
                        <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Monto</h3>
                        <input required type="text" placeholder="$300" name="amount" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                    </div>
                </div>

                <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Descripci??n</h3>
                <textarea name="description" placeholder="Salario quincenal" cols="30" rows="10" class="w-full rounded-lg bg-gray-200 border-0 inline-block placeholder-gray-400"></textarea>
                <div class="text-center py-5">
                    <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer">Registrar ingreso</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
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
