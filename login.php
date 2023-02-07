<?php 
    session_start();
    require_once './connect.php';
    if(isset($_POST['sbm-login'])) {
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        // echo $username; 
        // echo $password; exit;
        if(!$username) {
            echo '<script>
                    alert("Vui Lòng Nhập UserName");
                   
                </script>';        
        }else if(!$password){
            echo '<script>
                    alert("Vui Lòng Nhập PassWord");
                    window.location = "login.php";
                </script>';     
        }

        if (!$username || !$password) {
            echo '<script language="javascript">alert("Vui lòng nhập đầy đủ tên Đăng Nhập Và Password !!"); 
            window.location="login.php";</script>';
            exit;
        }
        
        #ma hoa pass word
        $password = md5($password); 

        $sqlCheckUser = mysqli_query($conn,"SELECT user_id, username, password, fullname FROM users WHERE username = '$username'")
                or die( mysqli_error($conn));
        $rowUserName  = mysqli_num_rows($sqlCheckUser);

        //Check UserName
        if($rowUserName == 0){
            echo '<script>
                    alert("Tên Đăng Nhập Không Tồn Tại");
                    window.location = "login.php";
                </script>';    
        }

        //Check PassWord
        $rowPass = mysqli_fetch_array($sqlCheckUser);
        if($password != $rowPass['password']){
            echo '<script>
                    alert("PassWord Không Chính Xác");
                    window.location = "login.php";
                </script>';
        }else{
            $_SESSION['fullname'] = $rowPass['fullname'];
            $_SESSION['user_id'] = $rowPass['user_id'];
            // echo  $_SESSION['fullname'];
            echo '<script>  
                    window.location = "index.php";
                </script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./icon/font_awesome/css/all.css">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <p class="heading">LOGIN</p>
        <form class="form-login" action="" method="POST">     
            <div class="container-items"><i class="fa-solid fa-user"></i><input type="text" placeholder="USERNAME" name="username"></div>
            <div class="container-items"><i class="fa-solid fa-key"></i><input type="password" placeholder="PASSWORD" name="password"></div>
            <button type="submit" name="sbm-login" class="btn-register">LOGIN</button>
        </form>
    </div>
</body>
</html>