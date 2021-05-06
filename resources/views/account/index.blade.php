@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">CUENTAS</h1>
        </div>

        <div class="w-8/12 h-4/6 mx-auto mt-6">
            <div class="py-4">
                <a href="{{ route('account.create') }}" class="text-green-600 underline mb-5 mt-10">Crear nueva cuenta</a>
            </div>
            <table class="w-full border-gray-700 border-2">
                <thead>
                    <tr class="table-fixed bg-gray-200 border-gray-700 border-2">
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">NOMBRE</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">NÚMERO DE TARJETA</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">SALDO</th>
                        <th class="pt-2 pb-2 font-medium border-gray-700 border-2">EDITAR</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($accounts as $account)
                        <tr class="border border-gray-300">
                            <th class="font-normal pt-4 pb-4 w-2/12 border-gray-700 border-2">{{ $account->name}}</th>
                            <th class="font-normal pt-4 pb-4 w-6/12 border-gray-700 border-2">**** **** **** {{substr($account->description, -4)}}</th>
                            <th class="text-green-700 font-medium pt-4 pb-4 w-2/12 border-gray-700 border-2">{{$account->balance}}</th>
                            <th class="w-2/12 border-gray-700 border-2">
                                <a href="{{ route('account.edit', ['account' => $account])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mx-auto text-gray-500" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
