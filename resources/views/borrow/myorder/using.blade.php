<div class="card PUcardtop">
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#66BAB7">
        <p class="userfontfamily2 tooltitle " style="color:white">借用編號:
            {{ $order_id }}</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#0069d9">
        <p class="userfontfamily2 tooltitle " style="color:white">
            借用情況:借用中</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;">
        <p class="userfontfamily2 filefont">
            借用時間: {{ $order_borrowdate }}
            最慢歸還日: {{ $order_lastreturndate }}

            剩餘天數: {{ $day }}天
        </p>
    </div>
    @include('borrow.myorder.order_datil_picshow')
        <form action="{{route('borrow.sendreturnpicview')}}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order_id }}">
            <input type="submit" value="我想歸還" class="btn btn-primary addtext userfontfamily2" name="update_button"
                style="height: 80px;font-size: 25px;">
        </form>
</div>

<div class="orderdivider"></div>