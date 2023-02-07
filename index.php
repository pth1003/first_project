<?php 
    require_once './connect.php';
    $sql = mysqli_query($conn, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./icon/font_awesome/css/all.css">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.0.0-web/css/all.css">
    <title>Home</title>
</head>
<body>
    <div class="main">
        <!--Header-->
      <?php require_once './header.php' ?>
        <!--End Header-->

        <!--Content-->
        <div class="name">THE BLOG</div>
        
        <div class="content">
            <!--Post-->
            <div class="posts">
            <?php 
                while($rowPost = mysqli_fetch_array($sql)) { ?> 
                    <div class="post-items">
                        <a href="./post_detail.php?post_id=<?php echo $rowPost['post_id'] ?>"><img src="./img/img_post/<?php echo $rowPost['image_url'] ?>" alt="" class="post-items-img"></a>     
                        <div>
                            <p class="post-items-title"><a href="./post_detail.php?post_id=<?php echo $rowPost['post_id'] ?>"><?php echo $rowPost['title'] ?></a></p>
                            <span class="post-items-user"><?php echo $rowPost['fullname'] ?></span><span> -</span>
                            <span class="post-items-time"><?php echo $rowPost['post_date'] ?></span>
                            <p class="post-items-description">
                                <?php $content =  $rowPost['content']; 
                                echo substr($content,0,400);
                                echo ('<a style="color:#ea9920; cursor:pointer">    ...xem thêm</a>');
                                ?>
                            </p>
                        </div>
                    </div>
            <?php } ?>
            </div>
            <!--End Post-->

            <!--User-->
            <div class="users">
                <div class="user-items">
                    <img src="./img/img_avt/avt2.png" alt="" class="user-item-avt">
                    <p class="user-item-name"><a class="user-item-name-link" href="">Pham Trung Hau</a></p>
                </div>
                <div class="user-items">
                    <img src="./img/img_avt/avt2.png" alt="" class="user-item-avt">
                    <p class="user-item-name"><a class="user-item-name-link" href="">Pham Trung Hau</a></p>
                </div>
            </div>
            <!--End User-->
        </div>
        <!--End Content-->
    </div>
</body>
</html>