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

                    <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Descripción</h3>
                    <input name="description" placeholder="Dinero en la cartera" value="{{$account->description}}" class="w-full rounded-lg bg-gray-100 border-0 inline-block h-52">

                    <h3 class="text-gray-600 inline-block w-2/12 mt-10 font-medium">Saldo inicial</h3>
                    <input type="text" placeholder="12.00" value="{{$account->balance}}" name="balance" class="w-3/12 rounded-lg bg-gray-100 border-0 inline-block mr-96">

                    <input type="submit" value="GUARDAR CAMBIOS" class="inline-block w-3/12 h-10 bg-green-600 text-white text-sm mt-10 ml-10">
                </form>
                <form action="{{ route('account.destroy', ['account' => $account])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="text-red-600 bg-white w-full text-left hover:text-red-900 mt-10 ml-10" type="submit" value="Eliminar cuenta">
                </form>
            </div>
        </div>
    </div>
@endsection
