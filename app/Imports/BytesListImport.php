<?php

namespace App\Imports;

use App\Models\Bytes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class BytesListImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $byte = new Bytes();
            $byte->byte0 = $row['byte0'];
            $byte->byte1 = $row['byte1'];
            $byte->byte2 = $row['byte2'];
            $byte->byte3 = $row['byte3'];
            $byte->byte4 = $row['byte4'];
            $byte->byte5 = $row['byte5'];
            $byte->byte6 = $row['byte6'];
            $byte->byte7 = $row['byte7'];
        $byte->decimal=$byte->convertToDecimal();
        $byte->save();
        return null;
    }
}
