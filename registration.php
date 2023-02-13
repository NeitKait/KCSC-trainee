<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM member WHERE username='$username' ");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('username bị trùng, vui lòng đặt username khác'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO member VALUE('', '$name','$username','$password')";
            mysqli_query($conn, $query);
            echo "<script> alert('Đăng kí thành công'); </script>";
        } else {
            echo "<script> alert('mật khẩu không khớp'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>dang ki</title>
</head>

<body>
    <h2>Dang ki</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <label for="username">username: </label>
        <input type="text" name="username" id="username" required value=""> <br>
        <label for="password">password: </label>
        <input type="text" name="password" id="password" required value=""> <br>
        <label for="password">confirm password: </label>
        <input type="text" name="confirmpassword" id="confirmpassword" required value=""> <br>
        <button type="submit" name="submit">dang ki</button>
    </form>
    <br>
    <a href="login.php">dang nhap</a>
    <a href="index.php">trang chu</a>
</body>

</html>