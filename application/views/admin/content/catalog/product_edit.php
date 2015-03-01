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
                <h2 class="panel-title"><i class="fa fa-pencil"></i> Sửa sản phẩm</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/product/edit', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tên sản phẩm:</label>
                    <div class="col-sm-9">
                        <input value="<?= $product['name'] ?>" type="text" name="name" placeholder="Tên sản phẩm" class="form-control">
                        <?= form_error('name') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Giá bán:</label>
                    <div class="col-sm-9">
                        <input value="<?= $product['price'] ?>" type="text" name="price" placeholder="Giá bán" class="form-control">
                        <?= form_error('price') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giá khuyến mại:</label>
                    <div class="col-sm-9">
                        <input value="<?= $product['sale']==$product['price']?'':$product['sale'] ?>" type="text" name="sale" placeholder="Để trống nếu không có khuyến mại" class="form-control">
                        <?= form_error('sale') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Số lượng:</label>
                    <div class="col-sm-9">
                        <input value="<?= $product['quantity'] ?>" type="text" name="quantity" placeholder="Số lượng" class="form-control">
                        <?= form_error('quantity') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thuộc danh mục:</label>
                    <div class="col-sm-9">
                        <select name="category_id" class="form-control">
                            <?php category_option($categories, $product['category_id']) ?>
                        </select>
                        <?= form_error('category_id') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh đại diện:</label>
                    <div class="col-sm-2">
                        <input id="add-thumbnail-btn" type="button" class="btn btn-sm btn-primary" value="Chọn ảnh">
                        <?= form_error('category_id') ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <img id="product-thumbnail" class="product-thumbnail" src="<?= $product['thumbnail'] != null?$product['thumbnail']:BASE_URL.'assets/img/no-img.png' ?>">
                        <input type="hidden" name="thumbnail" value="<?= $product['thumbnail'] ?>">
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
                            <?php if (!empty($product_img)): foreach ($product_img as $item): ?>
                                <li>
                                    <img class="product-image" src="<?= $item['path'] ?>">
                                    <button type="button"><span>×</span></button>
                                    <input type="hidden" name="img[]" value="<?= $item['path'] ?>">
                                </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="status">
                            <?php if ($product['status'] == 1): ?>
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
                <div class="form-group">
                    <label class="col-sm-2 control-label">Mô tả sản phẩm:</label>
                    <div class="col-sm-9">
                        <textarea id="editor" class="form-control" name="description" placeholder="Mô tả chi tiết sản phẩm"><?= $product['description'] ?></textarea>
                        <?= form_error('description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ tiêu đề:</label>
                    <div class="col-sm-9">
                        <input value="<?= $product['tag_title'] ?>" type="text" name="tag_title" placeholder="Title tag" class="form-control">
                        <?= form_error('tag_title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ mô tả:</label>
                    <div class="col-sm-9">
                        <input value="<?= $product['tag_description'] ?>" type="text" name="tag_title" placeholder="Meta description" class="form-control">
                        <?= form_error('tag_description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ từ khóa:</label>
                    <div class="col-sm-9">
                        <input value="<?= $product['tag_keywords'] ?>" type="text" name="tag_keywords" placeholder="Meta keywords" class="form-control">
                        <?= form_error('tag_keywords') ?>
                    </div>
                </div>

                <?php if (!empty($product_attr)): ?>
                    <?php foreach ($product_attr as $item): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?= $item['attr_name'] ?>:</label>
                            <div class="col-sm-9">
                                <input value="<?= $item['value'] ?>" type="text" name="attr[<?= $item['id'] ?>]" placeholder="<?= $item['attr_name'] ?>" class="form-control">
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

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
                    img_item = "<li><img class='product-image' src='"+url+"'><button type='button'><span>×</span></button><input type='hidden' name='img[]' value='" + url + "'></li>";
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
    });
</script>