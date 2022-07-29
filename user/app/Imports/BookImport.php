<?php

namespace App\Imports;

use App\Models\Book;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collections)
    {
        $collects = collect();
        foreach($collections as $collection)
        {
            $book = Book::where('package', $collection['package'])
                ->where('cover', $collection['cover'])
                ->where('size', $collection['size'])
                ->first();
            if(!$book)
            {
                $collects->push(Arr::except($collection, ['id']));
            }
        }
        // dd(session()->get('booksSession'));

        session()->put('bookSession', $collects);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
