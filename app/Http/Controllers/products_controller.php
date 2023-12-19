<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class products_controller extends Controller
{
    //
    public function show(){
        return view('productForm');
    }

    public function add(Request $request){
        $input = $request->all();

        DB::table('products')->insert([
            'name' => $input['pname'],
            'price' => $input['price'],
            'quantity' => $input['quantity']
        ]);

        return view('productForm');
    }
}
