<?php
    require_once './connect.php';
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $currentPage = ($page - 1) * 2;
    $sql = mysqli_query($conn, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id 
                            AND blog_posts.is_private = 0   
                            LIMIT 2 offset $currentPage");
    $totalPost = mysqli_query($conn, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id AND blog_posts.is_private = 0");
    $countTotalPost = mysqli_num_rows($totalPost);
    $totalPage = ceil($countTotalPost/2)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./icon/font_awesome/css/all.css">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.0.0-web/css/all.css">
    <title>Home</title>
    <style>
            .show {
                display: block;
            }

            .hiden {
                display: none;
            }

            .show-flex{
                display: flex;
            }
    </style>
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
        <div class="posts show">
            <?php
            while ($rowPost = mysqli_fetch_array($sql)) {
                if ($rowPost['is_private'] == 0) { ?>
                    <div class="post-items">
                        <a href="./post_detail.php?post_id=<?php echo $rowPost['post_id'] ?>"><img
                                    src="./img/img_post/<?php echo $rowPost['image_url'] ?>" alt=""
                                    class="post-items-img"></a>
                        <div>
                            <p class="post-items-title"><a
                                        href="./post_detail.php?post_id=<?php echo $rowPost['post_id'] ?>"><?php echo $rowPost['title'] ?></a>
                            </p>
                            <span class="post-items-user"><?php echo $rowPost['fullname'] ?></span><span> -</span>
                            <span class="post-items-time"><?php echo $rowPost['post_date'] ?></span>
                            <p class="post-items-description">
                                <?php $content = $rowPost['content'];
                                echo substr($content, 0, 300); ?>
                                <a href="./post_detail.php?post_id=<?php echo $rowPost['post_id'] ?>"
                                   href="post_detail.php?post_id=<?php echo $rowPost['post_id'] ?>"> ...xem thêm</a>
                            </p>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
        <!--End Post-->

        <!--User-->
        <div class="users users-responsive mh650">
            <?php
            $sqlUser = mysqli_query($conn, "SELECT * FROM users");
            while ($rowUser = mysqli_fetch_array($sqlUser)) { ?>
                <div class="user-items">
                    <img src="./img/img_post/<?php echo $rowUser['user_avt']; ?>" alt="" class="user-item-avt">
                    <p class="user-item-name"><a class="user-item-name-link"
                                                 href="./post_list.php?user_id=<?php echo $rowUser['user_id'] ?>"><?php echo $rowUser['fullname']; ?></a>
                    </p>
                </div>
            <?php } ?>
        </div>
        <!--End User-->
    </div>
    <!--End Content-->
    <div class="pagination">
        <ul class="pagination-list">
            <?php
                for ($i = 1; $i <= $totalPage; $i++) { ?>
                    <li class="pagination-items"><a href="./index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }
            ?>
        </ul>
    </div>
</div>

</body>

<script>
        var  iconMenu = document.querySelector('.menu')
        var  listUser = document.querySelector('.users-responsive')
        var  listPost = document.querySelector('.posts')
        var  pagination = document.querySelector('.pagination')

        var  flag  = true
        iconMenu.onclick = function () {
            //click lần 1, list post hiden, list user show
            if(flag == true) {
                listUser.classList.add('show')
                listPost.classList.add('hiden')
                pagination.classList.add('hiden')
                pagination.classList.remove('show-flex')
                flag = false

                //click lần 2, list post show, list user hiden
            }else if(flag == false){
                listUser.classList.remove('show')
                listPost.classList.remove('hiden')
                listPost.classList.add('show')
                pagination.classList.remove('hiden')
                pagination.classList.add('show-flex')
                flag = true
            }

        }
</script>
</html>