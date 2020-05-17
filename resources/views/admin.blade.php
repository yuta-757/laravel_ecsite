@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <div class="d-flex flex-wrap">
                @foreach($stocks as $stock)
                <div class="itemBox">
                    <p>{{$stock->name}}</p>
                    <p><img src="image/{{$stock->imgpath}}" alt="" ></p>
                    <p>商品名：{{$stock->name}}<br></p>
                    <p>価格：{{$stock->fee}}円<br></p>
                    <p>商品説明：{{$stock->detail}}</p>
                    <button type="button" onclick="location.href='./edit/{{$stock->id}}'">編集</button>
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