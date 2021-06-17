<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <meta charset="utf-8">
    <script src="https://bakerychu.ddns.net/bootstrap-input-spinner-master/src/input-spinner.js"></script>
   
    <script type="text/javascript">
        function do_change() {
            if (document.getElementById('exampleCheck1').checked) {
                document.getElementById("agree").style.display = "block";

            } else {
                document.getElementById("agree").style.display = "none";
            }
        }

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
                                <p class="userfontfamily2 tooltitle ">靜宜大學登山社-器材借用規則</p>
                            </div>
                            @if (Cart::session($userid)->isEmpty())
                                <div class="col" style="text-align: center;margin-top: 1%;">
                                    <p class="userfontfamily2 tooltitle ">購物車尚無物品</p>
                                </div>
                                <input type="button" value="前往借用" class="btn btn-primary addtext" name="update_button" style="height: 100px;
                                    font-size: 50px;" onclick="location.href='https://bakerychu.ddns.net/PUmountain/borrow/mat'">

                            @else
                                <div class="card-body opwhite" style="    padding: 0;">
                                    <div class="container">
                                        <div class="row" style="background-color: #f1f2f4;">
                                            <p class="userfontfamily4">本規則自「靜宜大學-登山社設備器材管理辦法」修正訂定</p>
                                            <p class="userfontfamily4">一、為健全學生社團發展，提昇社團活動品質與績效，落實社團活動資源有效分配與共享，特訂定本辦法。</p>
                                            <p class="userfontfamily4">二、為了落實社團活動資源公平分配，每一位社員只能借用個人份的裝備</p>
                                            <p class="userfontfamily4">三、器材借用時間為14天 不包含器材拿取時間，若逾期歸還兩次者，停止其該學期借用權。</p>
                                            <p class="userfontfamily4">四、若遇特殊情形欲延長借用時間，請事先與登山社告知情況，器材借出後，不得延長借用時間。</p>
                                            <p class="userfontfamily4">五、借用之器材需妥善使用與保管，若器材因不當使用而損壞，依器材損壞程度賠償。若器材損壞狀況嚴重或遺失，則依市價賠償。</p>
                                            <p class="userfontfamily4">六、拿取器材時，需拍下借用器材之照片，並自行將檔案上傳至本系統。歸還時也必須拍下歸還借用器材之照片，上傳至系統。如故意上傳非器材之照片，停止其該學期借用權。</p>
                                            <p class="userfontfamily4">七、如因社上出隊需要，管理人有權​協調，收回借出之器材。</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-header opwhite" style="text-align: center;padding:
                                    8px;">
                                    <p class="userfontfamily4 " style="font-size: 30px;margin-bottom:0;">
                                        借用人:{{ Session::get('username') }}
                                    </p>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" style="width: 20px;
                                        height: 40px;" onchange="do_change()">
                                        <label class="form-check-label userfontfamily4" style="font-size: 30px; margin-left:10px" for="exampleCheck1">我同意此借用規則</label>
                                    </div>
                                </div>

                                <input type="button" value="前往確認資料" class="btn btn-primary addtext " id="agree" name="agree" style="height: 80px;
                                font-size: 40px;display: none;" onclick="do_click();location.href='https://bakerychu.ddns.net/PUmountain/checksend'">

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
