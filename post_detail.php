<?php
    require_once './connect.php';
    if(isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $sql = mysqli_query($conn, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id
                            AND blog_posts.post_id = $post_id");
        $row = mysqli_fetch_array($sql);
    }
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
    <style>
        .comment {
            width: 80%;
            margin: 20px auto;
        }

        .comment-heading {

        }
    </style>
</head>
<body>
    <div class="main">
        <!--Header-->
        <?php require_once './header.php'; ?>
        <!--End Header-->

        <!--Content-->
        <div class="name">THE BLOG</div>
        
        <div class="content-detail">
            <div class="post-items-detail">
                <p class="post-items-title-detail"><?php echo $row['title'] ?></p>
                <span class="post-items-user"><i class="fa-solid fa-user"></i> <?php echo $row['fullname'] ?></span><span></span>
                <span class="post-items-time"> <i class="fa-regular fa-clock"></i> <?php echo $row['post_date'] ?></span>
                <span class="edit-post"><a href="./edit_post.php?post_id=<?php echo $row['post_id'] ?>"> 
                    <?php 
                        if($_SESSION['user_id'] == $row['user_id']) { ?>
                            Edit <i class="fa-solid fa-pen-to-square"></i>      
                    <?php } ?>
                </a></span>
                <p class="post-items-description-detail"><?php echo $row['content'] ?></p>
                <img src="./img/img_post/<?php echo $row['image_url'] ?>" alt="" class="post-items-img-detail" width="500px" height="300px">
            </div>
        </div>
        <!--End Content-->
        <div class="comment">
            <p class="comment-heading">Bình luận về bài đăng</p>
            <div class="comment-list">
                <p class="user-comment">Phạm Trung Hậu</p> <span>12/2/2023</span>
                <p class="content-comment">Bài viết rất hay và sinh động</p>
            </div>

        </div>
    </div>
    
</body>
</html>