<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý khách hàng</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/customer" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-plus"></i> Thêm mới khách hàng</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/customer/add_new', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-username">Username:</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" placeholder="Username" id="input-username" class="form-control">
                        <?= form_error('username') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-email">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" placeholder="Email" id="input-email" class="form-control">
                        <?= form_error('email') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-password">Mật khẩu:</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" placeholder="Mật khẩu" id="input-password" class="form-control" autocomplete="off">
                        <?= form_error('password') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Nhập lại mật khẩu:</label>
                    <div class="col-sm-9">
                        <input type="password" name="confirm" placeholder="Nhập lại mật khẩu" id="input-confirm" class="form-control">
                        <?= form_error('confirm') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Họ tên:</label>
                    <div class="col-sm-9">
                        <input type="text" name="full_name" placeholder="Họ tên đầy đủ" class="form-control">
                        <?= form_error('full_name') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Địa chỉ:</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" placeholder="Địa chỉ" class="form-control">
                        <?= form_error('address') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Số điện thoại:</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                        <?= form_error('phone') ?>
                    </div>
                </div>
                <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>