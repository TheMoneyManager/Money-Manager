<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <title>MoneyManager</title>
</head>
<div class="flex h-screen">
    <div class="p-6 border-r w-64 border-gray-200 bg-gray-700">
        <div class="text-center flex mb-8">
            <img src="img/Logo@2x.png" class="h-28 mx-auto">
        </div>
        <div class="text-center flex mb-8">
            @auth
                {{ auth()->user()->name }}
            @endauth
        </div>
        <ul>
            <li class="flex mb-8">
                <span class="self-center text-white">Dashboard</span>
            </li>
            <li class="flex mb-8">
                <span class="self-center text-white">Cuentas</span>
            </li>
            <li class="flex mb-8">
                <span class="self-center text-white">Gastos</span>
            </li>
            <li class="flex mb-8">
                <span class="self-center text-white">Configuración</span>
            </li>
            <div class="text-center flex mt-20">
                <li class="flex mb-8">
                    <a href="{{ route('auth.logout') }}" class="self-center text-white">Cerrar Sesión</a>
                </li>
            </div>
        </ul>
    </div>
    <div class="p-6 w-full">
        @yield('content')
    </div>
</div>
