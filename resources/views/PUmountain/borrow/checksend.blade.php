<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <meta charset="utf-8">
    <script src="https://bakerychu.ddns.net/PUmountain/bootstrap-input-spinner-master/src/input-spinner.js"></script>
    <script>
        $(function() {
            $("input[type='number']").inputSpinner();
        })

        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height: 770px;">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
    @php
        $userid = Session::get('userid');
    @endphp
    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('PUmountain.layouts.navbar')
            @if (Session::has('message'))
                <div class="alert alert-success animate__animated animate__bounce alertsize" style="z-index: 5;" role="alert" id="success_alert">
                    <p class="alerttext userfontfamily3">{{ session('message') }}</p>
                </div>
            @endif
            <script type="text/javascript">
                window.setTimeout(function() {
                    $('#success_alert').alert('close');
                }, 2000);

            </script>
            <div class='PUprofile cartcontainer margintop'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <p class="userfontfamily2 tooltitle ">器材借用系統-借用確認</p>
                            </div>
                            @if (Cart::session($userid)->isEmpty())
                                <div class="col" style="text-align: center;margin-top: 1%;">
                                    <p class="userfontfamily2 tooltitle ">購物車尚無物品</p>
                                </div>
                                <input type="button" value="前往借用" class="btn btn-primary addtext" name="update_button" style="height: 100px;
                                    font-size: 50px;" onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/mat'">

                            @else
                                <input type="button" value="按下開始借用" class="btn btn-primary addtext" name="update_button" style="height: 80px;
                                            font-size: 40px;" onclick="do_click();location.href='https://bakerychu.ddns.net/PUmountain/carttodb'">

                                <div class="card-header opwhite" style="text-align: center;padding:
                                    8px;">
                                    <p class="userfontfamily4 " style="font-size: 30px;margin-bottom:0;">
                                        借用人:{{Session::get('username')}}
                                    </p>
                                </div>


                                <div class="card-body opwhite" style="    padding: 0;">
                                    <div class="container">
                                        <div class="row" style="background-color: #f1f2f4;">
                                            @foreach (Cart::session($userid)->getContent() as $row)

                                                @php
                                                    $id = $row->id;
                                                    $pic = $row->name;
                                                    $category = $row->attributes->category;
                                                    $quantity = $row->quantity;
                                                   
                                                @endphp

                                                <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                                                    <div class="card PUcardtop" style="margin-bottom: 10px;">
                                                        <img src="picture/PUmountain/borrow/{{ $category }}/{{ $pic }}.jpg"
                                                            class="card-img-top">
                                                        
                                                            
                                                            <div class="PUcardbody">
                                                                <p class="userfontfamily2 filefont">選擇數量為:{{ $quantity }}</p>




                                                            </div>
                                                        
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </header>


    </div>


    <div class="white_mobile">

    </div>
</body>

</html>
