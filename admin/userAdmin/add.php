<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm thành viên</h1>
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
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $pwd = md5($_POST['password']);
                        $role = $_POST['role'];
                        $qr = mysqli_query($conn,"INSERT INTO `admin`(`name`, `email`, `password`, `role`) VALUES ('$name','$email','$pwd','$role')");
                        if($qr) {
                            echo '<script>window.location="admin/userAdmin";</script>';
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Tên hiển thị">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <select name="role" class="form-control">
                                <option value="">--Phân quyền--</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="Thêm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once '../template/inc/footer.php' ?>