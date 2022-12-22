<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh mục sản phẩm</h1>
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
                    $qr2 = mysqli_query($conn, "SELECT * FROM cat WHERE id = $id");
                    $row_cat2 = mysqli_fetch_assoc($qr2);
                    if(isset($_POST['submit'])) {
                        $name_Cat = $_POST['name'];
                        $id_parent = $_POST['name_cat'];
                        $qr3 = mysqli_query($conn,"UPDATE `cat` SET `name`='$name_Cat',`id_parent`='$id_parent' WHERE id = $id");
                        if($qr3) {
                            echo '<script>window.location="admin/cat";
                            alert("Cập nhật thành công")</script>';
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input type="text" value="<?php echo $row_cat2['name'] ?>" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label>
                            <select name="name_cat" class="form-control">
                                <?php
                                $qr = mysqli_query($conn, "SELECT * FROM cat WHERE id_parent = 0");
                                while ($row_cat = mysqli_fetch_assoc($qr)) {
                                    if ($row_cat['id'] == $row_cat2['id_parent']) {
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
                            <input type="submit" name="submit" class="btn btn-success" value="Cập nhật">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>

<?php require_once '../template/inc/footer.php' ?>