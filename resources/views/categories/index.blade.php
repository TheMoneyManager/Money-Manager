@extends('layouts.sidebar')

@section('content')

<div class="container mx-auto px-4 py-4 content-center">
    <div class="border-solid border-b-2 border-gray-300">
        <p class="text-4xl py-4 uppercase text-gray-600 font-bold">Categorias</p>
    </div>

    <div class="w-1/2 mx-auto mt-40">
        <div class="flex items-end grid grid-cols-3 mb-10">
            <a href="{{ route('expenses.create') }}" class="text-green-600 underline">Regresar al registro de gasto</a>
            <div class="col-start-3 flex flex-row-reverse">
                <a href="{{ route('categories.create')}}" class="w-auto px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none text-sm uppercase">
                    Nueva categoría
                </a>
            </div>
        </div>

        <table class="table-fixed mx-auto w-full">
            <thead>
            <tr class="bg-gray-100 h-16 grid grid-cols-3 content-center">
                <th class="col-span-2 uppercase">Crear categoría</th>
                <th class="uppercase">Editar</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="grid grid-cols-3">
                        <td class="px-6 py-3 col-span-2">{{ $category->name }}</td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('categories.edit', $category->id) }}">
                                <span class="material-icons text-gray-300">create</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
