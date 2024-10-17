<?php

namespace App\Imports;

use App\Services\ProductDbService;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsExcelToDbImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection): void
    {
        ini_set('max_execution_time', 240);

        foreach ($collection as $row) {
             //* Работаем с таблицей products
            $prodId = ProductDbService::getProductId($row);

             //* Работаем с таблицей images
            ProductDbService::imageDBHandler($row, $prodId);

             //* Работаем с таблицей keyvalues
            ProductDbService::keyvalueTableSaveDb($row, $prodId);
        }
    }
}
