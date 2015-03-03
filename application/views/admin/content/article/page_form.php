<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý trang</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/page" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-plus"></i> Thêm mới trang</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/page/add_new', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tiêu đề:</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" placeholder="Tiêu đề" class="form-control">
                        <?= form_error('title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày đăng:</label>
                    <div class="col-sm-9">
                        <input type="text" name="post_date" placeholder="Mặc định là hôm nay" class="form-control date-picker">
                        <?= form_error('post_date') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tác giả:</label>
                    <div class="col-sm-9">
                        <input type="text" name="author" placeholder="Tác giả" class="form-control">
                        <?= form_error('author') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh đại diện:</label>
                    <div class="col-sm-2">
                        <input id="thumbnail-btn" type="button" class="btn btn-sm btn-primary" value="Chọn ảnh">
                        <?= form_error('thumbnail') ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-7">
                        <img id="product-thumbnail" class="product-thumbnail" src="<?= BASE_URL ?>assets/img/no-img.png">
                        <input type="hidden" name="thumbnail" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tóm tắt:</label>
                    <div class="col-sm-9">
                        <textarea rows="7" class="form-control" name="excerpt" placeholder="Để trống nếu muốn mặc định"></textarea>
                        <?= form_error('excerpt') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nội dung:</label>
                    <div class="col-sm-9">
                        <textarea id="editor" class="form-control" name="content"></textarea>
                        <?= form_error('content') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tag bài viết:</label>
                    <div class="col-sm-9">
                        <input name="tags" class="form-control" type="text" value="" data-role="tagsinput" />
                        <?= form_error('tags') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ tiêu đề:</label>
                    <div class="col-sm-9">
                        <input type="text" name="tag_title" placeholder="title tag" class="form-control">
                        <?= form_error('tag_title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ mô tả:</label>
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
                <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // add post thumbnail
        $("#thumbnail-btn").click(function() {
            window.KCFinder = {
                callBack: function (url) {
                    window.KCFinder = null;
                    $("#product-thumbnail").attr("src", url);
                    $("input[name='thumbnail']").val(url);
                }
            };
            window.open(base_url + 'assets/plugin/kcfinder/browse.php?type=images&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                    'directories=0, resizable=1, scrollbars=0, width=800, height=600'
            );
        });

        // editor
        CKEDITOR.replace("editor", {
            height: '800'
        });
    });
</script>