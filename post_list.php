<?php
     
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="main">
        <!--Header-->
        <?php 
            require_once './header.php'; 
            require_once './connect.php';
            $user_id = $_SESSION['user_id'];
            $sqlList = mysqli_query($conn, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id
            AND blog_posts.user_id = $user_id");
        ?>
        <!--End Header-->

        <!--Content-->
        <div class="name">THE BLOG</div>
        <h2 class="list-post-heading">Danh sách bài viết: <span><?php echo $_SESSION['fullname'] ?></span></h2>
        <div class="content">
            <!--Post-->
            <div class="posts">
                <?php
                    while($rowList = mysqli_fetch_array($sqlList)) { ?>
                        <div class="post-items">
                            <a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>"><img src="./img/img_post/<?php echo $rowList['image_url'] ?>" alt="" class="post-items-img"></a>
                            <div>
                                <p class="post-items-title"><a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>"><?php echo $rowList['title'] ?></a></p>
                                <span class="post-items-user"><?php echo $rowList['fullname'] ?></span><span> -</span>
                                <span class="post-items-time"><?php echo $rowList['post_date'] ?></span>
                                <p class="post-items-description">
                                    <?php $content =  $rowList['content']; 
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
            </div>
            <!--End User-->
        </div>
        <!--End Content-->
    </div>
    
</body>
</html>