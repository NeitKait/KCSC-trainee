<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $confirmpassword =  $_POST["confirmpassword"];
    echo $password."<br>";
    echo $confirmpassword;

    $duplicate = mysqli_query($conn, "SELECT * FROM member WHERE username='$username' ");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('username bị trùng, vui lòng đặt username khác'); </script>";
    } else {
        if (password_verify($confirmpassword,$password)) {
            $query = "INSERT INTO member(id,name,username,password) VALUES('', '{$name}','{$username}','{$password}');";
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
    <title>Đăng ký</title>
</head>

<body>

    <h2>Đăng ký</h2>
    <form class="" action="" method="post" autocomplete="off">
        <table>
            <tr>
                <td>Name: </td>
                <td>
                    <input type="text" name="name" id="name" required value="">
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" name="username" id="username" required value="">
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="text" name="password" id="password" required value=""></td>
            </tr>
            <tr>
                <td>Confirmpassword: </td>
                <td><input type="text" name="confirmpassword" id="confirmpassword" required value=""></td>
            </tr>
            <tr>
                <td> <button class="GFG" onclick="window.location.href = 'index.php';"> Đăng nhập</button></td>
                <td><button type="submit" name="submit">Đăng ký</button></td>
            </tr>
        </table>

    </form>
    <br>


</body>

</html>