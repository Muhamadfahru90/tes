<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdukController extends Controller
{
    public function fetch()
    {
        $data = Http::post('http://103.23.235.214/kanaldata/Webservice/bank_method')
            ->json();
        return view('produk', ['data' => $data]);
    }
    // public function store()
    // {
    //     $data = Http::post('http://103.23.235.214/kanaldata/Webservice/bank_method')
    //         ->json();
    //     return view('produk', ['data' => $data]);
    // Post::create([
    //     'title' => $request->title,
    //     'content' => $request->content,
    //     'category' => $request->category,
    //     'status' => $request->status
    // ]);
    // return response()->json([
    //     "success" => true,
    //     "message" => "Product created successfully."

    // ]);
    // }
}
