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

    @error('file')
        <div class="rounded-md bg-purple-50 p-4">
            <div class="flex">
                <div class="shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-purple-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                    </svg>

                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-purple-800">{{ $message }}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button"
                            class="inline-flex rounded-md bg-purple-50 p-1.5 text-purple-500 hover:bg-purple-100 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2 focus:ring-offset-purple-50">
                            <span class="sr-only">Dismiss</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path
                                    d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @enderror

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

                <button type="submit"
                    class="w-full flex justify-center items-center gap-x-2 rounded-md bg-orange-600 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="-ml-0.5 size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                    </svg>

                    Soumettre
                </button>
            </form>
        </div>
    </main>
</body>

</html>
