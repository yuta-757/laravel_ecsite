<?php

namespace App\Http\Controllers;

use App\Models\Stock;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index(){
        $stocks = Stock::Paginate(6); //DBから値を取得、１ページに６つの情報
        return view('shop', compact('stocks')); 
    }
}
