<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <title>Home</title>
</head>
<body>
<div class="main">
    <!--Header-->
    <?php
    require_once './header.php';
    require_once './connect.php';

    #row list post
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    } else {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 6;
    }
    $sqlList = mysqli_query($conn, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id
                            AND blog_posts.user_id = $user_id");

    #pagination
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $currentPage = ($page - 1) * 2;
    $sql = mysqli_query($conn, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id
                            AND blog_posts.user_id = $user_id
                            LIMIT 2 offset $currentPage");
    $countTotalPost = mysqli_num_rows($sqlList);
    $totalPage = ceil($countTotalPost/2);

    #row Fullname
    $sqlFullname = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $user_id");
    ?>
    <!--End Header-->

    <!--Content-->
    <div class="name">THE BLOG</div>
    <h2 class="list-post-heading">Danh sách bài viết:
        <span>
            <?php $rowFullname = mysqli_fetch_array($sqlFullname);
            echo $rowFullname['fullname'] ?>
        </span>
    </h2>
    <div class="content">
        <!--Post-->
        <div class="posts">
            <?php
            if (mysqli_num_rows($sqlList) == 0) {
                echo('<h1 style="text-align: center; margin-top: 20px">Chưa có bài đăng nào</h1>');
            }
            while ($rowList = mysqli_fetch_array($sql)) {
                if (isset($_SESSION['user_id']) == $rowList['user_id']) { ?>
                    <div class="post-items">
                        <a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>">
                            <img src="./img/img_post/<?php echo $rowList['image_url'] ?>" alt="" class="post-items-img">
                        </a>
                        <div>
                            <p class="post-items-title">
                                <a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>"><?php echo $rowList['title'] ?></a>
                            </p>
                            <span class="post-items-user"><?php echo $rowList['fullname'] ?></span>
                            <span class="post-items-time"><?php echo $rowList['post_date'] ?></span>
                            <span style="color: #ea9920" class="post-items-time">
                                <?php
                                    if ($rowList['is_private'] == 0) {
                                        echo('Công Khai');
                                    } else {
                                        echo('Riêng Tư');
                                    }
                                ?>
                            </span>
                            <p class="post-items-description">
                                <?php $content = $rowList['content'];
                                echo substr($content, 0, 300); ?>
                                <a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>" href="post_detail.php?post_id=<?php echo $rowList['post_id'] ?>"> ...xem thêm</a>
                            </p>
                        </div>
                    </div>
                <?php } elseif ($rowList['is_private'] == 0) { ?>
                    <div class="post-items">
                        <a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>">
                            <img src="./img/img_post/<?php echo $rowList['image_url'] ?>" alt="" class="post-items-img">
                        </a>
                        <div>
                            <p class="post-items-title">
                                <a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>"><?php echo $rowList['title'] ?></a>
                            </p>
                            <span class="post-items-user"><?php echo $rowList['fullname'] ?></span><span> -</span>
                            <span class="post-items-time"><?php echo $rowList['post_date'] ?></span>
                            <span style="color: #ea9920" class="post-items-time">
                                <?php
                                    if ($rowList['is_private'] == 0) {
                                        echo('Công Khai');
                                    }else{
                                        echo('Riêng Tư');
                                    }
                                    ?>
                            </span>
                            <p class="post-items-description">
                                <?php $content = $rowList['content'];
                                    echo substr($content, 0, 300);
                                ?>
                                <a href="./post_detail.php?post_id=<?php echo $rowList['post_id'] ?>" href="post_detail.php?post_id=<?php echo $rowList['post_id'] ?>"> ...xem thêm</a>
                            </p>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
        <!--End Post-->

        <!--User-->
    </div>
    <!--End User-->
    <div class="pagination">
        <ul class="pagination-list">
            <?php
            for ($i = 1; $i <= $totalPage; $i++) { ?>
                <li class="pagination-items"><a href="./post_list.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php }
            ?>
        </ul>
    </div>
</div>
<!--End Content-->
</div>
</body>
</html>