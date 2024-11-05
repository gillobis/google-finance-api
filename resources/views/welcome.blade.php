<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Google Finance API</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-gray-800 dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
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
                                    <span>https://gfin.gcdev.it/api/AAPL:NASDAQ</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center ">
                                <div class="flex gap-1 text-gray-800 bg-gray-300  font-mono text-sm py-3 px-4  rounded-md">
                                    <span>https://gfin.gcdev.it/api/SWDA:BIT</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center ">
                                <div class="flex gap-1 text-gray-800 bg-gray-300  font-mono text-sm py-3 px-4  rounded-md">
                                    <span>https://gfin.gcdev.it/api/GOOGL:NASDAQ</span>
                                </div>
                            </div>

                            <h1 class="text-2xl  text-gray-900 font-bold mt-10">Returned values</h1>
                            <p class="">If the ticker is wrong or there's no data, the endpoint returns a <b>404</b> status code.</p>
                            <p class="">If everything is correct, the response is a <b>200</b> status code with the json describing the ticker's data.</p>
                            <h3 class="text-xl font-bold">Response fields (json)</h3>
                            <p class="font-mono text-sm text-left lg:max-w-sm">
                                ticker_data<br/>
                                current_price<br/>
                                quote<br/>
                                title<br/>
                            </p>
                        </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Made with ❤️ by <a href="mailto:g.carlevaris@gmail.com">Gilles Carlevaris</a>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
