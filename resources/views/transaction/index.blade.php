@extends('layouts.sidebar')

@section('content')

<div class="container mx-auto px-4 py-4">
    <div class="w-10/12 h-20 mx-auto border-b-2 ">
        <h1 class="text-gray-600 font-bold text-4xl pt-5">TRANSACCIONES</h1>
    </div>

    <div class="w-8/12 h-4/6 mx-auto mt-6">
        <div class="py-2">
            <input type="text" class="w-full border-green-700 border-2" id="expenseSearch" onkeyup="expenseSearchFun()" placeholder="Busca la cuenta deseada para ver sus transacciones..." title="Escribe la cuenta que quieres buscar"/>
        </div>
        <table class="w-full border-gray-700 border-2" id="expenseTable">
            <thead>
                <tr class="table-fixed bg-gray-200 border-gray-700 border-2">
                    <th class="pt-2 pb-2 font-medium border-gray-700 border-2">ID CUENTA ORIGEN</th>
                    <th class="pt-2 pb-2 font-medium border-gray-700 border-2">NOMBRE CUENTA ORIGEN</th>
                    <th class="pt-2 pb-2 font-medium border-gray-700 border-2">NOMBRE CUENTA DESTINO</th>
                    <th class="pt-2 pb-2 font-medium border-gray-700 border-2">CANTIDAD</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($transactions as $transaction)
                    <tr class="border border-gray-300">
                        <td class="font-normal pt-4 pb-4 w-2/12 border-gray-700 border-2">{{ $transaction->id_CuentaOrigen}}</td>
                        <td class="font-normal pt-4 pb-4 w-4/12 border-gray-700 border-2">{{ $accounts[$transaction->id]['name'] }}</td>
                        <td class="font-normal pt-4 pb-4 w-4/12 border-gray-700 border-2">{{ $transaction->addresee }}</td>
                        <td class="font-normal pt-4 pb-4 w-4/12 border-gray-700 border-2 text-red-600">- ${{number_format($transaction->amount, 2)}}</td>
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
