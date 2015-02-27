<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý tài khoản</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/user" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-pencil"></i> Sửa tài khoản</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/user/edit/'.$user['id'], array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="form-group required">
                        <label class="col-sm-3 control-label" for="input-username">Username:</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" value="<?= $user['username'] ?>" placeholder="Username" id="input-username" class="form-control">
                            <?= form_error('username') ?>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-3 control-label" for="input-email">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email" id="input-email" class="form-control">
                            <?= form_error('email') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="change-pass-label" class="col-sm-3 control-label" data-toggle="collapse" href="#change-pass-box" aria-expanded="false" aria-controls="changePassword">
                            <i class="fa fa-question"></i> Đổi mật khẩu:
                        </label>
                    </div>
                    <div class="collapse" id="change-pass-box">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="old_password">Mật khẩu cũ:</label>
                            <div class="col-sm-8">
                                <input type="password" name="old_password" placeholder="Mật khẩu cũ" id="old_password" class="form-control" autocomplete="off">
                                <?= form_error('old_password') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="password">Mật khẩu mới:</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" placeholder="Mật khẩu mới" id="password" class="form-control" autocomplete="off">
                                <?= form_error('password') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="confirm">Nhập lại mật khẩu:</label>
                            <div class="col-sm-8">
                                <input type="password" name="confirm" placeholder="Nhập lại mật khẩu" id="confirm" class="form-control">
                                <?= form_error('confirm') ?>
                            </div>
                        </div>
                    </div>
                    <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>