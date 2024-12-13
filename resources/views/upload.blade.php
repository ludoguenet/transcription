<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.navigation')

    <main class="bg-orange-50 flex items-center justify-center h-[calc(100vh-4rem)]">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-7xl">
            <div class="border-b border-gray-200 pb-5">
                <div class="-ml-2 -mt-2 flex flex-col items-baseline">
                    <h3 class="ml-2 mt-2 text-lg font-semibold text-gray-900">Transcrivez votre podcast</h3>
                    <small class="ml-2 mt-1 truncate text-xs text-gray-500">(poids du fichier max. 2GB)</small>
                </div>
            </div>

            <form action="{{ route('transcribe') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                    <div class="md:flex">
                        <div class="w-full p-3">
                            <div
                                class="relative h-48 rounded-lg border-2 border-yellow-500 bg-gray-50 flex justify-center items-center shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                                <div class="absolute flex flex-col items-center">
                                    <img alt="File Icon" class=" w-12 mb-3" src="{{ asset('podcast.png') }}" />
                                    <span class="block text-gray-500 font-semibold">Déplacez votre fichier ici</span>
                                    <span class="block text-gray-400 font-normal mt-1">ou cliquer pour
                                        téléverser</span>
                                </div>

                                <input name="file" class="h-full w-full opacity-0 cursor-pointer" type="file" />
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button"
                    class="inline-flex items-center gap-x-2 rounded-md bg-orange-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="-ml-0.5 size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                    </svg>
                    Soumettre
                </button>
            </form>
        </div>
    </main>
</body>

</html>
