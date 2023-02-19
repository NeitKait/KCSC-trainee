<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trang chủ</title>
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    ?>
    <h1>Helluuu, chào <?php echo $row['name']; ?> </h1>
    <h4>Thông tin người dùng</h4>
    <table>
        <tr>
            <td>Name: </td>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <td>Userame: </td>
            <td><?php echo $row['username']; ?></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><?php echo $row['password']; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td></td>
        </tr>


    </table>
    <h4>Tải ảnh lên</h4>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" id="" value="aloooooo">
        <button type="submit" name="submit">Tải lên </button>
    </form>
    <br>
    <h4> Lựa chọn khác</h4>
    <button class="GFG" onclick="window.location.href = 'logout.php';"> Đăng xuất</button>
    <button class="GFG" onclick="window.location.href = 'image_show.php';"> Xem ảnh đã đăng</button>
    <br>
</body>

</html>