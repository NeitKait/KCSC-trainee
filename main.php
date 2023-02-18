<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>trang chu</title>
</head>
<body>

    <h1>Helluuu, chào bạn người dùng </h1>
    <?php
        $username = $_GET['username'];
        $sql = "SELECT * FROM member WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        $row= mysqli_fetch_assoc(mysqli_query($conn,$sql)); 
        echo 'Thông tin người dùng';
        echo '<br>';
        echo 'name:';
        echo $row['name'];
        echo '<br>';
        echo 'username: ';
        echo $row['username'];
        echo '<br>';
        echo 'password:';
        echo $row['password']; 
        echo '<br>';   
        echo '<br>';
        echo '<br>';
    
    ?>
    <button class="GFG" onclick="window.location.href = 'logout.php';"> Đăng xuất</button>

    <br>
</body>

</html>