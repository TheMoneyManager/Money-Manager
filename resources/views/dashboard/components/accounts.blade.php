<div class="shadow-md h-30">
    <div class="divide-y divide-gray-300">
        <div>
            <p class="text-2xl text-gray-800 ml-10 py-4">Cuentas de banco y tarjetas</p>
        </div>
        <div class="text-center py-2">
            <table class="table-fixed">
                @foreach ($accounts as $account)
                    <tr>
                        <td class="py-6">
                            <img src="/img/visa.png" alt="Visa" class="w-14 ml-5 mr-14">
                        </td>
                        <td>
                            <p class="mr-14">
                                {{ $account->name }} <br>
                                **** **** **** {{$account->card_termination}}
                            </p>
                        </td>
                        <td>
                            <p class="ml-10 text-green-700">
                                ${{ $account->balance }}
                            </p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="text-center py-4">
            <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none hover:bg-green-700 cursor-pointer">
                <a href="{{ route('account.index')}}" class="text-sm">
                    Ver más detalle
                </a>
            </button>
        </div>
    </div>
</div>