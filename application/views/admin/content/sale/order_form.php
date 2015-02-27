<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý nhóm thuộc tính</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/attr_group" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-plus"></i> Thêm mới nhóm thuộc tính</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/attr_group/add_new', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                    <div class="form-group required">
                        <label class="col-sm-3 control-label">Tên:</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" placeholder="Tên" class="form-control">
                            <?= form_error('name') ?>
                        </div>
                    </div>
                    <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>