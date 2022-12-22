<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm bài viết</h1>
                    <br>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php 
                  if(isset($_POST['submit'])) {
                      $name = $_POST['name'];
                      $content = $_POST['content'];
                      $preview = $_POST['preview'];
                      if(isset($_FILES['image']['name'])) {
                          $filename = $_FILES['image']['name'];
                          $tmp_name = $_FILES['image']['tmp_name'];
                          $name_file = 'hinhanh-' . time() . $filename;
                          $path = '../upload/' . $name_file;
                          move_uploaded_file($tmp_name, $path);
                      }
                      $qr = mysqli_query($conn,"INSERT INTO `blog`(`name`, `img`, `content`, `preview_text`) VALUES ('$name','$name_file','$content','$preview')");
                      if($qr){
                        echo '<script>window.location="admin/blog";</script>';
                      }
                  }
                ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả ngắn</label>
                            <textarea name="preview" class="form-control ckeditor" id="" cols="5" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="content" class="form-control ckeditor" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="Thêm">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

<?php require_once '../template/inc/footer.php' ?>