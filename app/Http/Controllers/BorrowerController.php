<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowers = Borrower::all();
        return view('borrower.index',compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $book = Book::find($id);
        return view('borrower.create',compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'studentid' =>'required|string',
            'name' =>'required|string',
            'course' =>'required|string',
            'yearandsection' =>'required|string',
            'nameofthebook' => 'required|string',
            'authorofthebook' => 'required|string',
            'image' => 'required',
            'published' => 'required|date',
        ]);
        Borrower::create([
            'studentid' => $request->studentid,
            'name' => $request->name,
            'course' => $request->course,
            'yearandsection' => $request->yearandsection,
            'nameofthebook' => $request->nameofthebook,
            'authorofthebook' => $request->authorofthebook,
            'image' => $request->image,
            'published' => $request->published
        ]);
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrower $borrower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $borrower = Borrower::find($id);
        return view('borrower.edit',compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $borrower = Borrower::find($id);
        $request->validate([
            'studentid' =>'required|string',
            'name' =>'required|string',
            'course' =>'required|string',
            'yearandsection' =>'required|string',
        ]);
        $borrower->update([
            'studentid' => $request->studentid,
            'name' => $request->name,
            'course' => $request->course,
            'yearandsection' => $request->yearandsection,
        ]);
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $borrower = Borrower::find($id);
        $borrower->delete();
        return $this->index();
    }
}
