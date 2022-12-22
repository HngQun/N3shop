<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm danh mục sản phẩm</h1>
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
                    if (isset($_POST['submit'])) {
                        $name_Cat = $_POST['name'];
                        $id_parent = $_POST['name_cat'];
                        $qr2 = mysqli_query($conn, "INSERT INTO `cat`( `name`, `id_parent`) VALUES ('$name_Cat','$id_parent')");
                        if ($qr2) {
                            echo '<script>
                            window.location="admin/cat";
                            alert("Thêm thành công");
                            </script>';
                        }
                    } 
                    ?>
                   
                    <form action="" method="POST">
                        
                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục cha</label>
                            <select name="name_cat" class="form-control">
                                <option value="0">--Danh mục cha---</option>s
                                <?php
                                $qr = mysqli_query($conn, "SELECT * FROM cat WHERE id_parent = 0");
                                while ($row_cat = mysqli_fetch_assoc($qr)) {
                                    ?>
                                    <option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
           
                        <div class="form-group">
                            <input type="submit"  name="submit" class="btn btn-success" value="Thêm">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>
<?php require_once '../template/inc/footer.php' ?>