<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Edit Post</title>
</head>
<body>
<div class="main">
    <!--Header-->
    <?php require_once './header.php' ?>
    <?php
    require_once './connect.php';
    if (isset($_POST['btn-edit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $is_private = $_POST['select_option'];

        $image_url = $_FILES['image_url']['name'];
        $image_url_tmp = $_FILES['image_url']['tmp_name'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $post_date = date('Y-m-d h:i:s');

        $post_id = $_POST['post_id'];
        $sql = mysqli_query($conn, "UPDATE blog_posts SET title = '$title',
                content = '$content',image_url = '$image_url' ,is_private = $is_private, post_date = '$post_date'
                WHERE blog_posts.post_id = $post_id");
        move_uploaded_file($image_url_tmp, './img/img_post/'. $image_url);

        if ($sql) {
            header('Location:post_list.php');
//            echo $post_id;
        }else{
            echo "Fail";
        }
    }
    ?>
    <!--End Header-->

    <!--Content-->
    <div class="name">CHỈNH SỮA BÀI ĐĂNG</div>
    <?php if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $sqlEdit = mysqli_query($conn, "SELECT * FROM blog_posts WHERE blog_posts.post_id = $post_id");
        $rowEdit = mysqli_fetch_array($sqlEdit);
        ?>
        <form action="./edit_post.php" class="upload_post" method="post" enctype="multipart/form-data">
            <input type="hidden" name="post_id"
                   value="<?= $post_id?>">

            <div class="title_post">
                <h2 style="color:#fff">Tiêu đề:</h2>
                <input class="input-title" class="mb-20" type="text" name="title"
                       value="<?php echo $rowEdit['title'] ?>">
            </div>
            <div class="content_post">
                <h2 style="color:#fff">Nội dung:</h2>
                <textarea class="mb-20" rows="50" placeholder="Nội dung" name="content"><?php echo $rowEdit['content'] ?></textarea>
            </div>
            <div class="edit">
                <h2 style="color:#fff">Ảnh đại diện</h2>
                <input type="file" name="image_url">
                <p class="regime">Chế độ</p>
                <select name="select_option" id="" class="select_option">
                    <option value="0">Công khai</option>
                    <option value="1">Riêng tư</option>
                </select>
                <button type="submit" class="btn-edit btn-upload" name="btn-edit">CẬP NHẬT</button>
            </div>
        </form>
    <?php } ?>
    <!--End Content-->
</div>
</body>
</html>