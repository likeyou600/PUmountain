<div class="modal fade" id="newyearmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">新增學年分</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.addnewyear')}}" id="changenpassword"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="請輸入新學年分 例如110-1 110-2" name="newyear" autocomplete="off"
                            required="required">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary userfontfamily3">確定新增</button>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.resetform')
</div>