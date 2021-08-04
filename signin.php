<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIGN IN</title>
    <?php
    include 'app.php';
    head();
    ?>
</head>

<body>
    <?php
    $signin = 'active';
    nav();
    echo '<br><br><br><br><br>';
    imgslide();
    signin();
    $upload_dir = 'uploads/';
    if (isset($_POST['signin'])) {
        $cuname = $_POST['cuname'];
        $cupass = $_POST['cupass'];
        $code = $_POST['code'];
        $roll = $_POST['roll'];
        $des = $_POST['des'];
        $name = '';
        if ($_POST['code'] == 'pkm boys') {
            //img
            $imgName = $_FILES['image']['name'];
            $imgTmp = $_FILES['image']['tmp_name'];
            $imgSize = $_FILES['image']['size'];

            if (!$conn) {
                echo "<p class='error'>not connect . <br>" .
                    mysqli_connect_error() .
                    '</p>';
            } else {
                $q = "SELECT * FROM players WHERE name='$cuname';";
                $res = mysqli_query($conn, $q);
                if ($res->num_rows > 0) {
                    $row = $res->fetch_assoc();
                    $name = $row['name'];
                }
                if ($name == $cuname) {
                    echo "<p class='error'>This name Already Exist.<br> Enter Diffrent Name. <br>" .
                        mysqli_error($conn) .
                        '<br></p>';
                    echo "<script>alert('enter diffrent name . This Name Already Exist.');</script>";
                } else {
                    $imgExt = strtolower(
                        pathinfo($imgName, PATHINFO_EXTENSION)
                    );

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
                    $sql = "INSERT INTO `players` (`id`, `name`, `password`, `image`, `roll`, `des`) VALUES (NULL, '$cuname', '$cupass','$userPic','$roll','$des');";
                    $res = mysqli_query($conn, $sql);
                    if ($res) {
                        echo "<script>alert('succesfully signin goto login now');</script>";
                        echo "<p class='success'>succesfully signin <a href='login.php#content'>login now</a></p>";
                        header('location:login.php#content');
                    } else {
                        echo '<p class="error">error <br>' .
                            mysqli_error($conn) .
                            '<br></p>';
                    }
                }
            }
        } else {
            echo "<script>alert('Enter Correct Verify Code.');</script>";
            echo "<p class='error'>please enter correct verify code.</p>";
        }
    }
    ?>



</body>
<?php footer(); ?>

</html>