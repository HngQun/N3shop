<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Cập nhật bài viết</h1>
                    <br>
                </div>

            </div>
        </div>
    </div>
    <?php 
      $id = (isset($_GET['id'])) ? $_GET['id'] : '';
      $qr = mysqli_query($conn,"SELECT * FROM blog WHERE id = $id");
      $row_blog = mysqli_fetch_assoc($qr);
      if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $content = $_POST['content'];
        $preview = $_POST['preview'];
        if(isset($_FILES['image']['name'])) {
            $filename = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $name_file = 'hinhanh-' . time() . $filename;
            $path = '../upload/' . $name_file;
        }
        if(!isset($name_file)) {
            $qr2 = mysqli_query($conn,"UPDATE `blog` SET `name`='$name',`content`='$content',`preview_text`='$preview' WHERE id = $id");

        } else {
            move_uploaded_file($tmp_name,$path);
            $qr2 = mysqli_query($conn,"UPDATE `blog` SET `name`='$name',`img`='$name_file',`content`='$content',`preview_text`='$preview' WHERE id = $id");
        }
        echo '<script>window.location="admin/blog";</script>';
      }
    ?>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" value="<?php echo $row_blog['name']?>" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file"  class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả ngắn</label>
                            <textarea name="preview" class="form-control ckeditor" id="" cols="5" rows="5"><?php echo $row_blog['preview_text']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="content" class="form-control ckeditor" id="" cols="10" rows="10"><?php echo $row_blog['content']?></textarea>
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