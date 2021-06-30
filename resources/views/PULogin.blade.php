<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height: 770px;overflow: hidden;">
    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
        </header>

        <section id="llooggiinn">
            @include('layouts.alert')
            <div class='container my-5'>

                <div class="row justify-content-center align-items-center">
                    <div class="col col-sm-8 align-self-center">
                        <div class="card PUcard border-w-6" style="    z-index: 10;">
                            <div class="card-header ">
                                <p class="userfontfamily1 loginsize">Login</p>
                            </div>

                            <div class="card-body ">
                                <form method="POST" action="{{route('auth.login')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="account" class="userfontfamily3 logintext">帳號</label>
                                                <input type="text" name="account" id="account" placeholder="請輸入帳號~"
                                                    required="required" autocomplete="off" value="{{ old('account') }}"
                                                    oninput="this.value=this.value.replace(/[^A-Za-z\d]/g,'')"
                                                    class="form-control PUboxshadow form-control-lg opwhite ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="password" class="userfontfamily3 logintext">密碼</label>
                                                <input type="password" name="password" id="password"
                                                    placeholder="請向管理員取得密碼  或  輸入已知密碼~" required="required"
                                                    class="form-control PUboxshadow form-control-lg opwhite">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class=" logi_regis_button_top userfontfamily3 normalsize btn butt PUboxshadow btn-lg btn-block opwhite ">
                                                    登入
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
    <img src="{{asset('picture/PUmountain/down.png')}}" class="PUpeople">
</body>

</html>