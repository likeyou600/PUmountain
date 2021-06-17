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

    </script>
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="height: 770px;">
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
            <div class='PUprofile'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">


                                <p class="userfontfamily2 tooltitle ">社員借用管理</p>

                            </div>

                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="row" style="width: 100%;
                                margin-left: 0;">
                                    <div class="col-sm-3 col-12" style="background-color: #6c757d;">
                                        <div class="row">
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="所有借用"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/admin/allorder/all'">
                                                <input type="button" class="btn btn-secondary" value="領取中"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/admin/allorder/waitoget'">
                                               
                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                
                                                <input type="button" class="btn btn-secondary" value="借用中"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/admin/allorder/borrowing'">
                                                <input type="button" class="btn btn-secondary" value="已歸還"
                                                    onclick="location.href='https://bakerychu.ddns.net/PUmountain/admin/allorder/done'">

                                            </div>

                                            

                                        </div>
                                    </div>

                                    <div class="col-sm-9 col-12" style="background-color:#f1f2f4">


                                        @yield('all')
                                        @yield('waitoget')
                                        @yield('borrowing')
                                        @yield('done')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>


    </div>


    <div style="height: 270px;">

    </div>

    
</body>

</html>
