<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                </div>
            </div>
        </div> --}}

        <div
            class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md mx-auto dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class=" rounded-t-xl object-cover h-48 w-96 p-2 mb-3" src="{{ $post->image }}"
                    alt="{{ $post->title }}">
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400"> {!! $post->body !!} </p>

                <div class="flex justify-between items-center mt-4">
                    <p><span class="text-sm  text-gray-600 dark:text-white">Ditulis oleh:
                            {{ $post->author }}</span></p>
                    <p class="text-sm  text-gray-500 dark:text-white">{{ $post->published_at }}</p>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
