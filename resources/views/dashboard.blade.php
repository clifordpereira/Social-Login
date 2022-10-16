<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Enter a stock symbol (eg: AMZN)
                        <input type="text" id="stock_symbol" name="stock_symbol">
                        <button class="btn btn-warning" onclick="getStockQuote(stock_symbol.value)">Get Price</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getStockQuote(stock_symbol) {
            if ("" == stock_symbol) {
                alert("please enter stock symbol");
                return false;
            }

            axios.get('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=' + stock_symbol + '&apikey=0O18XUJW9P8QVGQJ')
            .then(function (response) {
                axios.post('/stock_quotes/store', {
                    symbol: response.data["Global Quote"]["01. symbol"],
                    high: response.data["Global Quote"]["03. high"],
                    low: response.data["Global Quote"]["04. low"],
                    price: response.data["Global Quote"]["05. price"],
                })
            })
            .catch(function (error) {
                console.log(error);
            });
            
        }        
    </script>
</x-app-layout>
