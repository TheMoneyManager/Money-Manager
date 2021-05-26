@extends('layouts.header_wo')

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
                        <button type="submit" class="w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none hover:bg-green-600 cursor-pointer">Iniciar sesión</button>
                    </div>
                </form>
                <div class="mb-6">
                    <a href="/sign-in/github">
                        {{-- <button class="w-full px-3 py-4 text-white bg-gray-500 rounded-md focus:bg-gray-600 focus:outline-none">
                            Iniciar sesión con Github
                        </button> --}}
                        <button type="submit" class="w-full flex px-3 justify-center py-4 bg-gray-500 text-white hover:bg-gray-400 p-2 rounded w-auto">
                            <svg class="fill-current text-white-600 mr-3" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            <span>  Iniciar sesión con Github</span>
                          </button>
                    </a>
                </div>
                <p class="text-base text-center text-green-700">
                    <a class="underline" href="{{ route('auth.register') }}">Crea una cuenta</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
