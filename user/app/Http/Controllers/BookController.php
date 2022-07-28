<?php

namespace App\Http\Controllers;

use App\Helpers\Logger;
use App\Models\Book;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

        $book = Book::create([
            'package' => $request->package,
            'cover' => $request->cover,
            'size' => $request->size,
            'cover_cost' => $request->cover_cost,
            'cost_per_page' => $request->cost_per_page,
        ]);

        $description = Logger::generateReport(Arr::except($request->all(), ['id','status']));
        Log::create([
            'user_id' => auth()->user()->id,
            'item_name' => $book->package,
            'item_table' => 'book_price',
            'description' => $description,
            'action' => Log::$CREATE
        ]);

        return redirect(route('book.create'))->with('success','Book successfully added to database');
    }


    public function edit(Book $book){
        return view('books.edit',compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'package' => 'required',
            'cover' => 'required',
            'size' => 'required',
            'cover_cost' => 'required',
            'cost_per_page' => 'required',
        ]);

        $description = Logger::generateReport(Arr::except($book->toArray(),['id','status']), $request->except(['_token', '_method']), Log::$MODIFY);
        Log::create([
            'user_id' => auth()->user()->id,
            'item_name' => $book->package,
            'item_table' => 'book_price',
            'description' => $description,
            'action' => Log::$MODIFY
        ]);

        $book->update($request->all());


        return redirect()->route('book.edit', ['book'=>$book])->with('success', 'Book successfully update to the database');
    }

    public function delete(Book $book)
    {
        $description = Logger::generateReport(Arr::except($book->toArray(),['id','status']),[],Log::$DELETE);
        Log::create([
            'user_id' => auth()->user()->id,
            'item_name' => $book->package,
            'item_table' => 'book_price',
            'description' => $description,
            'action' => Log::$DELETE
        ]);

        $book->delete();



       return redirect()->route('book.index')->with('success','Book has been successfully deleted from the database');
    }

}
