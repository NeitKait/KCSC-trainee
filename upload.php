<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "tb_user");
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $id = $_SESSION['id'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "INSERT INTO `image`(`id`, `name`) VALUES ('$id','$fileDestination')";
                $result = mysqli_query($conn, $sql);
                if ($result != 0) {
                    echo "<script> alert('tải file thành công'); </script>";
                } else {
                    echo "<script> alert('có lỗi trong quá trình tải file'); </script>";
                }
            } else {
                echo "<script> alert('file quá lớn'); </script>";
            }
        } else {
            echo "<script> alert('có lỗi trong quá trình tải file'); </script>";
        }
    } else {
        echo "<script> alert('Web chỉ nhận File  được là .jpg .jpeg .png .pdf '); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button class="GFG" onclick="window.location.href = 'main.php';"> Ấn vào đây để về trang chủ</button>
    <button class="GFG" onclick="window.location.href = 'image_show.php';"> xem ảnh đã đăng lên</button>
</body>

</html>