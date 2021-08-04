<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOG IN</title>
    <?php
    include 'app.php';
    head();
    ?>
</head>

<body>
    <?php
    $login = 'active';
    nav();
    echo '<br><br><br><br><br>';
    imgslide();
    login();

    if (isset($_POST['login'])) {
        $luname = $_POST['luname'];
        $lupass = $_POST['lupass'];
        if (!$conn) {
            echo "<p class='error'>not connect . <br>" .
                mysqli_connect_error() .
                '</p>';
        } else {
            $sql = "SELECT * FROM players WHERE name='$luname' and password='$lupass';";
            $res = mysqli_query($conn, $sql);
        }
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            header('location:message.php#content');
        } else {
            echo "<p class='error'>Invalide user error.<br><br><em> Please enter correct username and password. <br><br> First signin next login.<br><br> You are already signin please correctly login.<br><br> Forget password complain back to cricket whatsapp group." .
                mysqli_error($conn) .
                '<br> </p>';
        }
    }
    ?>



</body>
<?php footer(); ?>

</html>