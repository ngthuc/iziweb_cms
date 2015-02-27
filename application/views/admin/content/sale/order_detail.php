<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Chi tiết đơn đặt hàng</h1>
            </div>
            <div class="pull-right">
                <?php if ($order['status'] == 1): ?>
                    <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/order/check_out/<?= $order['id'].'/'.$this->security->get_csrf_hash() ?>" class="btn btn-success" title="Đã thanh toán">
                        <i class="fa fa-check"></i>
                    </a>
                <?php endif; ?>
                <button data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Xóa" onclick="if(confirm('Bạn có chắc chắn xóa?')) {$('#action').val('delete');$('form').submit();}">
                    <i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 25px">
                <li role="presentation" class="active"><a href="#order" aria-controls="order" role="tab" data-toggle="tab">Đơn hàng</a></li>
                <li role="presentation"><a href="#product" aria-controls="product" role="tab" data-toggle="tab">Sản phẩm</a></li>
            </ul>
            <!-- tab content -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="order">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td><?= $order['id'] ?></td>
                            </tr>
                            <tr>
                                <td>Thời gian</td>
                                <td><?= $order['order_time'] ?></td>
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td><?= $order['amount'] ?></td>
                            </tr>
                            <tr>
                                <td>Thông tin</td>
                                <td><?= $order['order_info'] ?></td>
                            </tr>
                            <tr>
                                <td>Tên KH</td>
                                <td><?= $order['full_name'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $order['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?= $order['address'] ?></td>
                            </tr>
                            <tr>
                                <td>SĐT</td>
                                <td><?= $order['phone'] ?></td>
                            </tr>
                            <tr>
                                <td>Mã KH</td>
                                <td><?= $order['customer_id'] ?></td>
                            </tr>
                            <tr>
                                <td>Trạng thái</td>
                                <td><?= $order['status']==1?'<strong class="text-danger">Mới</strong>':'Đã TT' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="product">
                    <!-- products list -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                            <?php $i = 1; foreach ($products_order as $item): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $item['product_name'] ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td><?= $item['unit_price'] ?></td>
                                    <td><?= $item['quantity']*$item['unit_price'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Tổng</td>
                                <td><strong class="text-danger"><?= $order['amount'] ?></strong></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!--/ products list -->
                </div>
            </div>
        </div>
    </div>
</div>