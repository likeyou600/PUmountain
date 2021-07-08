<!DOCTYPE html>
<html lang="zh-TW">

<head>
    @include('layouts.head')
    <meta charset="utf-8">
    <script src="/PUmountain/bootstrap-input-spinner-master/src/input-spinner.js"></script>
    <script>
        $(function() {
            $("input[type='number']").inputSpinner();
        });
        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
    <title>靜宜大學登山社</title>
</head>

<body class="bodyimg" style="">
    <div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>

    <div class="PUcontainer ">
        <header class="PUnavheader">

            @include('layouts.navbar')
            @include('layouts.alert')
            <div class='PUprofile'>
                <div class="row justify-content-center align-items-center">
                    <div class="col align-self-center">

                        <div class="card border-w-6 " id="usercardstyle" style="border: 0px solid #dee2e6!important;">

                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <p class="userfontfamily2 tooltitle ">器材管理系統</p>
                            </div>
                            <div class="card-header opwhite" style="text-align: center;padding: 8px;">
                                <input type="button" value="新增裝備" data-toggle="modal" data-target="#addnewmodal">
                                @include('admin.addnew_modal')
                            </div>
                            <div class="card-body opwhite" style="    padding: 0;">
                                <div class="row" style="width: 100%;
                                margin-left: 0;">
                                    <div class="col-sm-3 col-12" style="background-color: #6c757d;">
                                        <div class="row">
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="睡墊"
                                                    onclick="location.href='{{route('admin.equipment',array('mat'))}}'">
                                                <input type="button" class="btn btn-secondary" value="睡袋"
                                                    onclick="location.href='{{route('admin.equipment',array('bag'))}}'">
                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="大背包"
                                                    onclick="location.href='{{route('admin.equipment',array('backpack'))}}'">
                                                <input type="button" class="btn btn-secondary" value="帳篷"
                                                    onclick="location.href='{{route('admin.equipment',array('camp'))}}'">
                                            </div>
                                            <div class="col-6 col-sm-12 btn-group-vertical" style="padding: 0">
                                                <input type="button" class="btn btn-secondary" value="爐頭"
                                                    onclick="location.href='{{route('admin.equipment',array('burner'))}}'">
                                                <input type="button" class="btn btn-secondary" value="其他"
                                                    onclick="location.href='{{route('admin.equipment',array('other'))}}'">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-9 col-12" style="background-color:#f1f2f4">
                                        <div class="row">
                                            @foreach($items as $item)
                                            <div class="col-sm-3 col-6 text-center pointimagestyle phoneborrow">
                                                <div class="card PUcardtop">
                                                    <img src="/PUmountain/picture/borrow/{{$category}}/{{ $item->picture }}"
                                                        class="card-img-top">
                                                    <div class="PUcardbody">
                                                        <form action="{{route('admin.change_quantity')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <p class="userfontfamily2 filefont">目前數量:</p>
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="userfontfamily2 filefont"
                                                                    value="{{ $item->quantity }}" min="0" max="99"
                                                                    step="1" name="new_quantity" />
                                                            </div>
                                                            <input type="submit" value="更改數量"
                                                                class="btn btn-primary addtext" onclick="do_click()">
                                                            <input type="button" value="刪除"
                                                                class="btn btn-primary addtext"
                                                                onclick="itemdelete({{$item->id}});"
                                                                data-toggle="modal" data-target="#deleteitemmodal">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @include('admin.deleteitem_modal')
                                            <script>
                                                function itemdelete($id){
                                                    $('#deleteid').val($id);
                                                };
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>


    </div>


    <div style="height: 100px;">

    </div>
</body>

</html>