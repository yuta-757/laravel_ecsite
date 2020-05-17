@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <!-- 検索フォーム -->
            <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{url('/search')}}">
                    <div class="form-group">
                        <input type="text" name="keyword" value="" class="form-control" placeholder="名前を入力してください">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
            </div>
            <div class="d-flex flex-wrap">
                @foreach($stocks as $stock)
                <div class="itemBox">
                    <p>{{$stock->name}}</p>
                    <p><img src="/image/{{$stock->imgpath}}" alt="" ></p>
                    <button type="button" onclick="location.href='./{{$stock->id}}'">商品詳細</button>
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