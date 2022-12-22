<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sản phẩm</h1>
                    <br>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $id = (isset($_GET['id'])) ? $_GET['id'] : '';
                    $qr_select = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
                    $row_product = mysqli_fetch_assoc($qr_select);
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $cat = $_POST['cat'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $preview = $_POST['preview'];
                        $detail = $_POST['detail'];
                        $sp_hot = $_POST['sp_hot'];
                        if ($_FILES['image']['name']) {
                            $filename = $_FILES['image']['name'];
                            $tmp_name = $_FILES['image']['tmp_name'];
                            $name_file = 'hinhanh-' . time() . $filename;
                            $path = '../upload/' . $name_file;
                        }
                        if (!isset($name_file)) {
                            $qr_edit = mysqli_query($conn, "UPDATE `products` SET `id_cat`='$cat',`name_product`='$name',`price`='$price',`qty`='$qty',`preview`='$preview',`detail`='$detail',`sp_hot`='$sp_hot' WHERE id = $id");
                        } else {
                            move_uploaded_file($tmp_name, $path);
                            $qr_edit = mysqli_query($conn, "UPDATE `products` SET `id_cat`='$cat',`name_product`='$name',`price`='$price',`qty`='$qty',`preview`='$preview',`detail`='$detail',`sp_hot`='$sp_hot',`image`='$name_file' WHERE id = $id");
                        }
                        if (isset($_FILES['images']['name'])) {
                            $files = $_FILES['images'];
                            $filenames = $_FILES['images']['name'];
                        }
                        foreach ($filenames as $key => $value) {
                            $name_files = time() . $value;
                            $update =  move_uploaded_file($files['tmp_name'][$key], '../upload/' . $name_files);
                            if ($update) {
                                mysqli_query($conn, "INSERT INTO img_products (id_sp,img) VALUES ('$id','$name_files')");
                            }
                        }
                        echo '<script>window.location="admin/products";</script>';
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên</label>
                            <input type="text" class="form-control" value="<?php echo $row_product['name_product'] ?>" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select name="cat" class="form-control">

                                <?php
                                $qr = mysqli_query($conn, "SELECT * FROM cat WHERE id_parent >0");
                                while ($row_cat = mysqli_fetch_assoc($qr)) {
                                    if ($row_product['id_cat'] == $row_cat['id']) {

                                ?>
                                        <option selected value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['name'] ?></option>
                                    <?php
                                    } else {

                                    ?>
                                        <option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh chi tiết</label>
                            <input type="file" class="form-control" name="images[]" multiple>
                        </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" value="<?php echo $row_product['price'] ?>" name="price">
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="text" class="form-control" value="<?php echo $row_product['qty'] ?>" name="qty">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả ngắn</label>
                            <textarea name="preview" class="form-control ckeditor" cols="5" rows="5"><?php echo $row_product['preview'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chi tiết sản phẩm</label>
                            <textarea name="detail" class="form-control ckeditor" cols="10" rows="10"><?php echo $row_product['detail'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Sản phẩm nổi bật</label>
                            <select name="sp_hot" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="Cập nhật">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
<?php require_once '../template/inc/footer.php' ?>