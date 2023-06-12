<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex m-2">
                    <a href="{{ route('library.index') }}" class="btn btn-secondary text-lg"><i class="fas fa-solid fas fa-arrow-left"></i></a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-bold text-xl">
                        <form action="{{ route('library.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-error bg-red-500 text-black">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="container text-center p-3 justify-center">
                            <div class="form-group mb-2">
                                <img class="item-center ps-5 w-10 h-10" id="imagePreview" src="#" alt="Image Preview">
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input class="" type="file" name="image" id="image" onchange="previewImage(event)">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Book Title</label>
                                <input class="" type="text" name="title">
                            </div>
                            <div class="form-group mb-3">
                                <label for="author">Author</label>
                                <input class="" type="text" name="author">
                            </div>
                            <div class="form-group mb-3">
                                <label for="published">Date Published</label>
                                <input class="" type="date" name="published" id="published">
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary text-black">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            var image = document.getElementById('imagePreview');

            reader.onload = function () {
                if (reader.readyState == 2) {
                    image.src = reader.result;
                }
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
