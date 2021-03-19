@extends('layouts.sidebar')

@section('content')

<div class="container mx-auto">
    <div class="py-10 divide-y divide-gray-300">
        <div>
            @auth
            <p class="text-4xl py-4 uppercase text-gray-600 font-bold">Bienvenido {{ auth()->user()->name}}</p>
            @endauth
        </div>
        <div></div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-2 divide-y divide-gray-300">
            <p class="text-3xl uppercase text-gray-400 text-center py-4">Últimos gastos</p>
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
                                <td>{{ $item->category  }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center py-10">
                <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none">
                    <a href="{{ route('auth.register')}}" class="text-sm">
                        REGISTRAR GASTO
                    </a>
                </button>
            </div>
        </div>
        <div class="col-span-1 divide-y divide-gray-300 ">
                <p class="text-3xl uppercase text-gray-400 text-center py-4">Balance de cuentas</p>
                <div class="py-10">
                    <table class="table-fixed">
                        <thead>
                        <tr class="bg-gray-100 h-16">
                            <th class="w-2/12">NOMBRE</th>
                            <th class="w-2/12">SALDO</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Efectivo</td>
                                <td>300</td>
                            </tr>
                            {{-- @foreach ($expenses as $item)
                                <tr>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->account }}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection
