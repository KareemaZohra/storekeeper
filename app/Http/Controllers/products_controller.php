<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function showProducts(){
        $products = DB::table('products')->get();
//       dd($products);
        return view('productDisplay',['products'=>$products]);
    }

    public function buy(Request $request){
        $id = $request->id;
        $product =  DB::table('products')->where('id',$id)->first();

        DB::table('orders')->insert([
            'itemName' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ]);

        $newQty = $product->quantity - 1;

        DB::table('products')
            ->where('id', $id)
            ->update(['quantity' => $newQty]);

        $products = DB::table('products')->get();
        return view('productDisplay',['products'=>$products]);

    }

    public function showDashboard(){
        $today = now();
        $yesterday = Carbon::yesterday();
        $saleToday = DB::table('orders')
            ->where('updated_at','>',$yesterday)
            ->sum('price');

        $saleYesterday = DB::table('orders')
            ->where('updated_at','>=',$yesterday)
            ->where('updated_at','<',$today)
            ->sum('price');
        $saleThisMonth = 40;
        $saleLastMonth = 50;
        return view('dashboard',compact('saleToday','saleYesterday','saleThisMonth','saleLastMonth'));
    }

    public function showTransactions(){
        $orders = DB::table('orders')->get();

        return view('transactions', compact('orders'));
    }
}
