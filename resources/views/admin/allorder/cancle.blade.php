<div class="card PUcardtop">
    <div class="card-header opwhite" style="text-align: center;padding:
            8px;background-color:#66BAB7">
              <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$order_username}}<br>借用編號: {{ $order_id }}</p>

    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
                                8px;background-color:red">
        <p class="userfontfamily2 tooltitle " style="color:white">
            借用情況:已取消</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
                            8px;">
    </div>
    @include('borrow.myorder.order_datil_picshow')
</div>

<div class="orderdivider"></div>
