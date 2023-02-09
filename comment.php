<?php
    require_once './connect.php';
    session_start() ;
    $post_id = $_GET['id'];
    if(isset($_POST['sbm-cmt'])) {
        $cmt_content = $_POST['cmt_content'];
        $user_id = $_SESSION['user_id'];
        $sqlCmt = mysqli_query($conn, "INSERT into comment(cmt_content, user_id, post_id) values ('$cmt_content', $user_id, $post_id )");

        if($sqlCmt){
            echo "   <script type='text/javascript'>alert('Thành công');
                    window.location = history.go(-1)
                    </script>";
        }else{
            echo "<script type='text/javascript'>alert('Thất bại');</script>";
        }
    }
?>