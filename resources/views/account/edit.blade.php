@extends('layouts.sidebar')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="w-10/12 h-20 mx-auto border-b-2 ">
            <h1 class="text-gray-600 font-bold text-4xl pt-5">EDITAR CUENTA</h1>
        </div>

        <div class="w-6/12 h-4/6 mx-auto mt-20">
            <p class="text-green-600 mb-5 mt-10">Regresar a cuentas</p>
            <div class="h-4/6 w-full mx-auto mt-20">
                <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Nombre</h3>
                <input type="text" placeholder="Efectivo" name="name" class="w-full rounded-lg bg-gray-100 border-0 inline-block">

                <h3 class="text-gray-600 block w-2/12 mt-10 font-medium">Descripción</h3>
                <textarea name="descripcion" placeholder="Dinero en la cartera" cols="30" rows="10" class="w-full rounded-lg bg-gray-100 border-0 inline-block"></textarea>

                <h3 class="text-gray-600 inline-block w-2/12 mt-10 font-medium">Nombre</h3>
                <input type="text" placeholder="Efectivo" name="name" class="w-3/12 rounded-lg bg-gray-100 border-0 inline-block mr-96">

                <input type="submit" value="GUARDAR CAMBIOS" class="inline-block w-3/12 h-10 bg-green-600 text-white text-sm mt-10 ml-10">
                <div class="inline-block w-8/12 h-10 text-sm mt-10">
                    <p class="text-red-600 text-sm text-right ">Eliminar cuenta</p>
                </div>
            </div>
        </div>
    </div>
@endsection
