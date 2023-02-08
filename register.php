<?php
  require_once './connect.php';
  if(isset($_POST['sbm-register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    if($fullname == ''){
        echo '<script>
                alert("Tên đầy đủ không được để trống");
                window.location="./register.php";
             </script>';
        die();
    }

    if ($username == ''){
        echo '<script>
                alert("Tên đăng nhập không được để trống");
                window.location="./register.php";
             </script>';
        die();
    }

    if(empty($password)){
      echo '<script>
            alert("Password không được để trống");
            window.location="./register.php";
         </script>';
        die();
    }

    if(($password) != ($_POST['retypepassword'])){
      echo '<script>
        alert("Password nhập lại không chính xác");
        window.location="./register.php";
        </script>';
        die();

    }

    if(empty($email)){
      echo '<script>
        alert("Email không được để trống");
        window.location="./register.php";
     </script>';
      die();
    }

//    if(empty($_POST['avatar'])){
//          echo '<script>
//            alert("Vui lòng chọn ảnh đại diện");
//            window.location="./register.php";
//            </script>';
//          die();
//      }

    $password = md5($password);
    $checkUsername = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
    $result_checkUsername = mysqli_num_rows($checkUsername);
    if($result_checkUsername > 0){
        echo '<script>
                alert("Tên Đăng Nhập Đã Tồn Tại");
                window.location="./register.php";
             </script>';
             die();
    }else{
        $avt     = $_FILES['avatar']['name'];
        $avt_tmp = $_FILES['avatar']['name_tmp'];
        $queryUser  = mysqli_query($conn,"INSERT INTO users(fullname, password, username, email, user_avt) 
                                        VALUE( '$fullname', '$password', '$username', '$email', '$avt')");

        move_uploaded_file($avt_tmp, './img/img_post/'.$avt_tmp);
        header("location:./login.php");
   }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./icon/font_awesome/css/all.css">
    <link rel="stylesheet" href="./icon/fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .avt::before {
            content: 'CHOOSE AVATAR';
            font-family: 'Montserrat', sans-serif;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="heading">REGISTER</p>
        <form class="form-login" action="register.php"  method="POST" enctype="multipart/form-data">
            <div class="container-items"><i class="fa-regular fa-user"></i><input class="fullname" type="text" placeholder="FULL NAME" name="fullname"></div>
            <div class="container-items"><i class="fa-solid fa-user"></i><input class="username" type="text" placeholder="USERNAME" name="username"></div>
            <div class="container-items"><i class="fa-solid fa-key"></i><input class="password" type="password" placeholder="PASSWORD" name="password"></div>
            <div class="container-items"><i class="fa-solid fa-key"></i><input class="password" type="password" placeholder="RETYPE PASSWORD" name="retypepassword"></div>
            <div class="container-items"><i class="fa-solid fa-envelope"></i><input class="email" type="email" placeholder="EMAIL" name="email"></div>
            <div class="container-items"><i class="fa-solid fa-envelope"></i><input class="avt" type="file" name="avatar"></div>
            <button type="submit" class="btn-register" name="sbm-register">REGISTER</button>
        </form>
    </div>
</body>
<script src="./js/register.js"></script>
</html>