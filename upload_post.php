<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <title>Upload Post</title>
</head>
<body>
    <div class="main">
        <!--Header-->
        <?php  require_once './header.php' ?>
        <!--End Header-->
        <?php
        require_once './connect.php';
            if(isset($_POST['btn-upload'])) {
                $title     = $_POST['title'];
                $content   = $_POST['content'];
                $is_private = $_POST['select_option'];

                $image_url         = $_FILES['image_url']['name'];  
                $image_url_tmp     = $_FILES['image_url']['tmp_name'];

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $post_date         = date('Y-m-d h:i:s');

                $user_id = $_SESSION['user_id'] ;

                $sql = mysqli_query($conn, "INSERT into blog_posts(user_id, title, content, image_url,is_private, post_date)
                                    VALUES($user_id, '$title', '$content', '$image_url', $is_private, '$post_date')");
                
                move_uploaded_file($image_url_tmp, './img/img_post/'.$image_url);

                if($sql){
                    header('Location:post_list.php');
                }else{
                    echo "Fail";
                }  
            }
        ?>

        <!--Content-->
        <div class="name">VIẾT BÀI ĐĂNG</div>
        <form action="./upload_post.php" class="upload_post" method="post" enctype="multipart/form-data">
            <div class="title_post">
                <h2 style="color:#fff">Tiêu đề:</h2>
                <input class="input-title" class="mb-20" type="text" name="title">
            </div>
            <div class="content_post">
                <h2 style="color:#fff">Nội dung:</h2>
                <textarea class="mb-20"  rows="50" placeholder="Nội dung" name="content"></textarea>                  
            </div>
            <h2 style="color:#fff">Ảnh đại diện</h2>
            <input type="file" name="image_url">
            <div class="container-regime">
                <p class="regime">Chế độ</p>
                <select name="select_option" id="" class="select_option">
                    <option value="0">Công khai</option>
                    <option value="1">Riêng tư</option>
                </select>
                <button type="submit" class="btn-upload" name="btn-upload">ĐĂNG BÀI</button>
            </div>
        </form>
        <!--End Content-->
    </div>
</body>
</html>