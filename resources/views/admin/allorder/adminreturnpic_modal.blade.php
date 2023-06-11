<div class="modal fade" id="adminreturnpicmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">上傳照片</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modeal_body">
                <div class="card-header opwhite" style="text-align: center;padding:
                8px;">
            
                    <p class="userfontfamily2 " style="font-size: 30px;margin-bottom:0;" id="return_order_username">
                    </p>
                    <p class="userfontfamily2 " style="font-size: 30px;margin-bottom:0;" id="return_show_order_id">
                    </p>
                    <p class="userfontfamily2 " style="font-size:22px;margin-bottom:0;color:red">
                        注意事項:<br>
                        1.請將裝備放在一起<br>拍『一張』照上傳就好<br><br>2.
                        使用iphone手機的幹部<br>請先使用相機拍完照後<br>再點選下方上傳按鈕<br>從相簿選取照片上傳
                    </p>

                    <form method="POST" action="{{route('admin.helpreturn')}}" enctype="multipart/form-data" id="adminreturnpic">
                        @csrf
                        <input type="hidden" name="return_order_id" id="return_order_id">
                        <div class="form-group">
                            <label class="btn updatepic" style="background-color: #55c1d2;">
                                <input id="admin_returnpic2" name="admin_returnpic2" style="display:none;" type="file" accept="image/* , .heic" />
                                <i class="fa fa-photo"></i> 代傳歸還圖片
                            </label>

                            <img id="admin_output2" style="    width: 40vh;" />
                            <script src="/PUmountain/js/picture.js"></script>
                        </div>
                </div>
            </div>

            <div class="modal-footer">
                <input type="submit" value="管理代傳歸還圖片" class="btn btn-primary addtext userfontfamily2" style="height: 80px;
            font-size: 40px;width: 100%;" onclick="do_click()">

            </div>
            </form>
        </div>
    </div>
    @include('layouts.resetform')

</div>