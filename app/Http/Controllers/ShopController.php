<?php

namespace App\Http\Controllers;

use App\Models\Stock;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    //商品一覧
    public function index(){
        $stocks = Stock::Paginate(3); //DBから値を取得、１ページに６つの情報
        return view('shop', compact('stocks')); 
    }

    // 商品検索
    public function search(Request $request){
        #キーワード受け取り
        $keyword = $request->input('keyword');
        
        #クエリ生成
        $query = Stock::query();
        
        // 検索結果フラグ
        $searchResultFlag = 0;

        #もしキーワードがあったら
        if(!empty($keyword))
        {
            $query->where('name','like','%'.$keyword.'%')->orWhere('detail','like','%'.$keyword.'%');
        }
        
        #ページネーション
        $stocks = $query->orderBy('created_at','desc')->paginate(3);

        if($stocks[0]){
            $searchResultFlag = 1;
        }

        return view('searchResult',compact('keyword','stocks','searchResultFlag'));
    }

    // 商品詳細　$id・・・Stockテーブルのプライマリーキー
    public function show($id){
        $stock = Stock::findOrFail($id);
        return view('stock', compact('stock')); 
    }
}
