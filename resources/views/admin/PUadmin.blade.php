<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height: 770px;">
    <div class="PUcontainer ">
        <header class="PUnavheader">
            
            @include('PUmountain.layouts.navbar')
    </header>

    <section id="llooggiinn">
        @if (Session::has('userprofile'))
        <div id="useralert" class="alert alert-success animate__animated animate__bounce alertsize" role="alert"
            style="margin-bottom: -35px;z-index: 5;">
            <p class="alerttext userfontfamily3">{{ Session::get('userprofile') }}</p>
        </div>
        @endif
        <script type="text/javascript">
            window.setTimeout(function() {
            $('#useralert').alert('close');
        }, 4000);

        </script>

        <div class='container PUprofile'>
            <div class="row justify-content-center align-items-center">
                <div class="col align-self-center">

                    <div class="card PUcard border-w-6 " id="usercardstyle">

                        <div class="card-header ">
                            <p class="userfontfamily2 loginsize">管理模式</p>
                        </div>
                        
                        <div class="card-body ">
                            

                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="location.href='/PUmountain/admin/member'"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                        社員管理
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="location.href='/PUmountain/admin/equipment'"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                        器材數量
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="location.href='/PUmountain/admin/addnewitem'"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                        添加器材
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button onclick="location.href='/PUmountain/admin/allorder/all'"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg logincolor">
                                        所有社員借用情況
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    </div>
   

</body>

</html>