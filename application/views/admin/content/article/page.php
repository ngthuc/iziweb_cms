<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý trang</h1>
            </div>
            <div class="pull-right">
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/page/add_new" class="btn btn-primary" title="Thêm mới">
                    <i class="fa fa-plus"></i>
                </a>
                <button data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Xóa" onclick="if(confirm('Bạn có chắc chắn xóa?')) {$('#action').val('delete');$('form').submit();}">
                    <i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="well product-well">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="search-box"></label>
                            <input type="text" class="form-control" id="search-box" placeholder="Tìm kiếm">
                        </div>
                        <a onclick="$(this).attr('href', '<?= BASE_URL ?>admin/page/search/'+$('#search-box').val())" id="search-btn" href="<?= BASE_URL ?>admin/page/search" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">

                </div>
            </div>
        </div>

        <div class="table-responsive">
            <?= form_open('admin/page/mass_action') ?>
                <input id="action" type="hidden" name="action" value="">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>Id</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Tác giả</th>
                        <th>Lượt xem</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php foreach ($posts as $item): ?>
                        <tr>
                            <td><input type="checkbox" name="check[<?= $item['id'] ?>]" class="row-checkbox" id="<?= $item['id'] ?>"></td>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['title'] ?></td>
                            <td><?= $item['post_date'] ?></td>
                            <td><?= $item['author'] ?></td>
                            <td><?= $item['views'] ?></td>
                            <td><?= $item['status']==1?'Hiển thị':'Ẩn' ?></td>
                            <td>
                                <a data-toggle="tooltip" data-placement="left" class="btn btn-sm btn-primary" title="Sửa"
                                   href="<?= BASE_URL ?>admin/page/edit/<?= $item['id'] ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a data-toggle="tooltip" data-placement="right" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-sm btn-danger" title="Xóa"
                                    href="<?= BASE_URL ?>admin/page/delete/<?= $item['id'].'/'.$this->security->get_csrf_hash() ?>">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </form>
        </div>
        <!-- pagination -->
        <nav>
            <ul class="pagination">
                <?= $pagination ?>
            </ul>
        </nav>
        <!--/ pagination -->
    </div>
</div>