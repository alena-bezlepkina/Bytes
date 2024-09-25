<?php

namespace App\Http\Controllers\API;

use App\Models\Bytes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BytesListImport;

class BytesOperationApiController extends Controller
{

    public function get(Request $request, $numId)
    {
            $bytes = Bytes::find($numId);
            return response()->json($bytes);
    }

    public function delete(Request $request)
    {
            foreach ($request->numIds as $numId) {
                Bytes::where('id', $numId)->delete();
            }
            return response()->json(['message' => 'Success'], 200);
    }

    public function change(Request $Data)
    {

            $Byte = Bytes::find($Data->id);
            $Byte->byte0 = $Data->byte0??0;
            $Byte->byte1 = $Data->byte1??0;
            $Byte->byte2 = $Data->byte2??0;
            $Byte->byte3 = $Data->byte3??0;
            $Byte->byte4 = $Data->byte4??0;
            $Byte->byte5 = $Data->byte5??0;
            $Byte->byte6 = $Data->byte6??0;
            $Byte->byte7 = $Data->byte7??0;
            $Byte->decimal=$Byte->convertToDecimal();
            $Byte->save();
            return response()->json(['message' => 'Success'], 200);
    }

    public function create(Request $Data)
    {
            $Byte = new Bytes();
            $Byte->byte0 = $Data->byte0??0;
            $Byte->byte1 = $Data->byte1??0;
            $Byte->byte2 = $Data->byte2??0;
            $Byte->byte3 = $Data->byte3??0;
            $Byte->byte4 = $Data->byte4??0;
            $Byte->byte5 = $Data->byte5??0;
            $Byte->byte6 = $Data->byte6??0;
            $Byte->byte7 = $Data->byte7??0;
            $Byte->decimal=$Byte->convertToDecimal();
  
            $Byte->save();
            return response()->json(['message' => 'Success'], 200);
    }

    public function sum(Request $request)
    {
        $numbers = $request->decimalNums;
        $result = array_sum($numbers);
        return response()->json([$result]);
    }

    public function multy(Request $request)
    {
        $numbers = $request->decimalNums;
        $result = array_product($numbers);
        return response()->json([$result]);
    }

    public function importProcess(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new BytesListImport, $file);
        return redirect()->back()->with('success', 'Users imported successfully.');
    }
}

