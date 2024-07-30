<?php

namespace App\Imports;

use App\Models\Image;
use App\Models\Keyvalue;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        ini_set('max_execution_time', 240);

        foreach ($collection as $row) {

            /**
             * Работаем с таблицей products
             *
             * */

            $prodId = ProductService::product($row);

            /**
             * Работаем с таблицей images
             *
             * */
            ProductService::image($row, $prodId);


            /**
             * Работаем с таблицей keyvalues
             * */
            ProductService::keyvalue($row, $prodId);


        }
        echo 'Finish';
    }
}
