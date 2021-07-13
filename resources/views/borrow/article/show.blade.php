@extends('borrow.article.page')

@section('show')
<div class="row">

    @foreach($items as $item)
    <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
        <div class="card PUcardtop">
            @if ($item->quantity > 0)
            <img src="/PUmountain/picture/borrow/{{$category}}/{{ $item->picture }}" class="card-img-top">
            <form action="{{route('borrow.addtocart')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="category" value="{{ $category }}">
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="PUcardbody">
                    <p class="userfontfamily2 filefont">剩餘數量: {{ $item->quantity }} 個</p>
                    <div class="input-group mb-3">


                        <input type="number" class="userfontfamily2 filefont inputsni" value="0" min="0" max={{ $item->quantity }}
                            step="1" name="select_quantity"  />


                    </div>
                    <input type="submit" value="加到借用清單" class="btn btn-primary addtext" onclick="do_click()" >

                </div>
            </form>
            @else
            <img src="/PUmountain/picture/borrow/{{$category}}/{{ $item->picture }}" class="card-img-top">
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