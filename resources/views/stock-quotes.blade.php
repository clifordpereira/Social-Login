<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock Quotes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table border="1">
                        <tr><th>Symbol</th><th>high</th><th>low</th><th>price</th></tr>
                        @foreach ($stockQuotes as $stockQuote)
                            <tr>
                                <td> {{ $stockQuote->symbol }}</td>
                                <td> {{ $stockQuote->high }}</td>
                                <td> {{ $stockQuote->low }}</td>
                                <td> {{ $stockQuote->price }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
