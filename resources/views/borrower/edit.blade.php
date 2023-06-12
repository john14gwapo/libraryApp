<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Borrower Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex m-2">
                    <a href="{{ route('borrower.index') }}" class="btn btn-secondary text-lg"><i class="fas fa-solid fas fa-arrow-left"></i></a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-bold text-xl">
                        <form action="{{ route('borrower.update',$borrower->id) }}" method="post" enctype="multipart/form-data">
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
                            <div class="form-group mb-3">
                                <label for="studentid">Student ID</label>
                                <input class="" type="text" name="studentid" value="{{ $borrower->studentid }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Name of the Student</label>
                                <input class="" type="text" name="name" value="{{ $borrower->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="course">Course</label>
                                <input class="" type="text" name="course" value="{{ $borrower->course }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="yearandsection">Year and Section</label>
                                <input class="" type="text" name="yearandsection" value="{{ $borrower->yearandsection }}">
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
