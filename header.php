<?php session_start(); ?>
<div class="header">
    <ul class="header_menu">
        <li class="header_items"><a href="./index.php" class="header_link">HOME</a></li>
        <?php if (isset($_SESSION['fullname'])) { ?>
            <li class="header_items"><a href="./upload_post.php" class="header_link">ĐĂNG BÀI</a></li>
            <li class="header_items"><a href="./post_list.php" class="header_link">MY BLOG</a></li>
            <li class="header_items"><a class="header_link menu"><i class="fa-solid fa-bars icon-menu"></i></a></li>

        <?php } ?>
    </ul>
    <?php
    if (isset($_SESSION['user_id']) || isset($_SESSION['fullname'])) { ?>
        <ul class="header_menu header_menu_responsive">
            <li class="header_items"><span class="fff black">Xin chào: </span><span class="fff black"><?php echo $_SESSION['fullname'] ?></span></li>
            <li class="header_items logout"><a href="./logout.php">Đăng xuất</a></li>
        </ul>
    <?php } else { ?>
        <ul class="header_menu">
            <li class="header_items"><a href="./login.php" class="header_link">ĐĂNG NHẬP</a></li>
            <li class="header_items"><a href="./register.php" class="header_link">ĐĂNG KÍ</a></li>
        </ul>
    <?php }
    ?>
</div>
