@extends('layouts.sidebar')

@section('content')
    <div class="py-2 divide-y divide-gray-300 mb-8">
        <div>
            @auth
            <p class="text-4xl py-4 uppercase text-gray-600 font-bold">Bienvenido {{ auth()->user()->name}}</p>
            @endauth
        </div>
        <div></div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="lg:col-span-2 sm:col-span-3">
            @include('dashboard.components.expensesChart', ['expenses' => $expenses])
        </div>
        <div class="lg:col-span-1 sm:col-span-3">
            @include('dashboard.components.expenses', ['expenses_count' => $expenses_count])
        </div>
        <div class="lg:col-span-2 sm:col-span-3">
            @include('dashboard.components.last_expenses', ['expenses' => $expenses])
        </div>
        <div class="lg:col-span-1 sm:col-span-3">
            @include('dashboard.components.accounts', ['accounts' => $accounts])
        </div>
    </div>

@endsection
