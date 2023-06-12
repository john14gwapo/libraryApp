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
                     @if (count($borrowers) == 0)
                     <div class="text-center text-bold text-xl text-cyan-700">
                        {{ __('No Borrowers') }}
                     </div>
                     @else
                     <div class="flex flex-wrap bg-slate-900">
                         <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Year & Section</th>
                                    <th>Name of the Book</th>
                                    <th>Author of the Book</th>
                                    <th>Image</th>
                                    <th>Date of published</th>
                                    <th>Date Borrowed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($borrowers as $borrower)
                            <tbody>
                                <tr>
                                    <td>{{ $borrower->studentid }}</td>
                                    <td>{{ $borrower->name }}</td>
                                    <td>{{ $borrower->course }}</td>
                                    <td>{{ $borrower->yearandsection }}</td>
                                    <td>{{ $borrower->nameofthebook }}</td>
                                    <td>{{ $borrower->authorofthebook }}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$borrower->image) }}" alt="Image" style="width: 50px; height: 50px;">
                                    </td>
                                    <td>{{ $borrower->published }}</td>
                                    <td>{{ $borrower->created_at }}</td>
                                    <td>
                                        <div class="text-center flex justify-center">
                                            <a href="{{ route('borrower.edit',$borrower->id) }}">
                                                <button class="btn btn-secondary me-2"><i class="fas fa-pen"></i></button>
                                                </a>
                                            <form action="{{ route('borrower.delete', $borrower->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-black" type="submit"><i class="fas fa-solid fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                         </table>
                    </div>
                     @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
