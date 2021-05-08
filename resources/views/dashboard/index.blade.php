@extends('layouts.sidebar')

@section('content')
    <div class="py-2 divide-y divide-gray-300 mb-8">
        <div>
            @auth
            <p class="text-4xl py-4 uppercase text-gray-600 font-bold">Bienvenido {{ auth()->user()->name}}</p>
            @endauth
        </div>
        <div></div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="lg:col-span-2 sm:col-span-3">
            @include('dashboard.components.expensesChart', ['expenses' => $expenses])
        </div>
        <div class="lg:col-span-1 sm:col-span-3">
            @include('dashboard.components.expenses', ['expenses_count' => $expenses_count])
        </div>
        <div class="lg:col-span-2 sm:col-span-3">
            @include('dashboard.components.last_expenses', ['expenses' => $expenses])
        </div>
        <div class="lg:col-span-1 sm:col-span-3">
            @include('dashboard.components.accounts', ['accounts' => $accounts])
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
