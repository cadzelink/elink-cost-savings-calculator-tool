<?php

namespace App\Http\Controllers;

use App\Helpers\Logger;
use App\Imports\BookImport;
use App\Models\Book;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(5);
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

    public function importPage()
    {
        return view('books.bulk');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        Excel::import((new BookImport), $request->file('file')->store('temp'));
        return redirect(route('book.import-list'));
    }

    public function importList()
    {

        if(!session()->get('bookSession')){
            return redirect(route('book.import-page'));
        }

        $books = session()->get('bookSession');
        return view('books.import_list', compact('books'));
    }

    public function importCancel()
    {
        if(!session()->get('bookSession')){
            return redirect(route('book.import-bulk'));
        }

        session()->forget('bookSession');
        return redirect(route('book.index'));
    }

    public function removeList(Request $request)
    {
        if(!session()->get('bookSession')){
            return redirect(route('book.import-bulk'));
        }
        // GG ko dinhi maong ogma nata mag tiwas >_<
        $books = session()->get('bookSession');
        for($count = 0; $count < count($books) ; $count++){
            if($books[$count]['package'] == $request->book){
                // Arr::pull($books, '0');
                $books->splice($count, 1);
                session()->put('bookSession', $books);
            }
        }

        return back();
    }

    public function importData(Request $request)
    {
        if(!session()->get('bookSession')){
            return redirect(route('book.import-bulk'));
        }

        $books = session()->get('bookSession');

        foreach($books as $book)
        {
            Book::create([
                'package' => $book['package'],
                'cover' => $book['cover'],
                'size' => $book['size'],
                'cover_cost' => $book['cover_cost'],
                'cost_per_page' => $book['cost_per_page'],
                'status' => $book['status']
            ]);
        }

        session()->forget('bookSession');
        return redirect(route('book.import-page'))->with('success', 'Package(s) successfully imported to database!');
    }

}
