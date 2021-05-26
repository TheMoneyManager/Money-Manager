<div class="shadow-md">
    <div class="divide-y divide-gray-300">
        <div>
            <p class="text-2xl text-gray-800 text-center py-4">Últimos gastos</p>
        </div>
        <div class="py-2">
            <div class="py-2">
                <input type="text" class="w-full border-green-700 border-2" id="expenseSearch" onkeyup="expenseSearchFun()" placeholder="Busca la cuenta deseada para ver sus gastos..." title="Escribe la cuenta que quieres buscar"/>
            </div>
            <table class="table-fixed border-green-700 border-2" id="expenseTable">
                <thead>
                <tr class="bg-gray-200 h-16">
                    <th class="w-2/12 border-gray-700 border-2">FECHA</th>
                    <th class="w-2/12 border-gray-700 border-2">CUENTA DE ORIGEN</th>
                    <th class="w-2/12 border-gray-700 border-2">CATEGORÍAS</th>
                    <th class="w-2/12 border-gray-700 border-2">MONTO</th>
                    <th class="w-4/12 border-gray-700 border-2">DESCRIPCIÓN</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                        <tr class="border-gray-700 border-2">
                            <td class="border-gray-700 border-2">{{ date_format($expense->created_at, "d/m/y") }}</td>
                            <td class="border-gray-700 border-2">{{ $expense->account->name }}</td>
                            <td class="border-gray-700 border-2">
                                @foreach ($expense->categories as $category)
                                {{ $category->name }}
                                @endforeach
                            </td>
                            <td class="text-green-700 font-medium border-gray-700 border-2 text-center">${{ number_format($expense->amount, 2) }}</td>
                            <td class="border-gray-700 border-2">{{ $expense->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center py-2">
                <button type="submit" class="px-3 py-4 text-white bg-green-600 focus:bg-green-500 focus:outline-none hover:bg-green-700 cursor-pointer">
                    <a href="{{ route('expenses.create')}}" class="text-sm">
                        Registar gasto
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>
