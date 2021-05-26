@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 id="idAccount" style="visibility: hidden; position: absolute; top: -9999px;">{{$account->id}}</h1>
            <h1 class="text-gray-600 font-bold text-4xl pt-5">TRANSFERIR DE CUENTA {{ strtoupper($account->name) }}</h1>
        </div>

        <div class="w-8/12 h-4/6 mx-auto mt-20">
            <a href="{{ route('account.index') }}" class="text-green-600 mb-5 mt-10">Regresar a cuentas</a>

            <div class="h-4/6 w-full mx-auto">
                <h2 class="text-gray-600 block w-full mt-10 font-medium">Nombre de cuenta: {{ $account->name }} </h2>
                <hr class="border-gray-900">
                <h3 class="text-gray-600 block w-12/12 mt-10 font-medium">Usuario a transferir:</h3>
                <div class="space-x-3">
                    <input type="email" placeholder="correor@test.com" value="" name="email" id="emailAccount" class="inline-block appearance-none w-7/12 bg-gray-200 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                    <input type="button" value="Buscar usuario" class="w-4/12 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer inline-block" onclick="buscarUsuario()">
                </div>
                <div id="cuentasDestinatario" style="display: none;">
                    <h3 class="text-gray-600 block w-12/12 mt-10 font-medium text-center">Cuentas</h3>
                    <select name="select" id="destinationAccount" class="block appearance-none w-7/12 mx-auto bg-gray-200 border border-gray-300 text-gray-700 py-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </select>
                </div>
                <div id="cantidadTransferir" style="display: none;">
                    <h3 class="text-gray-600 block w-12/12 mt-10 font-medium">Cantidad a transferir:</h3>
                    <div class="space-x-3">
                        <input type="text" placeholder="$300" name="balance" id="balance" class="inline-block appearance-none w-6/12 bg-gray-200 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                        <h3 class="text-gray-600 inline-block w-1/12 mt-10 font-medium">{{ $account->currency->currency }}</h3>
                        <input type="button" value="Agregar Cantidad" class="w-4/12 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer inline-block" onclick="agregarCantidad({{$account->balance}})">
                    </div>
                    <h3 class="block w-12/12 font-medium text-red-600">Cantidad a maxima: ${{number_format($account->balance, 2)}} {{ $account->currency->currency }}</h3>
                </div>
                <div id="operacion" class="border-2 border-green-500 w-full mt-10" style="display: none;">
                    <h2 class="text-gray-600 block w-full my-4 font-medium text-center">Tranferencia</h2>
                    <hr class="border-gray-900">
                    <div class="h-34">
                        <p class="text-gray-600 block w-full my-4 font-medium text-center"> Tranferencia de tu cuenta <b>{{ strtoupper($account->name) }}</b> a la cuenta <b id="nombreCuentaDestino"></b></p>
                        <p class="text-gray-600 block w-full my-4 font-medium text-center"> total de <b id="cantidadTrans"></b></p>
                        <input type="button" value="Aceptar transferencia" class="w-4/12 py-2 mb-2 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer block mx-auto" onclick="acceptarTransaccion()">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function buscarUsuario(){
            let email = $('#emailAccount').val();
            //console.log(email);
            $.ajax({
                url: '{{ route('transaction.destination') }}',
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email_user: email
                }
            })
            .done(function(response) {
                //console.log(response);
                var x = document.getElementById("cuentasDestinatario");
                x.style.display = "block";
                for (var key in response) {
                    if (response.hasOwnProperty(key)) {
                        id = response[key]['id'];
                        name = response[key]['name'];
                        $('#destinationAccount').append(`<option value="${id}_${name}">${name}</option>`);
                    }
                }
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        }


        const selectElement = document.querySelector('#destinationAccount');
        var idDestination_account = -1;
        var nameDestination_account = "";
        var cantidadTrans = 0;

        selectElement.addEventListener('change', (event) => {
            var x = document.getElementById("cantidadTransferir");
            x.style.display = "block";

            valueSelect = event.target.value.split("_");
            idDestination_account = valueSelect[0];
            nameDestination_account = valueSelect[1];
            $('#nombreCuentaDestino').text(nameDestination_account);
        });

        function agregarCantidad(cantidadMax){
            cantidadTrans = $('#balance').val();
            if(cantidadTrans > cantidadMax){
                cantidadTrans = 0;
                alert("La cantidad maxima a transferir es: " + new Intl.NumberFormat().format(cantidadMax));
            }else{
                $('#cantidadTrans').text("$ " + new Intl.NumberFormat().format(cantidadTrans));
                var x = document.getElementById("operacion");
                x.style.display = "block";
            }
        }

        function acceptarTransaccion(){
            idAccount = $('#idAccount').text();

            $.ajax({
                url: '{{ route('transaction.store') }}',
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    origin: idAccount,
                    destination: idDestination_account,
                    email_destination: nameDestination_account,
                    amount: cantidadTrans
                }
            })
            .done(function(response) {
                alert("Transacción exitosa");
                location.reload();
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        }

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
