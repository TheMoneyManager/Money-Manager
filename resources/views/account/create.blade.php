@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">CREAR CUENTA</h1>
        </div>

        <div class="w-6/12 h-4/6 mx-auto mt-20">
            <a href="{{ route('account.index') }}" class="text-green-600 mb-5 mt-10">Regresar a cuentas</a>
            <div class="h-4/6 w-full mx-auto mt-20">
                <form action="{{ route('account.store')}}" method="POST">
                    @csrf
                    <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Nombre</h3>
                    <input type="text" placeholder="Efectivo" name="name" class="w-full rounded-lg bg-gray-100 border-0 inline-block">

                    <div class="grid grid-cols-2 gap-12">
                        <div class="w-full">
                            <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Tipo de Moneda</h3>
                            <select name="currency_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                @foreach ($currencies as $currency)
                                        <option value="{{$currency->id}}">{{ $currency->currency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Saldo inicial</h3>
                            <input type="text" placeholder="$300" name="balance" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-12">
                        <div class="w-full">
                            <h3 class="text-gray-600 block w-6/12 mt-10 font-medium">Terminación de Tarjeta</h3>
                            <input type="text" placeholder="9998" name="card_termination" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 placeholder-gray-400">
                        </div>
                    </div>

                    <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Descripción</h3>
                    <textarea name="description" placeholder="Dinero en la cartera" cols="30" rows="10" class="w-full rounded-lg bg-gray-100 border-0 inline-block"></textarea>

                    <input type="submit" value="GUARDAR CAMBIOS" class="inline-block w-3/12 h-10 bg-green-600 text-white text-sm mt-10 ml-10">
                </form>
            </div>
        </div>
    </div>
@endsection
