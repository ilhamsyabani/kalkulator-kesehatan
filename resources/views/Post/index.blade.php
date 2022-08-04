<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <div class="max-w-4xl bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8"
                    role="alert">
                    <strong class="font-bold"> Yoh !</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm max-w-4xl sm:rounded-lg">
                <div class=" p-10 bg-white border-b border-gray-200">


                    <table class="w-full text-sm text-left text-gray-500 mb-8 dark:text-gray-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            Daftar Post
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of
                                Flowbite products designed to help you work and play, stay organized, get answers,
                                keep in touch, grow your business, and more.</p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Judul Post
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Penulis
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Kategori
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Published at
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->title }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $post->author }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $post->category }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $post->published_at }}
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{ route('post.edit', $post) }}"
                                            class="font-medium
                                            text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <a href="{{ route('post.show', $post) }}"
                                            class="font-medium text-yellow-400 dark:text-blue-500 mx-3 hover:underline">View</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <a href="{{ route('post.create') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
                        Postingan</a>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
