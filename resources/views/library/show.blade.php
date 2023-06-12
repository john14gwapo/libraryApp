<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex m-2">
                    <a href="{{ route('library.index') }}" class="btn btn-secondary text-lg"><i class="fas fa-solid fas fa-arrow-left"></i></a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center bg-slate-900">
                        <div class="w-64 rounded-lg shadow-lg p-4 mx-2 my-2">
                            <div class="p-4 text-bold text-center text-xl">
                                {{ __('Title: '.$book->title) }}
                                <img src="{{ asset('storage/'.$book->image) }}" alt="Image" style="width: 250px; height: 250px;">
                                <h2>{{ $book->author }}</h2>
                                <p class="text-muted">{{ $book->published }}</p>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('library.edit',$book->id) }}">
                                <button class="btn btn-secondary me-2"><i class="fas fa-pen"></i></button>
                                </a>
                                <form action="{{ route('library.delete', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-black hover:text-blue-300 btn btn-danger">
                                        <i class="fas fa-solid fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
