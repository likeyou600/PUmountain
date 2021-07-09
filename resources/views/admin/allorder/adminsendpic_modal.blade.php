<div class="modal fade" id="adminsendpicmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">上傳照片</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnResetForm">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modeal_body">
                <div class="card-header opwhite" style="text-align: center;padding:
                8px;">
                    <p class="userfontfamily2 " style="font-size: 30px;margin-bottom:0;" id="order_username">
                        
                    </p>
                    <p class="userfontfamily2 " style="font-size: 30px;margin-bottom:0;" id="show_order_id">
                    </p>

                    <form method="POST" action="{{route('admin.helpborrow')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_id" id="order_id">
                        <div class="form-group">
                            <label class="btn updatepic" style="background-color: #55c1d2;">
                                <input id="admin_sendpic1" name="admin_sendpic1" style="display:none;" type="file" accept="image/* , .heic" />
                                <i class="fa fa-photo"></i> 代上傳圖片
                            </label>

                            <img id="admin_output1" style="    width: 40vh;" />
                            <script src="/PUmountain/js/picture.js"></script>
                        </div>


                   
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="管理代傳圖片" class="btn btn-primary addtext userfontfamily2" style="height: 80px;
            font-size: 40px;width: 100%;" onclick="do_click()">
               
            </div>
        </form>
        </div>
    </div>
</div>