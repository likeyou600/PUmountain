@extends('borrow.article.PUborrow')

@section('ArticleShow')
<div class="row">

    @foreach($article_category as $now)
    <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
        <div class="card PUcardtop">
            @if ($now->item_quantity > 0)
            <img src="/PUmountain/picture/borrow/{{$now->item_category}}/{{ $now->item_picture }}" class="card-img-top">
            <form action="{{route('borrow.addtocart')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="category" value="{{ $now->item_category }}">
                <input type="hidden" name="id" value="{{ $now->id }}">
                <div class="PUcardbody">
                    <p class="userfontfamily2 filefont">剩餘數量: {{ $now->item_quantity }} 個</p>
                    <div class="input-group mb-3">


                        <input type="number" class="userfontfamily2 filefont" value="0" min="0" max={{ $now->item_quantity }}
                            step="1" name="select_quantity" />


                    </div>
                    <input type="submit" value="加到借用清單" class="btn btn-primary addtext" onclick="do_click()">

                </div>
            </form>
            @else
            <img src="/PUmountain/picture/borrow/{{$now->item_category}}/{{ $now->item_picture }}" class="card-img-top">
            <img src="/PUmountain/picture/borrow/out.png" class="outborrowimg card-img-top">
            <div class="PUcardbody">
                <p class="userfontfamily2 filefont">剩餘數量: 0 個</p>
                <div class="input-group mb-3">
                    <input type="number" class="userfontfamily2 filefont" value="0" min="0" max="0" step="1"
                        name="select" />
                </div>
                <a class="btn btn-primary addtext" style="background-color:#f03535">已經被借走了哦!</a>
            </div>
            @endif
        </div>

    </div>
    @endforeach
</div>
@endsection