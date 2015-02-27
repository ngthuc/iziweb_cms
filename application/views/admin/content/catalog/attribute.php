<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý thuộc tính</h1>
            </div>
            <div class="pull-right">
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/attribute/add_new" class="btn btn-primary" title="Thêm mới">
                    <i class="fa fa-plus"></i>
                </a>
                <button data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Xóa" onclick="if(confirm('Bạn có chắc chắn xóa?')) {$('#action').val('delete');$('form').submit();}">
                    <i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="sr-only"></label>
                            <select class="form-control" id="attr-group-select">
                                <option value="0">Tất cả nhóm thuộc tính</option>
                                <?php foreach ($attr_groups as $item): ?>
                                    <?php if ($item['id'] == $attr_group): ?>
                                        <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php else: ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <a onclick="$(this).attr('href', '<?= BASE_URL ?>admin/attribute/attr_group/'+$('#attr-group-select').val())" id="attr-group-btn" class="btn btn-primary" href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <?= form_open('admin/attribute/mass_action') ?>
                <input id="action" type="hidden" name="action" value="">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th><input type="checkbox" id="check-all"></th>
                        <th>Id</th>
                        <th>Tên thuộc tính</th>
                        <th>Giá trị mặc định</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php foreach ($attributes as $item): ?>
                        <tr>
                            <td><input type="checkbox" name="check[<?= $item['id'] ?>]" class="row-checkbox" id="<?= $item['id'] ?>"></td>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['default_value'] ?></td>
                            <td>
                                <a data-toggle="tooltip" data-placement="left" class="btn btn-sm btn-primary" title="Sửa" href="<?= BASE_URL ?>admin/attribute/edit/<?= $item['id'] ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a data-toggle="tooltip" data-placement="right" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-sm btn-danger" title="Xóa"
                                    href="<?= BASE_URL ?>admin/attribute/delete/<?= $item['id'].'/'.$this->security->get_csrf_hash() ?>">
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