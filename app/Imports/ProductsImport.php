<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ProductsImport implements ToArray, WithCalculatedFormulas
{
    public function array(array $rows)
    {
        return $rows; // This will return the data with formulas evaluated
    }
}
    