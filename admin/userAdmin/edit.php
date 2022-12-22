<?php require_once '../template/inc/header.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cập nhật</h1>
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
                    $qr_select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = $id");
                    $row_select = mysqli_fetch_assoc($qr_select);
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $pwd = $_POST['password'];
                        $role = $_POST['role'];
                        if ($pwd) {
                            $pass = md5($pwd);
                            $qr_edit = mysqli_query($conn, "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$pass',`role`='$role' WHERE id = $id");
                        } else {
                            $qr_edit = mysqli_query($conn, "UPDATE `admin` SET `name`='$name',`email`='$email',`role`='$role' WHERE id = $id");
                        }
                        echo '<script>window.location="admin/userAdmin";</script>';
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo $row_select['name'] ?>" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="<?php echo $row_select['email'] ?>" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <select name="role" class="form-control">
                                <?php
                                if ($row_select['role'] == 1) {
                                ?>
                                    <option selected value="1">Admin</option>
                                    <option value="2">User</option>
                                <?php
                                } elseif ($row_select['role'] == 2) {
                                ?>
                                    <option value="1">Admin</option>
                                    <option selected value="2">User</option>
                                <?php
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