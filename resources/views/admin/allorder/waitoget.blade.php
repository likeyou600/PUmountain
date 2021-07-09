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
        8px;">

    </div>

    @include('admin.allorder.order_datil_picshow')
    <input type="button" value="管理代傳圖片" class="btn btn-primary addtext"
        onclick="adminsendpic({{$order_id}},'{{$order_username}}');" data-toggle="modal"
        data-target="#adminsendpicmodal">

    <input type="button" value="取消此筆借用" class="btn btn-primary addtext" onclick="admincancle({{$order_id}});"
        data-toggle="modal" data-target="#admincanclemodal">


</div>

<div class="orderdivider"></div>