<div class="modal fade" id="editpromptersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">更新跑馬燈</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <form action="{{route('admin.changeprompters')}}" method="post" id="deleteitem">

            <div class="modal-bodu" style="text-align: center;">
                <input class="modal-title userfontfamily3 changename_modalsize" type="text" name="promptercontext" id="promptercontext" style="    width: 90%;
                margin: 5px;
                font-size: 20px;">
            </div>
          
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @csrf
                <input type="hidden" name="prompterid" id="prompterid">
                <button type="submit" class="btn btn-primary">更新跑馬燈</button>
                </form>
              </div>
        </div>
    </div>

</div>