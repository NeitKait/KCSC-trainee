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

    <h1>Helluuu</h1>
    <?php
        $username = $_GET['username'];
        $sql = "SELECT * FROM member WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        echo $_SESSION['id'];
        $row= mysqli_fetch_assoc(mysqli_query($conn,$sql));      
        
        echo $row['username'];
        echo '<br>';
        echo 'password: ';
        echo $row['password'];        
    ?>
    <a href="logout.php">dang xuat</a>
    <br>
</body>

</html>