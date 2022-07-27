<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(5);
        return view('books.index',compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'package' => 'required',
            'cover' => 'required',
            'size' => 'required',
            'cover_cost' => 'required',
            'cost_per_page' => 'required',
        ]);

        Book::create([
            'package' => $request->package,
            'cover' => $request->cover,
            'size' => $request->size,
            'cover_cost' => $request->cover_cost,
            'cost_per_page' => $request->cost_per_page,
        ]);

        return redirect(route('book.create'))->with('success','Book successfully added to database');
    }


    public function edit(Book $book){
        return view('books.edit',compact('book'));
    }


}
