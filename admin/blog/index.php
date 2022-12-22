<?php $page = 'BL' ?>
<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `blog`");
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
                    <h1 class="m-0">Bài viết</h1>
                    <br>
                    <h5><a href="admin/blog/add.php" class="btn btn-success">+ Thêm</a></h5>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả ngắn</th>
                                <th>Ngày đăng</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            $qr = mysqli_query($conn, "SELECT * FROM `blog` ORDER BY id DESC LIMIT $offset,5");
                            while ($row_blog = mysqli_fetch_assoc($qr)) {
                                $stt++;

                            ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $row_blog['name']?></td>                              
                                    <td><?php echo $row_blog['preview_text']?></td>
                                    <td><?php echo $row_blog['created_at']?></td>
                                    <td><a class="btn btn-success" href="admin/blog/edit.php?id=<?php echo $row_blog['id']?>">Sửa</a>  <a class="btn btn-danger" href="admin/blog/del.php?id=<?php echo $row_blog['id']?>">Xóa</a></td>
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
                            <a class="page-link" href="admin/blog?page=<?php echo $previous ?>"><</a>
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
                            <a class="page-link" href="admin/blog?page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($current_page < $nume_page) {
                        $next = $current_page + 1;

                    ?>
                        <li class="page-item">
                            <a class="page-link" href="admin/blog?page=<?php echo $next ?>">></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<br>
<?php require_once '../template/inc/footer.php' ?>