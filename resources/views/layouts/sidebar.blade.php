@extends('layouts.header')

@section("sidebar")
<div class="w-2/12 bg-gray-700 rounded p-8 shadow-lg border-gray-200 border-r">
    <div class="flex items-center space-x-4 p-2 mb-5">
        <div class="mx-auto my-0">
            <img src="/img/Logo@2x.png" class="h-28 mx-auto"> <br/>
        </div>
    </div>
    <div class="space-y-2 mb-10 text-center">
        <h4 class="font-semibold text-lg text-white capitalize font-poppins tracking-wide">
            @auth
                {{ auth()->user()->name }}
            @endauth
        </h4>
    </div>
    <ul>
        <li class="flex mb-8">
            <a href="{{ route('dashboard.index') }}" class="self-center text-white hover:text-green-700">Dashboard</a>
        </li>
        <li class="flex mb-8">
            <a href="{{ route('account.index') }}" class="self-center text-white hover:text-green-700">Cuentas</a>
        </li>
        <li class="flex mb-8">
            <a href="{{ route('user-account.index') }}" class="self-center text-white hover:text-green-700">Cuentas compartidas</a>
        </li>
        <li class="flex mb-8">
            <a href="{{ route('expenses.index') }}" class="self-center text-white hover:text-green-700">Gastos</a>
        </li>
        <li class="flex mb-8">
            <a href="{{ route('user.index') }}" class="self-center text-white hover:text-green-700">Configuración</a>
        </li>
        <div class="text-center flex mt-20">
            <li class="flex mb-8">
                <a href="{{ route('auth.logout') }}" class="self-center text-white hover:text-red-700">Cerrar Sesión</a>
            </li>
        </div>
    </ul>
</div>
    {{-- <div class="p-6 border-r w-64 border-gray-200 bg-gray-700 h-full md:h-full">
        <div class="text-center flex mb-8">
            <img src="/img/Logo@2x.png" class="h-28 mx-auto">
        </div>

        <div class="self-center uppercase flex mb-16 text-white">
            @auth
                {{ auth()->user()->name }}
            @endauth
        </div>

        <ul>
            <li class="flex mb-8">
                <a href="{{ route('dashboard.index') }}" class="self-center text-white hover:text-green-700">Dashboard</a>
            </li>
            <li class="flex mb-8">
                <a href="{{ route('account.index') }}" class="self-center text-white hover:text-green-700">Cuentas</a>
            </li>
            <li class="flex mb-8">
                <a href="{{ route('user-account.index') }}" class="self-center text-white hover:text-green-700">Cuentas compartidas</a>
            </li>
            <li class="flex mb-8">
                <a href="{{ route('expenses.index') }}" class="self-center text-white hover:text-green-700">Gastos</a>
            </li>
            <li class="flex mb-8">
                <a href="{{ route('user.index') }}" class="self-center text-white hover:text-green-700">Configuración</a>
            </li>
            <div class="text-center flex mt-20">
                <li class="flex mb-8">
                    <a href="{{ route('auth.logout') }}" class="self-center text-white hover:text-red-700">Cerrar Sesión</a>
                </li>
            </div>
        </ul>
    </div> --}}
    {{-- <div class="flex items-center space-x-4 p-2 mb-5">
        <div>
            <h4 class="font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide">James Bhatta</h4>
            <span class="text-sm tracking-wide flex items-center space-x-1">
                <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg><span class="text-gray-600">Verified</span>
            </span>
        </div>
    </div> --}}
@endsection
