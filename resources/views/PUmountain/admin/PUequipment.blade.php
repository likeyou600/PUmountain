<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('PUmountain.layouts.head')
    <title>靜宜大學登山社</title>
    <link rel="stylesheet" href="{{ asset('css/PUmountain/table.css') }}">
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
</head>

<body class="bodyimg" style="">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('PUmountain.layouts.navbar')
        </header>

        <section id="llooggiinn">
            @if (Session::has('message'))
                <div id="useralert" class="alert alert-success animate__animated animate__bounce alertsize" role="alert"
                    style="margin-bottom: -35px;z-index: 5;">
                    <p class="alerttext userfontfamily3">{{ Session::get('message') }}</p>
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

                        <div class="card border-w-6 " id="usercardstyle" style="background-color: darkseagreen;">

                            <div class="card-header ">
                                <p class="userfontfamily2 loginsize">器材調整</p>
                            </div>

                            <div class="card-body ">
                                <div class="row">
                                    @foreach ($itemdata as $item)
                                    <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                                        
                                        <div class="card PUcardtop">
                                            
                                                
                                            
                                            <img src="../picture/PUmountain/borrow/{{ $item->items_category }}/{{ $item->items_picture }}" class="card-img-top">
                                            <form action="https://bakerychu.ddns.net/PUmountain/admin/change_equipment" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="category" value="{{ $item->items_category }}">
                                                <input type="hidden" name="id" value="{{ $item->items_id }}">
                                                <div class="PUcardbody">
                                                    <p class="userfontfamily2 filefont">數量: {{ $item->items_quantity }} 個</p>
                                                    <div class="input-group mb-3">


                                                        <input type="number" class="userfontfamily2 filefont" value="{{ $item->items_quantity }}" min="0"
                                                             step="1" name="select" />


                                                    </div>
                                                    <input type="submit" onclick="do_click() " value="更改數量" class="btn btn-primary addtext">

                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                        @endforeach
                                    

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <div style="height: 100px;">

    </div>

</body>

</html>
