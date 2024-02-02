<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="logo.ico" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-orange-500">
        <section class="h-screen">
            <div class="h-full">
              <!-- Left column container with background-->
              <div
                class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div
                  class="shrink-1 mb-2 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                  <img
                    src="logo2.png"
                    class=""
                    alt="Sample image" />
                </div>

                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12 justify-center items-center flex flex-col">
                    <div>
                        <img class="block w-48 fill-current" src="logo2.png" alt="cuidadoo">
                    </div>
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg justify-items-end">
                        {{ $slot }}
                    </div>
                </div>
              </div>
            </div>
          </section>
    </body>
</html>
