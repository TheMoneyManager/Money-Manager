@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">Registro de Gastos</h1>
        </div>
        <div class="w-6/12 h-4/6 mx-auto mt-10">
            <a class="text-green-600 underline" href="{{ route('expenses.index')}}" class="text-sm">
                Regresar a gastos
            </a>
            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ auth()->user()->id}}" name="user_id">
            <div class="h-4/6 w-full mx-auto">
                <div class="grid grid-cols-2 gap-12">
                    <div class="w-full">
                        <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Cuenta de Origen</h3>
                        <select name="account_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        @foreach ($accounts as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="w-full">
                        <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Monto</h3>
                        <input type="text" placeholder="$300" name="amount" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                    </div>
                </div>

                <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Descripción</h3>
                <textarea name="description" placeholder="Visita al restaurante semanal" cols="30" rows="10" class="w-full rounded-lg bg-gray-100 border-0 inline-block placeholder-gray-400"></textarea>
                <div class="text-right py-5">
                    <a class="text-green-600 underline self-end" href="{{ route('categories.index')}}" class="text-sm">
                        Ver Categorias
                    </a>
                </div>
                <div class="flex mt-3">
                    <p class="text-gray-600 block w-6/12 font-medium text-sm">Categorías de gasto</p>
                    @foreach ($categories as $category)
                        <label class="flex items-center">
                        <input value="{{$category->id}}" name="categories[]" type="checkbox" class="form-checkbox text-green-600 border-solid border-green-600 ml-5 placeholder-gray-400">
                        <span class="ml-2 text-sm">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="text-center py-5">
                <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer">Registrar gasto</button>

                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
