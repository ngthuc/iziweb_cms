<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý đơn đặt hàng</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Xóa" onclick="if(confirm('Bạn có chắc chắn xóa?')) {$('#action').val('delete');$('form').submit();}">
                    <i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <?= form_open('admin/order/mass_action') ?>
                <input id="action" type="hidden" name="action" value="">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>Id</th>
                        <th>Thời gian</th>
                        <th>Tổng tiền</th>
                        <th>Tên KH</th>
                        <th>Mã KH</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php foreach ($orders as $item): ?>
                        <tr>
                            <td><input type="checkbox" name="check[<?= $item['id'] ?>]" class="row-checkbox" id="<?= $item['id'] ?>"></td>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['order_time'] ?></td>
                            <td><?= $item['amount'] ?></td>
                            <td><?= $item['full_name'] ?></td>
                            <td><?= $item['customer_id'] ?></td>
                            <td><?= $item['status']==1?'<strong class="text-danger">Mới</strong>':'Đã TT' ?></td>
                            <td>
                                <a data-toggle="tooltip" data-placement="left" class="btn btn-sm btn-primary" title="Xem chi tiết"
                                    href="<?= BASE_URL ?>admin/order/view/<?= $item['id'] ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <?php if ($item['status'] == 1): ?>
                                    <a data-toggle="tooltip" data-placement="top" class="btn btn-sm btn-success" title="Đã thanh toán"
                                    href="<?= BASE_URL ?>admin/order/check_out/<?= $item['id'].'/'.$this->security->get_csrf_hash() ?>">
                                        <i class="fa fa-check"></i>
                                    </a>
                                <?php endif; ?>
                                <a data-toggle="tooltip" data-placement="right" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-sm btn-danger" title="Xóa"
                                    href="<?= BASE_URL ?>admin/order/delete/<?= $item['id'].'/'.$this->security->get_csrf_hash() ?>">
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