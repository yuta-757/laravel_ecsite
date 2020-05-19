@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid">
   <div>
    @if (session('flashmessage'))
    <div class="alert alert-success">
        {{ session('flashmessage') }}
    </div>
    @endif
       <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <button  class="btn btn-info" type="button" onclick="location.href='admin/register'">商品登録</button>
            <div class="d-flex flex-wrap">
                @foreach($stocks as $stock)
                <div class="itemBox">
                    <p>{{$stock->name}}</p>
                    <p><img src="/storage/image/{{$stock->imgpath}}" alt="" ></p>
                    <p>商品名：{{$stock->name}}<br></p>
                    <p>価格：{{$stock->fee}}円<br></p>
                    <p>商品説明：{{$stock->detail}}</p>
                    <button type="button" onclick="location.href='admin/edit/{{$stock->id}}'">編集</button>
                    <button type="button" onclick="location.href='admin/delete/{{$stock->id}}'">削除</button>
                </div>
                @endforeach
            </div> 
            <p>
                {{$stocks->links()}} 
            </p>
       </div>
   </div>
</div>
@endsection