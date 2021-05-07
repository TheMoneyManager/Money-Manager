@extends('layouts.sidebar_sp')

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
                        <p class="text-2xl text-gray-800 text-center py-4">Usuarios registrados</p>
                    </div>
                    {{-- <div class="py-2">
                        <table class="table-fixed border-green-700 border-2" id="expenseTable">
                            <thead>
                            <tr class="bg-gray-200 h-16">
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>

</div>
@endsection
