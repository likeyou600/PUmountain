<div class="modal fade" id="deleteitemmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">刪除裝備</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnResetForm">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('admin.deleteequipment')}}" method="post">
                @csrf
                <input type="hidden" name="deleteid" id="deleteid">
                <button type="submit" class="btn btn-primary">確認刪除</button>
                </form>
              </div>
        </div>
    </div>
</div>