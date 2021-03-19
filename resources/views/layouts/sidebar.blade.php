@extends('layouts.header')

<div class="flex h-screen">
    <div class="p-6 border-r w-64 border-gray-200 bg-gray-700">
        <div class="text-center flex mb-8">
            <img src="img/Logo@2x.png" class="h-28 mx-auto">
        </div>
        <div class="self-center uppercase flex mb-16 text-white">
            @auth
                {{ auth()->user()->name }}
            @endauth
        </div>
        <ul>
            <li class="flex mb-8">
                <a href="{{ route('dashboard.index') }}" class="self-center uppercase text-white">Dashboard</a>
            </li>
            <li class="flex mb-8">
                <span class="self-center uppercase text-white">Cuentas</span>
            </li>
            <li class="flex mb-8">
                <a href="{{ route('expenses.index') }}" class="self-center uppercase text-white">Gastos</a>
            </li>
            <li class="flex mb-8">
                <span class="self-center uppercase text-white">Configuración</span>
            </li>
            <div class="text-center flex mt-20">
                <li class="flex mb-8">
                    <a href="{{ route('auth.logout') }}" class="self-center uppercase text-white">Cerrar Sesión</a>
                </li>
            </div>
        </ul>
    </div>
    <div class="p-6 w-full">
        @yield('content')
    </div>
</div>
