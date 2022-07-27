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
}
