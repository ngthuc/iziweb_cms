<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý menu</h1>
            </div>
            <div class="pull-right">
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/menu/save" class="btn btn-primary" title="Lưu lại">
                    <i class="fa fa-save"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 menu-option">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Trang
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Giới thiệu
                                            </label>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Liên hệ
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Liên hệ
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Liên hệ
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Sứ mệnh
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <div class="container-fluid">
                                    <div class="pull-left check-all-menu">Chọn tất cả</div>
                                    <button class="btn btn-default pull-right">Thêm vào menu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Chủ đề bài viết
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Danh sách chủ đề
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Danh mục sản phẩm
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                Danh sách danh mục
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Đường dẫn
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        <label>Đường dẫn</label>
                                        <input type="text" class="form-control" placeholder="Nhập đường dẫn" value="http://">
                                    </div>
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" class="form-control" placeholder="Tiêu đề">
                                    </div>
                                    <button type="button" class="btn btn-default pull-right">Thêm vào menu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled">
                    <li>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading1">
                                <div class="container-fluid">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                            Trang chủ
                                        </a>
                                        <span class="pull-right">&times;</span>
                                    </h4>
                                </div>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                <div class="panel-body">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input type="text" class="form-control" placeholder="Tiêu đề" value="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>