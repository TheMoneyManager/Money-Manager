@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">EDITAR CUENTA</h1>
        </div>

        <div class="w-8/12 h-4/6 mx-auto mt-20">
            <h1 id="idAccount" style="visibility: hidden; position: absolute; top: -9999px;">{{$account->id}}</h1>
            <h2 class="text-gray-600 font-bold text-2xl w-6/12 inline-block">{{$account->name}}</h2>
            <a href="{{ route('account.index') }}" class="text-green-600 mt-5 w-6/12 inline-block">Regresar a cuentas</a>

            <div class="h-4/6 w-full mx-auto">
                <h3 class="text-gray-600 inline-block w-2/12 mt-10 font-medium ">Email cuenta: </h3>
                <input id="emailUser" type="text" placeholder="Prueba@correo.com" value="" name="name" class="w-6/12 rounded-lg bg-gray-100 border-0 inline-block">
                <input type="button" value="Crear" onclick="addUser()" class="bg-transparent hover:bg-green-600 text-green-600 font-semibold hover:text-white py-2 px-4 border border-green-600 hover:border-transparent rounded inline-block w-1/12 mx-5">

                <table class="w-full mt-4">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="pt-2 pb-2 font-medium text-gray-500 w-8/12 border-gray-700 border-2">NOMBRE</th>
                            <th class="pt-2 pb-2 font-medium text-gray-500 w-4/12 border-gray-700 border-2">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="row_{{$user->id}}" class="border-gray-700 border-2">
                            <th class="text-gray-400 font-normal pt-4 pb-4 w-8/12 border-gray-700 border-2">{{ $user->email}}</th>
                            <th class="text-gray-400 font-normal pt-4 pb-4 w-4/12 border-gray-700 border-2">
                                <button id="{{$user->id}}" onclick="eliminarUsuario({{$user->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-700 mx-auto" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                </button>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function addUser(){
            let userName = $('#emailUser').val();
            let account_id = $('#idAccount').text();
            $.ajax({
                url: '{{ route('user-account.store') }}',
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: userName,
                    id_account: account_id
                }
            })
            .done(function(response) {
                //console.log(response);
                $('#emailUser').val('');
                let id_res = response.id;
                let email = response.email
                //console.log(id_res + " " + email);
                $('table tbody').append(`
                        <tr id="row_`+id_res+`" class="border-gray-700 border-2">
                            <th class="text-gray-400 font-normal pt-4 pb-4 w-8/12 border-gray-700 border-2">`+  email +`</th>
                            <th class="text-gray-400 font-normal pt-4 pb-4 w-4/12 border-gray-700 border-2">
                                <button id="`+ id_res +`" onclick="terminarTarea()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-red-700 mx-auto" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                </button>
                            </th>
                        </tr>
                `)

            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        }

        function eliminarUsuario(idUser){
            let user_url = '{{ route('user-account.destroy', 0) }}';
            user_url = user_url.replace('0', idUser);
            let row = '#row_' + idUser;
            let account_id = $('#idAccount').text();
            $.ajax({
                url: user_url,
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: idUser,
                    account: account_id
                }
            })
            .done(function(response) {
                //console.log(response["message"] != 'borrado fallido');
                if(response["message"] != 'borrado fallido'){
                    $(row).remove();
                }
            })
            .fail(function(jqXHR, response) {
                console.log('Fallido', response);
            });
        }
    </script>

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
