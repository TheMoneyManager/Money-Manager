@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">CUENTAS COMPARTIDAS</h1>
        </div>

        <div class="w-8/12 h-4/6 mx-auto mt-20">
            <table class="w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="pt-2 pb-2 font-medium text-gray-500">NOMBRE</th>
                        <th class="pt-2 pb-2 font-medium text-gray-500">DESCRIPCIÓN</th>
                        <th class="pt-2 pb-2 font-medium text-gray-500">SALDO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr class="border border-gray-300">
                            <th class="text-gray-400 font-normal pt-4 pb-4 w-2/12">{{ $account->name}}</th>
                            <th class="text-left text-gray-400 font-normal pt-4 pb-4 w-6/12">{{$account->description}}</th>
                            <th class="text-green-700 font-medium pt-4 pb-4 w-4/12">{{$account->balance}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
