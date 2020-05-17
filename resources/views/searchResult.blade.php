@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <div>
               <div>
                   <h1>"{{$keyword}}"の検索結果</h1>
                    <div>
                        @foreach($stocks as $stock)
                        <div style="padding-bottom:30px;">
                            <img src="/image/{{$stock->imgpath}}" alt="" ><br>
                            商品名：{{$stock->name}}<br>
                            価格：{{$stock->fee}}円<br>
                            商品説明：{{$stock->detail}}<br>
                        </div>
                        @endforeach
                    </div>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection