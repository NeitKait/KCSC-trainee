<?php
require 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ảnh</title>
</head>
<body>
    <?php
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `image` WHERE id='$id' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <img src="<?php echo $row['name']  ?>">
    <?php
        }
    ?>
</body>
</html>