<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height: 770px;overflow: hidden;">
    <div class="PUcontainer ">
        <header class="PUnavheader">
            @include('PUmountain.layouts.navbar')
        </header>

        <section id="llooggiinn">
            @if (Session::has('registerinfor'))
            <div class="alert alert-success animate__animated animate__bounce alertsize" style="z-index: 5;"
                role="alert" id="success_alert">
                <p class="alerttext userfontfamily3">{{ session('registerinfor') }}</p>
            </div>
            @endif

            <div class='container' style="margin-top: 15px;">

                <div class="row justify-content-center align-items-center">
                    <div class="col col-sm-8 align-self-center">
                        <div class="card PUcard  border-w-6">
                            <div class="card-header ">
                                <p class="userfontfamily1 loginsize">Register</p>
                            </div>

                            <div class="card-body ">
                                <form method="POST" action="https://bakerychu.ddns.net/PUmountain/store">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="account" class="userfontfamily3 logintext">帳號</label>
                                                <input type="text" name="account" id="account" placeholder="建立個帳號~僅限英文"
                                                    required="required"
                                                    class="form-control PUboxshadow form-control-lg opwhite "
                                                    oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="text" class="userfontfamily3 logintext">姓名</label>
                                                <input type="text" name="nickname" id="nickname" placeholder="輸入本名~"
                                                    required="required"
                                                    class="form-control PUboxshadow form-control-lg opwhite">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="text" class="userfontfamily3 logintext">信箱</label>
                                                <input type="email" name="contactEmail" id="contactEmail"
                                                    placeholder="請輸入能接收郵件信箱~" required="required"
                                                    class="form-control PUboxshadow form-control-lg opwhite">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="text" class="userfontfamily3 logintext"
                                                    style="margin-left: 22px;">聯絡方式(LINE)</label>
                                                <input type="text" name="contactLINE" id="contactLINE"
                                                    placeholder="請輸入LINE ID~" required="required"
                                                    class="form-control PUboxshadow form-control-lg opwhite">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="logi_regis_button_top userfontfamily3 normalsize btn butt PUboxshadow btn-lg btn-block opwhite">
                                                    註冊
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
        </section>
    </div>

</body>

</html>