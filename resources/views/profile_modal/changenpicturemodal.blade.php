<div class="modal fade" id="changenpicturemodal" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">修改頭貼</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('auth.change_picture')}}" id="change_profilepicture"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="btn updatepic" style="background-color: #55c1d2;">
                            <input id="usernewpic" name="usernewpic" style="display:none;" type="file"
                                accept="image/* , .heic" />
                            <i class="fa fa-photo"></i> 選擇新的頭貼
                        </label>

                        <img id="usernewpic_output" style="    width: 40vh;" />
                        <script src="/PUmountain/js/picture.js"></script>
                    </div>

            </div>
            <div class="modal-footer">

                <button type="submit" onclick="do_click()" class="btn btn-primary userfontfamily3">確定更改</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.resetform')
</div>