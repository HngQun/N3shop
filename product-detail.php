<?php $page = "CART"; ?>
<?php require_once 'public/inc/header.php' ?>
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
                        <?php require_once 'public/inc/navbar.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="shop-grid.php">Sản phẩm chi tiết</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$qr = mysqli_query($conn, "SELECT products.*, cat.name AS name_cat FROM products JOIN cat ON products.id_cat = cat.id WHERE products.id  = $id");
$row_product = mysqli_fetch_assoc($qr);
?>
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="product-gallery">
                    <div class="quickview-slider-active">
                        <div class="single-slider">
                            <img src="admin/upload/<?php echo $row_product['image'] ?>" alt="#">
                        </div>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM `img_products` WHERE id_sp = $row_product[id] ORDER BY id DESC LIMIT 3");
                        while ($row_img = mysqli_fetch_assoc($query)) {
                        ?>
                            <div class="single-slider">
                                <img src="admin/upload/<?php echo $row_img['img'] ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="quickview-content">
                    <h1 style="color: #FF9933"><?php echo $row_product['name_product'] ?></h1>
                    <h6><?php echo $row_product['name_cat'] ?></h6>
                    <div class="quickview-ratting-review">
                        <div class="quickview-ratting-wrap">
                            <div class="quickview-ratting">
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="quickview-stock">
                            <span><i class="fa fa-check-circle-o"></i>In Stock</span>
                        </div>
                    </div>
                    <h3><?php echo number_format($row_product['price']) ?> đ</h3>
                    <div class="quickview-peragraph">
                        <p><?php echo $row_product['detail'] ?></p>
                    </div>
                    <div class="size">
                        <h3>Size</h3>
                        <input type="number" value="38" min="38" max="43">
                        <br>
                        <br>
                        <div class="quickview-stock">
                            <span><i class="fa fa-check-circle-o"></i>Available</span>
                        </div>
                    </div>

                    <div class="quantity">
                        <div class="input-group">
                            <div class="button minus">
                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="quant[1]" id="num" class="input-number" data-min="1" data-max="1000" value="1">
                            <div class="button plus">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                    <i class="ti-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="add-to-cart">
                        <button class="btn" onclick="OutOfProduct(<?php echo $row_product['id'] ?>)">Mua</button>// ban đầu là add_cart
                    </div>

                    <div class="default-social">
                        <h4 class="share-now">Share:</h4>
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['customer'])) {
            $id_customer = $_SESSION['customer']['id'];
        ?>
            <div class="col-12">
                <div class="reply">
                    <div class="reply-head">
                        <h2 class="reply-title">Bình luận</h2>
                        <!-- Comment Form -->
                        <form id="form" class="form" action="javascript:void(0)" method="POST">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>Viết bình luận<span>*</span></label>
                                        <textarea name="message" id="message" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <input type="hidden" name="id_customer" id="id_customer" value="<?php echo $id_customer ?>">
                                        <button name="submit" onclick="addCmt(<?php echo $row_product['id'] ?>)" type="submit" class="btn">Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Comment Form -->
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="comments" id="load">
                    <h3 class="comment-title">Bình luận</h3>
                    <!-- Single Comment -->
                    <br>
                    <?php
                    $qr2 = mysqli_query($conn, "SELECT `product_cmt`.*, customers.name FROM product_cmt JOIN customers ON product_cmt.id_customer = customers.id WHERE product_cmt.id_sp = $id");
                    while ($row = mysqli_fetch_assoc($qr2)) {


                    ?>
                        <div class="single-comment">
                            <div class="content">
                                <p><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" width="30px" alt="#"> <b><?php echo $row['name'] ?></b> <span>- <?php echo $row['date'] ?></span></p>
                                <br>
                                <p>- <?php echo $row['content'] ?></p>
                                <br>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        <?php
        } else {


        ?>

            <div class="col-12">
                <h3 class="comment-title">Bình luận</h3>
                <br>
                <a style="color:aliceblue;" class="btn" href="login.php">Đăng nhập để viết bình luận</a>
            </div>
            <div class="col-12">
                <div class="comments" id="load">

                    <br>
                    <?php
                    $qr2 = mysqli_query($conn, "SELECT `product_cmt`.*, customers.name FROM product_cmt JOIN customers ON product_cmt.id_customer = customers.id WHERE product_cmt.id_sp = $id");
                    while ($row = mysqli_fetch_assoc($qr2)) {


                    ?>
                        <div class="single-comment">
                            <div class="content">
                                <p><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" width="30px" alt="#"> <b><?php echo $row['name'] ?></b> <span>- <?php echo $row['date'] ?></span></p>
                                <br>
                                <p>- <?php echo $row['content'] ?></p>
                                <br>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        <?php
        }
        ?>
</section>

<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Sản phẩm tương tự</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $id_cat = (isset($_GET['id_cat'])) ? $_GET['id_cat'] : '';
            $qr_lq = mysqli_query($conn, "SELECT * FROM products WHERE id_cat = $id_cat ORDER BY id DESC LIMIT 3");
            while ($row_lq = mysqli_fetch_assoc($qr_lq)) {
                $nameReplace =     utf8ToLatin($row_lq['name_product']);
                $url = $nameReplace . '-' . $row_lq['id'] . '-' . $row_lq['id_cat'] . '.html';
            ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="shop-single-blog">
                        <img src="admin/upload/<?php echo $row_lq['image'] ?>" alt="#">
                        <div class="content">
                            <a href="<?php echo $url?>" class="title"><?php echo $row_lq['name_product'] ?></a>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function OutOfProduct(id){
        var numCheck =  $('#num').val();
        if(<?=$row_product['qty'] ?>==0){
            alert('Hết hàng bạn ei');
            exit
        }else if(numCheck > <?=$row_product['qty'] ?>){
            alert('số lượng hàng không đủ');
            exit
        }else{
            add_cart(id);
        }
    }
</script>
<script>
    function addCmt(id) {
        var id_customer = $('#id_customer').val();
        var content = $('#message').val();
        $.ajax({
            url: 'product_cmt.php',
            method: "POST",
            data: {
                id: id,
                id_customer: id_customer,
                content: content,
            },
            success: function(data) {
                alert('Bình luận thành công!');
                $("#form")[0].reset();
                $('#load').html(data);

            }
        });
    }
</script>
<?php require_once 'public/inc/footer.php' ?>