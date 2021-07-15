<div class="modal fade" id="addnewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true " data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 2.3rem;">
            <div class="modal-header">
                <p class="modal-title userfontfamily3 changename_modalsize" id="exampleModalCenterTitle">添加新裝備</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.newequipment')}}" enctype="multipart/form-data" id="addnew">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">

                        <select class="form-select userfontfamily4" aria-label="Default select example"
                            name="category" style="    font-size: 25px;
                                                    margin-bottom: 25px;">
                            <option selected value="0">選取新裝備類別</option> 
                            <option value="1" class="userfontfamily4">睡墊</option>
                            <option value="2" class="userfontfamily4">大背包</option>
                            <option value="3" class="userfontfamily4">爐頭</option>
                            <option value="4" class="userfontfamily4">帳篷</option>
                            <option value="5" class="userfontfamily4">睡袋</option>
                            <option value="6" class="userfontfamily4">其他</option>
                        </select>
                        <input type="number" class="userfontfamily2 filefont" value="0" min="1" max=20 step="1"
                            name="select" />

                        <label class="btn updatepic" style="background-color: #55c1d2;">
                            <input id="pic" name="pic" style="display:none;" type="file" accept="image/*" />
                            <script src="/PUmountain/js/picture.js"></script>
                            <i class="fa fa-photo"></i> 上傳圖片
                        </label>
                        <div>
                            <img id="output" style="    width: 40vh;" />
                        </div>
                    </div>
                    <input type="submit" value="新增新裝備" class="btn btn-primary addtext userfontfamily2" style="height: 80px;
                                font-size: 40px;width: 100%;" onclick="do_click()">

                </form>
            </div>
        </div>
    </div>
    @include('layouts.resetform')

</div>