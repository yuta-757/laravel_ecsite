@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
                   <h1>商品情報編集</h1>
                   <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                        <form method="post" class="form-inline" action="{{action('AdminController@editComplete')}}" enctype="multipart/form-data">
                        @csrf
                                <input type="hidden" name="id" value="{{$stock->id}}">
                                <p>写真：<input type="file" name="image" class="form-control"></p>
                                <p>説明文：<textarea type="text" name="detail" class="form-control">{{$stock->detail}}</textarea></p>
                                <p>登録日：<input type="text" name="created_at" value="{{$stock->created_at}}" class="form-control"></p>
                                <p>値段：<input type="text" name="fee" value="{{$stock->fee}}" class="form-control"></p>
                                <p style="display:inline-block; padding:50px;"><input  type="submit" value="登録" class="btn btn-info"></p>
                        </form>
                    </div>

       </div>
   </div>
</div>
@endsection