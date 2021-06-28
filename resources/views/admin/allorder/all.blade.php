@extends('PUmountain.admin.PUallorder')

@section('all')
    <div class="container">
        <div class="row" style="background-color: #f1f2f4;">
            <div class="col text-center pointimagestyle phoneborrow">
                {{-- $user_data
            $user_countdata --}}
                @php
                    $quantity = count($user_countdata); //個人大筆訂單數
                    $now_count = 0;
                @endphp


                @for ($time = 0; $time < $quantity; $time++)

                    @php
                        $countdata = $user_countdata[$time]->user_borrowtime; //大筆裡有多少小筆的
                        
                        $order_status = $user_data[$now_count]->order_status; //大筆訂單狀態
                        $order_id = $user_data[$now_count]->order_id;
                        $order_date = $user_data[$now_count]->order_date;
                        $order_last_return_date = $user_data[$now_count]->order_last_return_date;
                        date_default_timezone_set("Asia/Taipei");
                        $today= date("Y-m-d");
                        $day = (strtotime($order_last_return_date) - strtotime($today)) / (60 * 60 * 24);
                        $order_return_date = $user_data[$now_count]->order_return_date;
                        $account = $user_data[$now_count]->user_account;
                        $name_data=DB::select('select nickname from users where account = ?', [$account]);
                        $name=$name_data[0]->nickname;
                    @endphp


                    @if ($order_status == 2) <div class="card PUcardtop">
                    <div class="card-header opwhite" style="text-align: center;padding:
                    8px;background-color:#66BAB7">
                    <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$name}}<br>借用編號:{{ $order_id }}</p>
                    </div>
                    <div class="card-header opwhite" style="text-align: center;padding:
                    8px;background-color:#33A6B8">
                    <p class="userfontfamily2 tooltitle " style="color:white">借用情況:領取器材中</p>
                    </div>
                    <div class="card-header opwhite" style="text-align: center;padding:
                    8px;">

                    </div>

                    <div class="card-body opwhite" style=" padding: 0;">
                    <div class="container">
                    <div class="row">
                    @for ($inside = $now_count; $inside < $now_count + $countdata; $inside++)
                        @php
                            $category = $user_data[$inside]->items_category;
                            $items_id = $user_data[$inside]->items_id;
                            $pic = $category . '_' . $items_id;
                            $items_quantity = $user_data[$inside]->items_quantity;
                        @endphp

                        <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                        <div class="card PUcardtop" style=" margin-bottom: 10px;">
                        <img src="../../picture/PUmountain/borrow/{{ $category }}/{{ $pic }}.jpg"
                        class="card-img-top">
                        <p class="userfontfamily2 tooltitle">數量: {{ $items_quantity }}</p>

                        </div>
                        </div> @endfor

            </div>
        </div>
    </div>
    <input type="button" value="管理代傳圖片" class="btn btn-primary addtext userfontfamily2" name="update_button" style="height: 80px;font-size: 25px;"
        onclick="location.href='https://bakerychu.ddns.net/PUmountain/sendpicview/{{ $order_id }}'">
    <input type="button" value="刪除借用" class="btn btn-primary addtext userfontfamily2" name="update_button"
        style="height: 80px;font-size: 25px;background-color:red;"
        onclick="location.href='https://bakerychu.ddns.net/PUmountain/admin/adminreturn/{{ $order_id }}'">
    </div>
    
    

    <div class="orderdivider"></div>





@elseif ($order_status == 1)
    <div class="card PUcardtop">
        <div class="card-header opwhite" style="text-align: center;padding:
                            8px;background-color:#66BAB7">
            <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$name}}<br>借用編號: {{ $order_id }}</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
                            8px;background-color:#0069d9">
            <p class="userfontfamily2 tooltitle " style="color:white">借用情況:借用中</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
                            8px;">
            <p class="userfontfamily2 filefont">
                借用時間: {{ $order_date }}
                最慢歸還日: {{ $order_last_return_date }}

                剩餘天數: {{ $day }}天
            </p>
        </div>

        <div class="card-body opwhite" style=" padding: 0;">
            <div class="container">
                <div class="row">
                    @for ($inside = $now_count; $inside < $now_count + $countdata; $inside++)
                        @php
                            $category = $user_data[$inside]->items_category;
                            $items_id = $user_data[$inside]->items_id;
                            $pic = $category . '_' . $items_id;
                            $items_quantity = $user_data[$inside]->items_quantity;
                        @endphp

                        <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                            <div class="card PUcardtop" style="    margin-bottom: 10px;">
                                <img src="../../picture/PUmountain/borrow/{{ $category }}/{{ $pic }}.jpg" class="card-img-top">
                                <p class="userfontfamily2 tooltitle">數量: {{ $items_quantity }}</p>

                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
        <input type="button" value="管理代歸還" class="btn btn-primary addtext userfontfamily2" name="update_button" style="height: 80px;font-size: 40px;"
            onclick="location.href='https://bakerychu.ddns.net/PUmountain/sendreturnpicview/{{ $order_id }}'">
    </div>

    <div class="orderdivider"></div>

@elseif ($order_status == 0)

    <div class="card PUcardtop">
        <div class="card-header opwhite" style="text-align: center;padding:
            8px;background-color:#66BAB7">
            <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$name}}<br>借用編號: {{ $order_id }}</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
            8px;background-color:red">
            <p class="userfontfamily2 tooltitle " style="color:white">借用情況:已歸還</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
            8px;">
            <p class="userfontfamily2 filefont">
                借用時間: {{ $order_date }}
                最終歸還日: {{ $order_return_date }}
            </p>
        </div>

        <div class="card-body opwhite" style=" padding: 0;">
            <div class="container">
                <div class="row">
                    @for ($inside = $now_count; $inside < $now_count + $countdata; $inside++)
                        @php
                            $category = $user_data[$inside]->items_category;
                            $items_id = $user_data[$inside]->items_id;
                            $pic = $category . '_' . $items_id;
                            $items_quantity = $user_data[$inside]->items_quantity;
                        @endphp

                        <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                            <div class="card PUcardtop" style="    margin-bottom: 10px;">
                                <img src="../../picture/PUmountain/borrow/{{ $category }}/{{ $pic }}.jpg" class="card-img-top">
                                <p class="userfontfamily2 tooltitle">數量: {{ $items_quantity }}</p>

                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>

    </div>

    <div class="orderdivider"></div>

@elseif ($order_status == 99)

    <div class="card PUcardtop">
        <div class="card-header opwhite" style="text-align: center;padding:
                8px;background-color:#66BAB7">
            <p class="userfontfamily2 tooltitle " style="color:white">借用人: {{$name}}<br>借用編號: {{ $order_id }}</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
                8px;background-color:red">
            <p class="userfontfamily2 tooltitle " style="color:white">借用情況:已取消</p>
        </div>
        <div class="card-header opwhite" style="text-align: center;padding:
                8px;">

        </div>

        <div class="card-body opwhite" style=" padding: 0;">
            <div class="container">
                <div class="row">
                    @for ($inside = $now_count; $inside < $now_count + $countdata; $inside++)
                        @php
                            $category = $user_data[$inside]->items_category;
                            $items_id = $user_data[$inside]->items_id;
                            $pic = $category . '_' . $items_id;
                            $items_quantity = $user_data[$inside]->items_quantity;
                        @endphp

                        <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                            <div class="card PUcardtop" style="    margin-bottom: 10px;">
                                <img src="../../picture/PUmountain/borrow/{{ $category }}/{{ $pic }}.jpg" class="card-img-top">
                                <p class="userfontfamily2 tooltitle">數量: {{ $items_quantity }}</p>

                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>

    </div>

    <div class="orderdivider"></div>

    @endif
    @php
    $now_count = $now_count + $countdata;
    @endphp
    @endfor
    
    </div>

    </div>
    </div>
    
@endsection
