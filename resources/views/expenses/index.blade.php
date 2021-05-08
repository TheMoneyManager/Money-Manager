@extends('layouts.sidebar')

@section('content')

<div class="container mx-auto px-6 py-2">
    <div class="py-10 divide-y divide-gray-300">
            <p class="text-4xl uppercase text-gray-600 font-bold">Gastos</p>
        <div></div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-4 self-center divide-y divide-gray-300">
            <div class="py-2">
                    <a class="text-green-600 underline" href="{{ route('expenses.create')}}">
                        Registrar nuevo gasto
                    </a>
            </div>
            <div>
                <div class="py-2">
                    <input type="text" class="w-full border-green-700 border-2" id="expenseSearch" onkeyup="expenseSearchFun()" placeholder="Busca la cuenta deseada para ver sus gastos..." title="Escribe la cuenta que quieres buscar"/>
                </div>
                <table class="table-fixed border-gray-700 border-2" id="expenseTable">
                    <thead>
                    <tr class="bg-gray-200 h-16">
                        <th class="w-2/12 border-gray-700 border-2">FECHA</th>
                        <th class="w-2/12 border-gray-700 border-2">CUENTA DE ORIGEN</th>
                        <th class="w-2/12 border-gray-700 border-2">CATEGORÍAS</th>
                        <th class="w-2/12 border-gray-700 border-2">MONTO</th>
                        <th class="w-4/12 border-gray-700 border-2">DESCRIPCIÓN</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($expenses as $expense)
                            <tr class="border-gray-700 border-2">
                                <td class="border-gray-700 border-2">{{ date_format($expense->created_at, "d/m/y") }}</td>
                                <td class="border-gray-700 border-2">{{ $expense->account->name }}</td>
                                <td class="border-gray-700 border-2">
                                    @foreach ($expense->categories as $category)
                                    {{ $category->name }}
                                    @endforeach
                                </td>
                                <td class="text-green-700 font-medium border-gray-700 border-2">{{ $expense->amount }}</td>
                                <td class="border-gray-700 border-2">{{ $expense->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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

