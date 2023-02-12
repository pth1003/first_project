<?php
    require_once './connect.php';
    session_start() ;
    $post_id = $_GET['id'];
    if(isset($_POST['sbm-cmt'])) {
        $cmt_content = $_POST['cmt_content'];
        $user_id = $_SESSION['user_id'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $cmt_date = date('Y-m-d h:i:s');
        $sqlCmt = mysqli_query($conn, "INSERT into comment(cmt_content, user_id, post_id, date_cmt) values ('$cmt_content', $user_id, $post_id, '$cmt_date')");

        if($sqlCmt){
            echo "   <script type='text/javascript'>alert('Thành công');
                    window.location = history.go(-1)
                    </script>";
        }else{
            echo "<script type='text/javascript'>alert('Thất bại');
                    window.location = history.go(-1)
</script>";

        }
    }
?>