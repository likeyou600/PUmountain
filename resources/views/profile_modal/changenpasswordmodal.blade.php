<div class="modal fade" id="changenpasswordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">修改密碼</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('auth.change_password')}}" id="changenpassword"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="請輸入舊密碼" name="oldpassword"
                            required="required">
                        <input type="text" class="form-control" style="    margin: 10px 0px;
                                                                    " placeholder="請輸入新密碼" name="password"
                            required="required">
                        <input type="text" class="form-control" placeholder="請再一次輸入新密碼" name="password_confirmation"
                            required="required">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary userfontfamily3">確定更改</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.resetform')
</div>