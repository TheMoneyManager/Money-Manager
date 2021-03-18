@extends('layouts.main')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="text-center">
                <img src="img/Logo@2x.png" class="h-28 mx-auto">
            </div>
            <div class="m-7">
                <form action="{{ route('auth.do-login') }}" method="POST" id="form">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="you@company.com" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Password</label>
                        <input type="password" name="password" id="password" placeholder="**********" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none">Iniciar sesión</button>
                    </div>
                </form>
                <p class="text-base text-center text-green-700">
                    <a class="underline" href="{{ route('auth.register') }}">Crea una cuenta</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
