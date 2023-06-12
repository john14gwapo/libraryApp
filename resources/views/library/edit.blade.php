<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit book') }}
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
                        <form action="{{ route('library.update',$book->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                            <div class="form-group mb-3">
                                <label for="title">Book Title</label>
                                <input class="" type="text" name="title" value="{{ $book->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="author">Author</label>
                                <input class="" type="text" name="author" value="{{ $book->author }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="published">Date Published</label>
                                <input class="" type="date" name="published" id="published" value="{{ $book->published }}">
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
</x-app-layout>
