<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Me</title>
    <?php
    include 'app.php';
    head();
    ?>
</head>

<body>
    <?php
    $me = 'active';
    nav();
    if (!isset($_SESSION['id'])) {
        header('location:login.php#content');
    }
    echo '<br><br><br><br><br>';
    imgslide();
    editme();
    $upload_dir = 'uploads/';
    if (isset($_POST['update'])) {
        $ename = $_POST['ename'];
        $epass = $_POST['epass'];
        $roll = $_POST['roll'];
        $des = $_POST['des'];
        $name = '';
        $id = $_SESSION['id'];
        //img
        $imgName = $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];

        if (!$conn) {
            echo "<p class='error'>not connect . <br>" .
                mysqli_connect_error() .
                '</p>';
        } else {
            $q = "SELECT * FROM players WHERE name='$ename';";
            $res = mysqli_query($conn, $q);
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $name = $row['name'];
            }
            if ($name == $ename) {
                echo "<p class='error'>This Name Already Exist<br>Enter New User Name" .
                    mysqli_error($conn) .
                    '<br></p>';
                echo "<script>alert('This Name Already Exist . Enter New User Name And Password');</script>";
            } else {
                $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

                $allowExt = ['jpeg', 'jpg', 'png', 'gif', 'ico'];

                $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;

                if (in_array($imgExt, $allowExt)) {
                    if ($imgSize < 5000000) {
                        move_uploaded_file($imgTmp, $upload_dir . $userPic);
                    } else {
                        $errorMsg = 'Image too large';
                    }
                } else {
                    $errorMsg = 'Please select a valid image';
                }
            }

            if (!isset($errorMsg)) {
                $sql = "UPDATE `players` SET `name` = '$ename', `password` = '$epass',`image`='$userPic', `roll` = '$roll', `des` = '$des' WHERE `players`.`id` = '$id';";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    echo "<p class='success'>Your User Name And User Password Changed successfully</p>";
                } else {
                    echo '<p class="error">error <br>' .
                        mysqli_error($conn) .
                        '<br></p>';
                }
            }
        }
    }
    ?>



</body>
<?php footer(); ?>

</html>