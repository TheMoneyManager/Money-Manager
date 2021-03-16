@extends('layouts.main')

@section('content')
{{-- TODO: Agregar sidebar --}}

<div class="container mx-auto">
    @auth
    <h1>BIENVENIDO {{ auth()->user()->name}}</h1>
    @endauth

    <div class="grid grid-cols-2 gap-6">
        <div>
            <h2>Últimos gastos</h2>
            <table class="table-auto">
                <thead>
                <tr>
                    <th>FECHA</th>
                    <th>CUENTA DE ORIGEN</th>
                    <th>CATEGORÍAS</th>
                    <th>MONTO</th>
                    <th>DESCRIPCIÓN</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->account_id }}</td>
                            <td>{{ $item->categories_expenses  }}</td> 
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none">REGISTRAR GASTO</button>
        </div>
        <div>
            <h2>Balance de cuentas</h2>
        </div>
    </div>

</div>
@endsection