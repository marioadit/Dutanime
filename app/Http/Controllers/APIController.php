<?php

namespace App\Http\Controllers;

use App\Animes;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function searchanimes(Request $request)
    {
        $cari = $request->input('q');

        $animes = Animes::where('title', 'like', "%$cari%")->get();

        if ($animes->isempty()) {
            return response()->json([
                'success' => false,
                'data' => 'Data Not Found'
            ], 200)->header('Access-Control-Allow-Origin','*');
        } else {
            return response()->json([
                'success' => true,
                'data' => $animes
            ], 200)->header('Access-Control-Allow-Origin','*');
        }
    }
}
