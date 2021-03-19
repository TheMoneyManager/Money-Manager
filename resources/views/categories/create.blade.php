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
            <div class="grid grid-cols-3 flex items-center">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="col-span-2 bg-gray-100  placeholder-gray-400 border-0" placeholder="Nombre de la categoría">
            </div>
            <div class="flex justify-center">
                <input type="submit" value="Crear categoría" class="w-auto inline-block px-3 py-4 mt-20 text-white bg-green-600 focus:bg-green-500 focus:outline-none text-sm font-bold uppercase" >
            </div>
        </form>
    </div>
</div>

@endsection

