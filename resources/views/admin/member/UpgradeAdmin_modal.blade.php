<div class="modal fade" id="UpgradeAdminmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">升為管理員</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-bodu">
                <p class="modal-title userfontfamily3 changename_modalsize" id="UpgradeAdminname"></p>
            </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('admin.promotion')}}" method="post" id="deleteitem">
                @csrf
                <input type="hidden" name="UpgradeAdminid" id="UpgradeAdminid">
                <button type="submit" class="btn btn-primary">確認升級</button>
                </form>
              </div>
        </div>
    </div>

</div>