<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý khách hàng</h1>
            </div>
            <div class="pull-right">
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/customer/add_new" class="btn btn-primary" title="Thêm mới">
                    <i class="fa fa-plus"></i>
                </a>
                <button data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Xóa" onclick="if(confirm('Bạn có chắc chắn xóa?')) {$('#action').val('delete');$('form').submit();}">
                    <i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <?= form_open('admin/customer/mass_action') ?>
                <input id="action" type="hidden" name="action" value="">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Tên KH</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php foreach ($customers as $item): ?>
                        <tr>
                            <td><input type="checkbox" name="check[<?= $item['id'] ?>]" class="row-checkbox" id="<?= $item['id'] ?>"></td>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['username'] ?></td>
                            <td><?= $item['email'] ?></td>
                            <td><?= $item['full_name'] ?></td>
                            <td><?= $item['status']==1?'<span class="text-danger">Đã kích hoạt</span>':'Chưa kích hoạt' ?></td>
                            <td>
                                <a data-toggle="tooltip" data-placement="left" class="btn btn-sm btn-primary" title="Sửa"
                                   href="<?= BASE_URL ?>admin/customer/edit/<?= $item['id'] ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <?php if ($item['status'] == 0): ?>
                                    <a data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-success" title="Kích hoạt"
                                    href="<?= BASE_URL ?>admin/customer/active/<?= $item['id'].'/'.$this->security->get_csrf_hash() ?>">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                <?php else: ?>
                                    <a data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-warning" title="Xóa kích hoạt"
                                       href="<?= BASE_URL ?>admin/customer/de_active/<?= $item['id'].'/'.$this->security->get_csrf_hash() ?>">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                <?php endif; ?>
                                <a data-toggle="tooltip" data-placement="right" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-sm btn-danger" title="Xóa"
                                    href="<?= BASE_URL ?>admin/customer/delete/<?= $item['id'].'/'.$this->security->get_csrf_hash() ?>">
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