<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm max-w-4xl clesm:rounded-lg">
                <div class="p-10 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-6">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                                Judul</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                                class="title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('title') is-invalid @enderror focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6">
                            <label for="slug"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                                Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}"
                                class="slug bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('slug') is-invalid @enderror focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6">
                            <label for="author"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                                Author</label>
                            <input type="text" id="author" name="author"
                                value="{{ old('author', $post->author) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('author') is-invalid @enderror focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="file_input">Kategory</label>
                            <select
                                class="w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                name="category">
                                <option value="informasi">Info</option>
                                <option value="Panduan">Panduan</option>
                            </select>

                        </div>


                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="file_input">Cover</label>
                            @if ($post->image)
                                <div style="max-height: 200px; overflow:hidden;" class="mb-6">
                                    <img src="{{ $post->image }}" alt="{{ $post->titile }}" style="max-height: 250px;">
                                </div>
                            @else
                                <div style="max-height: 200px; overflow:hidden;" class="mb-6">
                                    <img src="#" style="max-height: 250px;">
                                </div>
                            @endif
                            <input
                                class="w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file_input" name="image" type="file" value="{{ old('image', $post->image) }}">
                        </div>




                        <div class="mb-8">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="file_input">Body</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                            <trix-editor input="body"></trix-editor>
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            // console.log(title);
            fetch('/createSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>

</x-app-layout>
