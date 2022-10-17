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
                        <button class="btn btn-warning" onclick="getStockQuoteFromVantage(stock_symbol.value)">Get Price</button>
                </div>
                <div id="continer">
                    <table border="1">
                        <thead><tr><th>Symbol</th><th>high</th><th>low</th><th>price</th></tr></thead>
                        <tbody id="tableBody">
                            @foreach ($stockQuotes as $stockQuote)
                            <tr>
                                <td> {{ $stockQuote->symbol }} </td>
                                <td> {{ $stockQuote->high }} </td>
                                <td> {{ $stockQuote->low }} </td>
                                <td> {{ $stockQuote->price }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getStockQuoteFromVantage(stock_symbol) {
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
                .then((response) => {
                    getStockQuotesFromDB();
                })
            })
            .catch(function (error) {
                console.log(error);
            });            
        }

        function getStockQuotesFromDB() {
            axios.get('/stock_quotes')
            .then(response => {                    
                let tempString = "";
                response.data.forEach(element => {
                    tempString += `<tr>
                        <th>${element['symbol']}</th>
                        <th>${element['high']}</th>
                        <th>${element['low']}</th>
                        <th>${element['price']}</th>
                        </tr>`;
                });
                document.getElementById('tableBody').innerHTML=tempString;
            })
            .catch(error => console.error(error));  
        }
            
    </script>
</x-app-layout>
