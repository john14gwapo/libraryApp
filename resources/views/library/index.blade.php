<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container flex justify-end">
                        <a href="{{ route('library.create') }}" class="btn btn-danger" title="Add Image to the gallery"><i class="fas fa-solid fas fa-plus"></i><span class="pe-3"></span><i class="fas fa-solid fas fa-book"></i></a>
                     </div>
                     @if (count($books) == 0)
                     <div class="text-center text-bold text-xl text-cyan-700">
                        {{ __('Empty books') }}
                     </div>
                     @else
                     <div class="flex flex-wrap bg-slate-900">
                         @foreach($books as $book)
                         <a href="{{ route('library.show',$book->id) }}">
                            <div class="w-64 rounded-lg shadow-lg p-4 mx-2 my-2">
                                <div class="p-4 text-bold text-center text-xl">
                                    {{ __('Title: '.$book->title) }}
                                    <img src="{{ asset('storage/'.$book->image) }}" alt="Image" style="width: 250px; height: 250px;">
                                    <h2>{{ 'Author: '.$book->author }}</h2>
                                    <p class="text-muted">{{ 'Date Published: '.$book->published }}</p>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('borrower.create',$book->id) }}" class="btn btn-danger">Borrow</a>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    </div>
                     @endif
                </div
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
