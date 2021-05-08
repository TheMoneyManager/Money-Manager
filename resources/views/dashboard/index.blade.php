@extends('layouts.sidebar')

@section('content')

<div class="container mx-auto">
    <div class="py-2 divide-y divide-gray-300">
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
                    <div class="py-2">
                        <div class="py-2">
                            <input type="text" class="w-full border-green-700 border-2" id="expenseSearch" onkeyup="expenseSearchFun()" placeholder="Busca la cuenta deseada para ver sus gastos..." title="Escribe la cuenta que quieres buscar"/>
                        </div>
                        <table class="table-fixed border-green-700 border-2" id="expenseTable">
                            <thead>
                            <tr class="bg-gray-200 h-16">
                                <th class="w-2/12 border-gray-700 border-2">FECHA</th>
                                <th class="w-2/12 border-gray-700 border-2">CUENTA DE ORIGEN</th>
                                <th class="w-2/12 border-gray-700 border-2">CATEGORÍAS</th>
                                <th class="w-2/12 border-gray-700 border-2">MONTO</th>
                                <th class="w-4/12 border-gray-700 border-2">DESCRIPCIÓN</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr class="border-gray-700 border-2">
                                        <td class="border-gray-700 border-2">{{ date_format($expense->created_at, "d/m/y") }}</td>
                                        <td class="border-gray-700 border-2">{{ $expense->account->name }}</td>
                                        <td class="border-gray-700 border-2">
                                            @foreach ($expense->categories as $category)
                                            {{ $category->name }}
                                            @endforeach
                                        </td>
                                        <td class="text-green-700 font-medium border-gray-700 border-2">{{ $expense->amount }}</td>
                                        <td class="border-gray-700 border-2">{{ $expense->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center py-2">
                            <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none hover:bg-green-700 cursor-pointer">
                                <a href="{{ route('expenses.create')}}" class="text-sm">
                                    Registar gasto
                                </a>
                            </button>
                        </div>
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
                                            **** **** **** {{$account->card_termination}}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="ml-10 text-green-700">
                                            ${{ $account->balance }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="text-center py-4">
                        <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none hover:bg-green-700 cursor-pointer">
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
        <div class="lg:col-span-1 sm:col-span-3">
            @include('dashboard.components.expensesChart', ['expenses' => $expenses])
        </div>
    </div>

</div>
@endsection
