@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">CONFIGURACIÓN</h1>
        </div>

        <div class="w-8/12 h-4/6 mx-auto mt-20">
            <form action="{{ route('user.destroy', ['user' => $user])}}" method="post">
                @csrf
                @method('DELETE')
                <input class="text-red-600 bg-white w-full text-right hover:text-red-900" type="submit" value="Eliminar cuenta">
            </form>
            <form action="{{ route('user.update', ['user' => $user])}}" method="POST">
                @csrf
                @method('PUT')
                <h3 class="text-gray-600 inline-block w-2/12 mt-10">nombre</h3>
                <input type="text" value="{{$user->name}}" placeholder="John Doe" name="nombre" class="rounded-lg bg-gray-100 border-0 inline-block w-3/12 mt-10">

                <h3 class="text-gray-600 inline-block ml-36 w-2/12 mt-10">Nueva Contraseña</h3>
                <input type="password" placeholder="●●●●●●●" name="nuevaContrasenia" class="rounded-lg bg-gray-100 border-0 inline-block w-3/12 mt-10">

                <h3 class="text-gray-600 inline-block w-2/12 mt-10">E-mail</h3>
                <input type="email" value="{{$user->email}}" placeholder="error@mail.com" name="email" class="rounded-lg bg-gray-100 border-0 inline-block w-3/12 mt-10">

                <h3 class="text-gray-600 inline-block ml-36 w-2/12 mt-10">Confirmar Contraseña</h3>
                <input type="password" placeholder="●●●●●●●" name="confirmacionContrasenia" class="rounded-lg bg-gray-100 border-0 inline-block w-3/12 mt-10">

                <input type="submit" value="GUARDAR CAMBIOS" class="block w-2/12 h-10 bg-green-700 text-white mt-24 mx-auto text-sm">
            </form>
        </div>
    </div>
@endsection
