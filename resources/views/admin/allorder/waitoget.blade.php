<div class="card PUcardtop">
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#66BAB7">
        <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$order_username}}<br>借用編號:{{ $order_id }}</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#33A6B8">
        <p class="userfontfamily2 tooltitle " style="color:white">
            借用情況:領取器材中</p>
    </div>
    <div class="card-header opwhite" style="text-align: center;padding:
        8px;background-color:#3378b8">
        <input class="btn btn-primary addtext userfontfamily2 btncolor"
        type="button" value="顯示詳細資訊及選項" onclick="toggle({{$order_id}})">
    </div>
    <div id="show{{$order_id}}" class="hide">
        @include('admin.allorder.order_datil_picshow')
        <input type="button" value="管理代傳圖片" class="btn btn-primary addtext userfontfamily2"
            onclick="adminsendpic({{$order_id}},'{{$order_username}}');" data-bs-toggle="modal"
            data-bs-target="#adminsendpicmodal">

        <input type="button" value="取消此筆借用" class="btn btn-primary addtext userfontfamily2" onclick="admincancle({{$order_id}});"
            data-bs-toggle="modal" data-bs-target="#admincanclemodal" style="background-color: red">
    </div>

</div>

<div class="orderdivider"></div>