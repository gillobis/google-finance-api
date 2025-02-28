<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="A simple and fast API to retrieve Google Finance data">

    <title>Google Finance API</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BEZTJRZ76X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BEZTJRZ76X');
    </script>


</head>

<body data-pan="welcome-page" class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-gray-800 dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full ">
                <header class="grid grid-cols-1 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex flex-col lg:justify-center lg:col-start-2 text-center">
                        <h1 class="text-6xl  text-white font-bold">Google finance API</h1>
                        <h2 class="text-xl mt-5">A simple and fast API to retrieve Google Finance data</h2>
                    </div>
                </header>

                <main class="mt-6 bg-white p-6 text-black">
                    <div class="grid gap-6 lg:grid-cols-1 lg:gap-8 text-center justify-center">
                        <h1 class="text-2xl  text-gray-900 font-bold">How it works?</h1>
                        <div class="flex items-center justify-center ">
                            <div class="flex text-gray-800 bg-gray-300  font-mono text-sm py-3 px-4  rounded-md">
                                <span>https://gfin.gcdev.it/api/</span><span class="font-bold">{ticker}</span>
                            </div>
                        </div>

                        <h2 class="text-xl  text-gray-900 font-bold">Examples</h2>
                        <div class="flex items-center justify-center ">
                            <div class="flex gap-1 text-gray-800 bg-gray-300  font-mono text-sm py-3 px-4  rounded-md">
                                <a class="hover:font-bold" href="https://gfin.gcdev.it/api/AAPL:NASDAQ"
                                    target="_blank">https://gfin.gcdev.it/api/AAPL:NASDAQ</a>
                            </div>
                        </div>
                        <div class="flex items-center justify-center ">
                            <div class="flex gap-1 text-gray-800 bg-gray-300  font-mono text-sm py-3 px-4  rounded-md">
                                <a class="hover:font-bold" href="https://gfin.gcdev.it/api/SWDA:BIT"
                                    target="_blank">https://gfin.gcdev.it/api/SWDA:BIT</a>
                            </div>
                        </div>
                        <div class="flex items-center justify-center ">
                            <div class="flex gap-1 text-gray-800 bg-gray-300  font-mono text-sm py-3 px-4  rounded-md">
                                <a class="hover:font-bold" href="https://gfin.gcdev.it/api/GOOGL:NASDAQ"
                                    target="_blank">https://gfin.gcdev.it/api/GOOGL:NASDAQ</a>
                            </div>
                        </div>

                        <h1 class="text-2xl  text-gray-900 font-bold mt-10">Response</h1>
                        <p class="">If the ticker is wrong or there's no data, the endpoint returns a <b>404</b>
                            status code.</p>
                        <p class="">If everything is correct, the response is a <b>200</b> status code with the
                            json describing the ticker's data.</p>
                        <h3 class="text-lg font-bold">JSON schema</h3>
                        <div class="lg:max-w-xl mx-auto bg-gray-300 p-10 shadow-md rounded overflow-hidden">
                            <pre class="font-mono text-sm text-left whitespace-pre-wrap ">{
    "ticker_data": {
        "current_price":"$234.93",
        "quote":"AAPL:NASDAQ",
        "title":"Apple Inc"
    },
    "about_panel": {
        "previous_close":"$235.06",
        "day_range":"$233.81 - $235.69",
        "year_range":"$164.08 - $237.49",
        "market_cap":"3.47T USD",
        "avg_volume":"44.11M",
        "p\/e_ratio":"38.62",
        "dividend_yield":"0.43%",
        "primary_exchange":"NASDAQ",
        "ceo":"Tim CookTim Cook",
        "founded":"Apr 1, 1976",
        "headquarters":"Cupertino, CaliforniaUnited States",
        "website":"apple.com",
        "employees":"164,000",
        "description":"Apple Inc. is an American multinational corporation and technology company headquartered and incorporated in Cupertino, California, in Silicon Valley.",
        "extensions":"Stock"
    },
    "finance_performance":{
        "table":{
            "Free cash flow":{
                "Sep 2024infoFiscal Q4 2024 ended 9/28/24. Reported on 10/31/24.":"34.54B",
                "Y/Y change":"180.60%"
            }
        }
    }
}</pre>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    &copy; {{ date('Y') }} - Made with ❤️ by <a href="mailto:g.carlevaris@gmail.com">Gilles
                        Carlevaris</a>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
