<?php

namespace App\Imports;

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
            if(!$product)
            {
                $newCollection = [];

                if($product->gross != $collection['gross'] || $product->net != $collection['net'] || $product->unit != $collection['unit']){
                    $newCollection = Arr::add($collection, 'create', false);
                }else{
                    $newCollection = Arr::add($collection, 'create', true);
                }

                $collects->push(Arr::except($newCollection, ['id']));
            }
        }

        session()->put('productSession', $collects);
    }

    public function headingRow(): int
    {
        return 1;
    }

}
