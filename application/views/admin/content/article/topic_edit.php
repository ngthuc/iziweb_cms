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
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/topic" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-pencil"></i> Sửa chủ đề</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/topic/edit/'.$topic['id'], array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $topic['id'] ?>">
                <div class="form-group required">
                    <label class="col-sm-3 control-label">Tên:</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" placeholder="Tên" class="form-control" value="<?= $topic['name'] ?>">
                        <?= form_error('name') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Đường dẫn:</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" placeholder="Để trống nếu muốn mặc định" class="form-control">
                        <?= form_error('slug') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Chủ đề cha:</label>
                    <div class="col-sm-8">
                        <select name="parent_id" class="form-control">
                            <option value="0">Không có</option>
                            <?php topic_option($topics, $topic['parent_id']) ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thẻ tiêu đề (title):</label>
                    <div class="col-sm-8">
                        <input value="<?= $topic['tag_title'] ?>" type="text" name="tag_title" placeholder="Thẻ tiêu đề" class="form-control">
                        <?= form_error('tag_title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="input-confirm">Thẻ mô tả (meta description):</label>
                    <div class="col-sm-8">
                        <input value="<?= $topic['tag_description'] ?>" type="text" name="tag_title" placeholder="Thẻ mô tả" class="form-control">
                        <?= form_error('tag_description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Thẻ từ khóa (meta keywords):</label>
                    <div class="col-sm-8">
                        <input value="<?= $topic['tag_keywords'] ?>" type="text" name="tag_keywords" placeholder="Thẻ từ khóa" class="form-control">
                        <?= form_error('tag_keywords') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Trạng thái:</label>
                    <div class="col-sm-8">
                        <select name="status" class="form-control">
                            <?php if ($topic['status'] == 1): ?>
                                <option value="0">Ẩn</option>
                                <option value="1" selected>Hiển thị</option>
                            <?php else: ?>
                                <option value="0" selected>Ẩn</option>
                                <option value="1">Hiển thị</option>
                            <?php endif; ?>
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