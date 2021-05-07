@extends('layouts.header')

@section("sidebar_sp")
<div class="p-6 border-r w-64 border-gray-200 bg-gray-700">
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
        <div class="text-center flex mt-20">
            <li class="flex mb-8">
                <a href="{{ route('auth.logout') }}" class="self-center text-white hover:text-red-700">Cerrar Sesión</a>
            </li>
        </div>
    </ul>
</div>
@endsection

