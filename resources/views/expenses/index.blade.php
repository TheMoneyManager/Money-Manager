@extends('layouts.sidebar')

@section('content')

<div class="container mx-auto px-6 py-2">
    <div class="py-10 divide-y divide-gray-300">
            <p class="text-4xl uppercase text-gray-600 font-bold">Gastos</p>
        <div></div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-4 self-center divide-y divide-gray-300">
            <div class="py-12">
                    <a class="text-green-600 underline" href="{{ route('expenses.create')}}" class="text-sm">
                        Registrar nuevo gasto
                    </a>
            </div>
            <div class="py-12">
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
        </div>
    </div>
</div>

@endsection

