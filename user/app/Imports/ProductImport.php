<?php

namespace App\Imports;

use App\Helpers\Typer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collections)
    {
        $collects = collect();
        foreach($collections as $collection)
        {
            $product = Product::where('product', $collection['product'])->first();
            $newCollection = [];
            if(!$product)
            {
                $newCollection = Arr::add($collection, 'create', true);
            }else{
                if($product->gross != $collection['gross'] || $product->net != $collection['net'] || $product->unit != $collection['unit'] || $product->type != Typer::getNumericType($collection['type'])){
                    $newCollection = Arr::add($collection, 'create', false);
                }
            }

            if($newCollection != [] && $newCollection != ''){
                $collects->push(Arr::except($newCollection, ['id']));
            }
        }
        // $collects->splice($collects->count() -1, 1);
        session()->put('productSession', $collects);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
