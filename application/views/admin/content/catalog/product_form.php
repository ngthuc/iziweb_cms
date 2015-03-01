<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý sản phẩm</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/product" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-plus"></i> Thêm mới sản phẩm</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/product/add_new', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tên sản phẩm:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" placeholder="Tên sản phẩm" class="form-control">
                        <?= form_error('name') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Giá bán:</label>
                    <div class="col-sm-9">
                        <input type="text" name="price" placeholder="Giá bán" class="form-control">
                        <?= form_error('price') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giá khuyến mại:</label>
                    <div class="col-sm-9">
                        <input type="text" name="sale" placeholder="Để trống nếu không có khuyến mại" class="form-control">
                        <?= form_error('sale') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Số lượng:</label>
                    <div class="col-sm-9">
                        <input type="text" name="quantity" placeholder="Số lượng" class="form-control">
                        <?= form_error('quantity') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thuộc danh mục:</label>
                    <div class="col-sm-9">
                        <select name="category_id" class="form-control">
                            <?php category_option($categories) ?>
                        </select>
                        <?= form_error('category_id') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh đại diện:</label>
                    <div class="col-sm-2">
                        <input id="add-thumbnail-btn" type="button" class="btn btn-sm btn-primary" value="Chọn ảnh">
                        <?= form_error('thumbnail') ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <img id="product-thumbnail" class="product-thumbnail" src="<?= BASE_URL ?>assets/img/no-img.png">
                        <input type="hidden" name="thumbnail" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh sản phẩm:</label>
                    <div class="col-sm-2">
                        <input id="add-images-btn" type="button" class="btn btn-sm btn-primary" value="Thêm ảnh">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2">
                        <ul class="list-inline" id="images-list">

                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="status">
                            <option value="0">Ẩn</option>
                            <option value="1" selected>Hiển thị</option>
                        </select>
                        <?= form_error('status') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Mô tả sản phẩm:</label>
                    <div class="col-sm-9">
                        <textarea id="editor" class="form-control" name="description" placeholder="Mô tả chi tiết sản phẩm"></textarea>
                        <?= form_error('description') ?>
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

                <div class="form-group">
                    <label id="change-pass-label" class="col-sm-3 control-label" data-toggle="collapse" href="#attribute-box" aria-expanded="false" aria-controls="changePassword">
                        <i class="fa fa-question"></i> Các thuộc tính phụ:
                    </label>
                </div>
                <div class="collapse well" id="attribute-box">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="old_password">Nhóm thuộc tính:</label>
                        <div class="col-sm-7">
                            <select id="attr-group-select" class="form-control">
                                <option value="0">Chọn nhóm thuộc tính</option>
                                <?php foreach ($attr_group as $item): ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input id="token" type="hidden" name="token" value="<?= $this->security->get_csrf_hash() ?>">
                        </div>
                    </div>
                    <div class="" id="attr-box">

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
        // add product thumbnail
        $("#add-thumbnail-btn").click(function() {
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

        // add product images
        $("#add-images-btn").click(function () {
            window.KCFinder = {
                callBack: function (url) {
                    window.KCFinder = null;
                    img_item = "<li><img class='product-image' src='"+url+"'><button class='close-button' type='button'><span>×</span></button><input type='hidden' name='img[]' value='" + url + "'></li>";
                    $("#images-list").append(img_item);
                }
            };
            window.open(base_url + 'assets/plugin/kcfinder/browse.php?type=images&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                    'directories=0, resizable=1, scrollbars=0, width=800, height=600'
            );
        });

        // delete product image
        $(document).on("click", "#images-list>li>button", function(){
            $(this).parent("li").remove();
        });

        // editor
        CKEDITOR.replace("editor");

        // ajax get attributes list
        $("#attr-group-select").change(function() {
            attr_group_id = $(this).val();
            $.post(base_url + "admin/product/ajax_get_attr", {
                    'attr_group_id': attr_group_id,
                    '<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>'
                }, function(result){
                    $("#attr-box").html(result);
            });
        });
    });
</script>