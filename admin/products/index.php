<?php $page = 'PR' ?>
<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `products`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 5);
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 5;
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sản phẩm</h1>
                    <br>
                    <h5><a href="admin/products/add.php" class="btn btn-success">+ Thêm</a></h5>
                    <br>
                    <input type="search" id="name" class="form-control" name="name" placeholder="Tìm kiếm...">
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").keypress(function() {
                $.ajax({
                    type: "POST",
                    url: 'admin/products/search.php',
                    data: {
                        name: $("#name").val(),
                    },
                    success: function(data) {
                        $("#load").html(data);
                    }
                })
            });
        });
    </script>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="load">
                            <?php
                            $stt = 0;
                            $qr_select = mysqli_query($conn, "SELECT products.*, cat.name AS name_cat FROM products JOIN cat ON products.id_cat = cat.id ORDER BY products.id DESC LIMIT $offset,5");
                            while ($row_product = mysqli_fetch_assoc($qr_select)) {
                                $stt++;
                            ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $row_product['name_product'] ?></td>
                                    <td><?php echo $row_product['name_cat'] ?></td>
                                    <td><img src="admin/upload/<?php echo $row_product['image'] ?>" alt="" width="80px"></td>
                                    <td><?php echo number_format($row_product['price']) ?></td>
                                    <td><?php echo $row_product['preview'] ?></td>
                                    <td><a href="admin/products/edit.php?id=<?php echo $row_product['id'] ?>" class="btn btn-success">Sửa</a> <a href="admin/products/del.php?id=<?php echo $row_product['id'] ?>" class="btn btn-danger">Xóa</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
    <br>
    <div class="col-sm-6" style="text-align: right;">
        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    if ($current_page > 1) {
                        $previous = $current_page - 1;

                    ?>
                        <li class="page-item">
                            <a class="page-link" href="admin/products?page=<?php echo $previous ?>"><</a>
                        </li>
                    <?php } ?>
                    <?php
                    for ($i = 1; $i <= $nume_page; $i++) {
                        $active = '';
                        if ($i == $current_page) {
                            $active = 'active';
                        }
                    ?>
                        <li class="page-item <?php echo $active ?>">
                            <a class="page-link" href="admin/products?page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($current_page < $nume_page) {
                        $next = $current_page + 1;

                    ?>
                        <li class="page-item">
                            <a class="page-link" href="admin/products?page=<?php echo $next ?>">></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<br>

<?php require_once '../template/inc/footer.php' ?>