@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div>
                   <h1>商品詳細</h1>
                   <div>
                   <img src="/image/{{$stock->imgpath}}" alt="" ><br>
                    商品名：{{$stock->name}}<br>
                    価格：{{$stock->fee}}円<br>
                    商品説明：{{$stock->detail}}
                    </div>
                    <br>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection