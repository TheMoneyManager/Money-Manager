@extends('layouts.sidebar')

@section('content')
<div class="container mx-auto px-4 py-4 content-center">
    <div class="border-solid border-b-2 border-gray-300">
        <p class="text-4xl py-4 uppercase text-gray-600 font-bold">Categorias</p>
    </div>

    <div class="w-1/2 mx-auto mt-40">
        <div class="flex items-end grid grid-cols-3 mb-10">
            <a href="{{ route('categories.index') }}" class="text-green-600 underline">Regresar a la lista de categorías</a>
        </div>

        <form action="{{ route('categories.store') }}" method="POST">
            @CSRF
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="grid grid-cols-3 flex items-center ">
                <label for="name">Nombre</label>
                <input type="text" name="name" required class="col-span-2 bg-gray-200  placeholder-gray-400 border-2 border-green-700" placeholder="Nombre de la categoría">
            </div>
            <div class="flex justify-center py-6">
                <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer">Crear categoría</button>
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

