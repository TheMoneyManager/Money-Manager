@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">CUENTAS</h1>
        </div>

        <div class="w-8/12 h-4/6 mx-auto mt-6">
            <div class="py-4">
                <a href="{{ route('account.create') }}" class="text-green-600 underline mb-5 mt-10">Crear nueva cuenta</a>
            </div>
            <table class="w-full border-gray-700 border-2">
                <thead>
                    <tr class="table-fixed bg-gray-200 border-gray-700 border-2">
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">NOMBRE</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">NÚMERO DE TARJETA</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">SALDO</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">EDITAR</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">COMPARTIR</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">TRANSFERIR</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($accounts as $account)
                        <tr class="border border-gray-300">
                            <th class="font-normal pt-4 pb-4 w-2/12 border-gray-700 border-2">{{ $account->name}}</th>
                            <th class="font-normal pt-4 pb-4 w-4/12 border-gray-700 border-2">**** **** **** {{ $account->card_termination }}</th>
                            <th class="text-green-700 font-medium pt-4 pb-4 w-2/12 border-gray-700 border-2 text-center">${{number_format($account->balance, 2)}} {{ $account->currency->currency }}</th>
                            <th class="w-2/12 border-gray-700 border-2">
                                <a href="{{ route('account.edit', ['account' => $account])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mx-auto text-gray-500" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                            </th>
                            <th class="w-2/12 border-gray-700 border-2">
                                <a href="{{ route('user-account.edit', ['account' => $account])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share mx-auto text-gray-500" viewBox="0 0 16 16">
                                        <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                    </svg>
                                </a>
                            </th>
                            <th class="w-2/12 border-gray-700 border-2">
                                <a href="{{ route('transaction.show', ['id' => $account->id])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share mx-auto text-gray-500" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
                window.Echo.channel('ExpensesChannel').listen('NewExpenseNotification', (e) => {
                    console.log(e);
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
