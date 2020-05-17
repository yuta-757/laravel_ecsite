<?php

namespace App\Http\Controllers;

use App\Models\Stock;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $stocks = Stock::Paginate(3); //DBから値を取得、１ページに６つの情報
        return view('admin', compact('stocks')); 
    }
    public function register(){
        return view('shop', compact('stocks')); 
    }
    public function edit($id){
        $stock = Stock::findOrFail($id);
        return view('edit', compact('stock')); 
    }
    public function editComplete(Request $request){

        // DB更新
        if(!empty($request))
        {
            // $contact = new Contact($request->all());
            // $query->where('name','like','%'.$keyword.'%')->orWhere('detail','like','%'.$keyword.'%');
            // echo var_dump($request['imgpath']);
            // echo $_FILES['imgpath']['name'];
            // 選択した商品IDの取得
            $select_id = $request->input('id');
            // アップロードしたファイル名を取得
            $upload_name = $select_id."_".$_FILES['image']['name'];

            // アップロードするディレクトリ名を指定
            $up_dir = './image';
            

            // アップロードしたファイルのバリデーション設定
            $this->validate($request, [
                'image' => [
                    'required',
                    'file',
                    'image',
                    'mimes:jpeg,png',
                ]
            ]);

            //アップロードに成功しているか確認
            if ($request->file('image')->isValid([])) {
                $filename = $request->file('image')->storeAs($up_dir, $upload_name, 'public');
                echo $filename;

                // DBへファイル名登録処理
                $stock = \App\Models\Stock::findOrFail($select_id);
                // $filenameだとパスが含まれてしまう為、basename()で囲う
                $stock->imgpath =   basename($filename);
                // 更新(差分があればDBに登録)
                $stock->save();

                return redirect()->to('admin')->with('flashmessage', 'イメージ画像の登録が完了しました。');
            }
            else{
                return redirect()->to('admin')->with('flashmessage', 'イメージ画像の登録に失敗しました。');
            }
        }

    }


    public function delete(){
        return view('shop', compact('stocks')); 
    }
}
