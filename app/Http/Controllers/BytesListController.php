<?php

namespace App\Http\Controllers;

use App\Models\Bytes;
use Illuminate\Http\Request;

class BytesListController extends Controller
{
    public function get(Request $request)
    {
        $bytes = Bytes::get();
        return view('bytes', compact('bytes'));
    }
}
