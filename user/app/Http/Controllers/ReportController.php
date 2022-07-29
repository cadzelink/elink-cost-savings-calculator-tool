<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Book;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $productCount=Product::count();
        $packageCount=Book::count();

        return view('dashboard', compact('productCount', 'packageCount'));
    }
}
