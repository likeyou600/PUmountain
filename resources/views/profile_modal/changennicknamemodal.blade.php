<div class="modal fade" id="changennicknamemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">修改名子</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('auth.change_nickname')}}" id="changennickname"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="請用本名歐~" name="newnickname">

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
