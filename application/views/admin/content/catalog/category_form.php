<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý danh mục</h1>
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
                <h2 class="panel-title"><i class="fa fa-plus"></i> Thêm mới danh mục</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/category/add_new', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Tên:</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" placeholder="Tên" class="form-control">
                            <?= form_error('name') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Đường dẫn:</label>
                        <div class="col-sm-9">
                            <input type="text" name="slug" placeholder="Để trống nếu muốn mặc định" class="form-control">
                            <?= form_error('slug') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Danh mục cha:</label>
                        <div class="col-sm-9">
                            <select name="parent_id" class="form-control">
                                <option value="0">Không có</option>
                                <?php category_option($categories) ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Thẻ tiêu đề:</label>
                        <div class="col-sm-9">
                            <input type="text" name="tag_title" placeholder="Title tag" class="form-control">
                            <?= form_error('tag_title') ?>
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-confirm">Thẻ mô tả:</label>
                    <div class="col-sm-9">
                        <input type="text" name="tag_title" placeholder="Meta description" class="form-control">
                        <?= form_error('tag_description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ từ khóa:</label>
                    <div class="col-sm-9">
                        <input type="text" name="tag_keywords" placeholder="Meta keywords" class="form-control">
                        <?= form_error('tag_keywords') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-control">
                            <option value="0">Ẩn</option>
                            <option value="1" selected>Hiển thị</option>
                        </select>
                        <?= form_error('status') ?>
                    </div>
                </div>
                    <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>