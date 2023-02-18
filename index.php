<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: main.php");
}
if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM member WHERE username = '$username' ");
  $row = mysqli_fetch_assoc($result);
  if ($row > 0) {
    if ($password == $row['password']) {
      $_SESSION["login"] = true;
      $_SESSION["username"] = $username;
      $_SESSION["id"] = $row["id"];
      header("Location: main.php?username=" . $username);
    } else {
      echo
      "<script> alert('Sai mật khẩu'); </script>";
    }
  } else {
    echo
    "<script> alert('Người dùng chưa đăng kí'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>

<body>
  <h2>Đăng nhập</h2>
  <form class="" action="" method="post" autocomplete="off">
    <table>
      <tr>
        <td>Username: </td>
        <td><input type="text" name="username" id="username" required value=""></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input type="password" name="password" id="password" required value=""></td>
      </tr>
      <tr>
        <td><button class="GFG" onclick="window.location.href = 'registration.php';"> Đăng ký</button></td>
        <td><button type="submit" name="submit">Đăng nhập</button></td>
      </tr>
    </table>

  </form>




</body>

</html>