@extends('layouts.main')

@section('content')
{{-- TODO: Agregar sidebar --}}


<div class="container mx-auto px-4 py-4">



    <div class="py-10 divide-y divide-gray-300">
        <div>
            @auth
            <p class="text-4xl uppercase text-gray-600 font-bold">Bienvenido {{ auth()->user()->name}}</p>
            @endauth
        </div>
        <div></div>
    </div>
    
    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-2 divide-y divide-gray-300">
            <p class="text-3xl uppercase text-gray-400">Últimos gastos</p>
            <div class="py-10">
                <table class="table-fixed">
                    <thead>
                    <tr class="bg-gray-100 h-16">
                        <th class="w-2/12">FECHA</th>
                        <th class="w-2/12">CUENTA DE ORIGEN</th>
                        <th class="w-2/12">CATEGORÍAS</th>
                        <th class="w-2/12">MONTO</th>
                        <th class="w-4/12">DESCRIPCIÓN</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $item)
                            <tr>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->account }}</td>
                                <td>{{ $item->categorie  }}</td> 
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none">
                {{-- <a href="{{ route('auth.login')}}">
                REGISTRAR GASTO
                </a> --}}
            </button>
        </div>
        <div class="col-span-1">
            <h2>Balance de cuentas</h2>
        </div>
    </div>
</div>
@endsection