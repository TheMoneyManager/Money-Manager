@extends('layouts.sidebar')

@section('content')

<div class="container mx-auto">
    @extends('layouts.notification')

    <div class="py-10 divide-y divide-gray-300">
        <div>
            @auth
            <p class="text-4xl py-4 uppercase text-gray-600 font-bold">Bienvenido {{ auth()->user()->name}}</p>
            @endauth
        </div>
        <div></div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="lg:col-span-2 sm:col-span-3">
            <div class="shadow-md">
                <div class="divide-y divide-gray-300">
                    <div>
                        <p class="text-2xl text-gray-800 text-center py-4">Últimos gastos</p>
                    </div>
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
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ date_format($expense->created_at, "d/m/y") }}</td>
                                        <td>{{ $expense->account->name }}</td>
                                        <td>
                                            @foreach ($expense->categories as $category)
                                            {{ $category->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center py-10">
                        <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none">
                            <a href="{{ route('expenses.create')}}" class="text-sm">
                                Registar gasto
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1 sm:col-span-3">
            <div class="shadow-md">
                <div class="divide-y divide-gray-300">
                    <div>
                        <p class="text-2xl text-gray-800 ml-10 py-4">Cuentas de banco y tarjetas</p>
                    </div>
                    <div class="text-center py-2">
                        <table class="table-fixed">
                            @foreach ($accounts as $account)
                                <tr>
                                    <td class="py-6">
                                        <img src="/img/visa.png" alt="Visa" class="w-14 ml-5 mr-14">
                                    </td>
                                    <td>
                                        <p class="mr-14">
                                            {{ $account->name }} <br>
                                            **** **** **** {{substr($account->description, -4)}}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="ml-10">
                                            ${{ $account->balance }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="text-center py-4">
                        <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none">
                            <a href="{{ route('account.index')}}" class="text-sm">
                                Ver más detalle
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1 sm:col-span-3">
            @include('dashboard.components.expenses', ['expenses_count' => $expenses_count])
        </div>
    </div>

</div>
@endsection
