<?php $page = 'CAT' ?>
<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `cat`");
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
                    <h1 class="m-0">Danh mục sản phẩm</h1>
                    <br>
                    <h5><a href="admin/cat/add.php" class="btn btn-success">+ Thêm</a></h5>
                    <br>
                    <input type="search" class="form-control" id="search" name="search" placeholder="Tìm kiếm...">
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search").keypress(function() {
                $.ajax({
                    type: "POST",
                    url: 'admin/cat/search.php',
                    data: {
                        name: $("#search").val(),
                    },
                    success: function(data) {
                        $("#load").html(data);
                    }
                })
            });
        })
    </script>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="load">
                            <?php
                            $stt = 0;
                            $qr = mysqli_query($conn, "SELECT * FROM cat ORDER BY id DESC LIMIT $offset,5");
                            while ($row_cat = mysqli_fetch_assoc($qr)) {
                                $stt++;
                            ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $row_cat['name'] ?></td>
                                    <td><a href="admin/cat/edit.php?id=<?php echo $row_cat['id'] ?>" class="btn btn-success">Sửa</a> <a href="admin/cat/del.php?id=<?php echo $row_cat['id'] ?>" class="btn btn-danger">Xóa</a></td>
                                </tr>
                            <?php
                            }
                            ?>
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
                            <a class="page-link" href="admin/cat?page=<?php echo $previous ?>"><</a>
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
                            <a class="page-link" href="admin/cat?page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($current_page < $nume_page) {
                        $next = $current_page + 1;

                    ?>
                        <li class="page-item">
                            <a class="page-link" href="admin/cat?page=<?php echo $next ?>">></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<br>

<?php require_once '../template/inc/footer.php' ?>