<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý thuộc tính</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/category" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-pencil"></i> Sửa thuộc tính</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/attribute/edit/'.$attribute['id'], array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $attribute['id'] ?>">
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tên:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" placeholder="Tên" class="form-control" value="<?= $attribute['name'] ?>">
                        <?= form_error('name') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giá trị mặc định:</label>
                    <div class="col-sm-9">
                        <input type="text" name="default_value" placeholder="Giá trị mặc định" class="form-control">
                        <?= form_error('default_value') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nhóm thuộc tính:</label>
                    <div class="col-sm-9">
                        <select name="attr_group_id" class="form-control">
                            <?php foreach ($attr_groups as $item): ?>
                                <?php if ($item['id'] == $attribute['attr_group_id']): ?>
                                    <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>