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

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @CSRF
            @method('PUT')
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="grid grid-cols-3 flex items-center">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="col-span-2 bg-gray-100  placeholder-gray-400 border-0" placeholder="{{ $category->name }}">
            </div>
            <div class="grid grid-cols-3">
                <div class="flex justify-center">
                    <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer">Guardar cambios</button>
                </div>
        </form>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="col-start-3 flex flex-col-reverse flex-row-reverse">
                    @CSRF
                    @method('DELETE')
                    <input type="submit" value="Eliminar categoría" class="bg-transparent text-red-400 underline text-right cursor-pointer">
                </form>
            </div>
    </div>
</div>

@endsection

