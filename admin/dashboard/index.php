<?php $page = 'DB'?>
<?php require_once '../template/inc/header.php';
?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href=""><<</a>
                        </div>
                         
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                <?php 
                                 $qr = mysqli_query($conn,"SELECT * FROM `order`");
                                 $row_or = mysqli_num_rows($qr);
                                ?>
                                    <h3><?php echo $row_or?></h3>
                                    <p>Đơn hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="admin/order" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                <?php 
                                 $qr1 = mysqli_query($conn,"SELECT * FROM `products`");
                                 $row_or2 = mysqli_num_rows($qr1);
                                ?>
                                    <h3><?php echo $row_or2?></h3>

                                    <p>Sản phẩm đang bán</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-product-hunt"></i>
                                </div>
                                <a href="admin/products" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                <?php 
                                 $qr2 = mysqli_query($conn,"SELECT * FROM `admin`");
                                 $row_or3 = mysqli_num_rows($qr2);
                                ?>
                                    <h3><?php echo $row_or3?></h3>

                                    <p>Thành viên</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="admin/userAdmin" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                <?php 
                                 $qr3 = mysqli_query($conn,"SELECT * FROM `blog`");
                                 $row_or4 = mysqli_num_rows($qr3);
                                ?> 
                                    <h3><?php echo $row_or4?></h3>

                                    <p>Bài viết</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-blog"></i>
                                </div>
                                <a href="admin/blog" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php require_once '../template/inc/footer.php' ?>