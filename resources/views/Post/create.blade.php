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

                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 @error('title') text-red-500 @enderror dark:text-gray-300"
                                for='title'>{{ __('Judul') }}</label>
                            <input type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('title') border-red-500 @enderror focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('Judul') }}" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 @error('slug') text-red-500 @enderror dark:text-gray-300"
                                for='slug'>{{ __('Slug') }}</label>
                            <input type="text" name="slug" id="slug"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('slug') border-red-500 @enderror focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('slug') }}" value="{{ old('slug') }}">
                            @error('slug')
                                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 @error('author') text-red-500 @enderror dark:text-gray-300"
                                for='author'>{{ __('Penulis') }}</label>
                            <input type="text" name="author" id="author"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('author') border-red-500 @enderror focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ __('Penulis') }}" value="{{ old('author') }}">
                            @error('author')
                                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="file_input">Kategory</label>
                            <select name="category"
                                class="w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <option value="informasi">Info</option>
                                <option value="Panduan">Panduan</option>
                            </select>
                            @error('author')
                                <p class="text-sm text-red-400 mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="mb-6">
                            <img id="image-preview" alt="image preview" class="col-sm-6" />
                            <br />
                            <label for="image" class="form-label">Cover</label>
                            <input
                                class="w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer @error('image') is-invalid @enderror dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                type="file" id="image-source" name="image" onchange="previewImage();">
                        </div>
                        @error('image')
                            <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror


                        <div class="mb-8">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                for="file_input">Body</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
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

        function previewImage() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>

</x-app-layout>
