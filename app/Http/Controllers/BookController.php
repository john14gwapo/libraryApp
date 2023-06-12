<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user){
            abort(401);
        }
        $books = $user->books;
        return view('library.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('library.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published' => 'required|date',
        ]);
        $user = Auth::user();
        $image = $request->file('image')->store('images','public');
        $user->books()->create([
            'title' => $request->title,
            'author' => $request->author,
            'image' => $image,
            'published' => $request->published
        ]);
        return back()->with('success', 'Image uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if(!$book){
            abort(404);
        }
        return view('library.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);
        if(!$book){
            abort(404);
        }
        return view('library.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'published' => 'required|date',
        ]);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'published' => $request->published
        ]);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return $this->index();
    }
}
