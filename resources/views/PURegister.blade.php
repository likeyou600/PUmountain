<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height:100%">
    <div class="PUcontainer ">
        <header class="PUnavheader">
            @include('layouts.navbar')
        </header>

        <section id="llooggiinn">
            @include('layouts.alert')
            <div class='container login'>

                <div class="row justify-content-center align-items-center">
                    <div class="col col-sm-6 align-self-center">
                        <div class="card PUcard  border-w-6">
                            <div class="card-header ">
                                <p class="userfontfamily1 loginsize">Register</p>
                            </div>

                            <div class="card-body ">
                                <form method="POST" action="{{ route('auth.register') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="text" class="userfontfamily3 logintext">姓名</label>
                                                <input type="text" name="nickname" id="nickname" placeholder="輸入本名~"
                                                    required="required" autocomplete="off" value="{{ old('nickname') }}"
                                                    class="form-control PUboxshadow form-control-lg opwhite">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="account" class="userfontfamily3 logintext">帳號</label>
                                                <input type="text" name="account" id="account"
                                                    placeholder="建立個帳號~僅限英文、數字" required="required"
                                                    class="form-control PUboxshadow form-control-lg opwhite "
                                                    value="{{ old('account') }}"
                                                    oninput="this.value=this.value.replace(/[^A-Za-z\d]/g,'')"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="text" class="userfontfamily3 logintext">信箱</label>
                                                <input type="email" name="contact_email" id="contact_email"
                                                    placeholder="請輸入能接收郵件的信箱~" required="required"
                                                    style="ime-mode:disabled" value="{{ old('contact_email') }}"
                                                    class="form-control PUboxshadow form-control-lg opwhite">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="text" class="userfontfamily3 logintext"
                                                    style="margin-left: 22px;">聯絡方式(LINE)</label>
                                                <input type="text" name="contact_line" id="contact_line"
                                                    value="{{ old('contact_line') }}" placeholder="請輸入LINE ID~"
                                                    required="required" autocomplete="off"
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