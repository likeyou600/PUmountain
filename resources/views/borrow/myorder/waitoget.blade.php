<div class="card PUcardtop">
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#66BAB7">
        <p class="userfontfamily2 tooltitle " style="color:white">借用編號:
            {{ $order_id }}</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#33A6B8">
        <p class="userfontfamily2 tooltitle " style="color:white">
            借用情況:領取器材中</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;">

    </div>

    @include('borrow.myorder.order_datil_picshow')
    <form action="{{route('borrow.sendpicview')}}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order_id }}">
        <input type="submit" value="領到器材了!傳照片開始借用" class="btn btn-primary addtext userfontfamily2" name=""
            style="height: 80px;font-size: 25px;">
    </form>
</div>

<div class="orderdivider"></div>