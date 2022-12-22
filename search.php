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
                        <li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog.html">Tìm kiếm</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'DB/dbConnect.php';
if (isset($_GET['submit']) && $_GET["search"] != '') {
    $search = $_GET['search'];
    $qr = mysqli_query($conn, "SELECT * FROM products WHERE name_product LIKE '%$search%'");
    $num = mysqli_num_rows($qr);


?>
    <div class="container">
        <br>
        <?php echo $num . " kết quả trả về với từ khóa " . $search ?>
        <div class="col-lg-12 col-md-8 col-12">
            <div class="row">
                <?php
                while ($row_pr = mysqli_fetch_assoc($qr)) {
                    $id = $row_pr['id'];
                ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-detail.php?id=<?php echo $row_pr['id'] ?>&id_cat=<?php echo $row_pr['id_cat'] ?>">
                                    <img class="default-img" src="admin/upload/<?php echo $row_pr['image'] ?>" alt="#">
                                    <img class="hover-img" src="admin/upload/<?php echo $row_pr['image'] ?>" alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#<?php echo $id ?>" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <input type="hidden" value="1" id="num" name="num">
                                        <a title="Add to cart" href="javascript:void(0)" onclick="add_cart(<?php echo $row_pr['id'] ?>)">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-detail.php?id=<?php echo $row_pr['id'] ?>&id_cat=<?php echo $row_pr['id_cat'] ?>"><?php echo $row_pr['name_product'] ?></a></h3>
                                <div class="product-price">
                                    <span>$ <?php echo $row_pr['price'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
    <?php
}
require_once 'public/inc/footer.php'
    ?>
