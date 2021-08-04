<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chatting Now...</title>
    <?php
    include 'app.php';
    head();
    ?>
</head>

<body>
    <?php
    $chats = 'active';
    nav();
    if (!isset($_SESSION['id'])) {
        header('location:login.php#content');
    }
    echo '<br><br><br><br><br>';
    imgslide();
    if (isset($_POST['send'])) {
        if (!$conn) {
            echo "<p class='error'>not connect . <br>" .
                mysqli_connect_error() .
                '</p>';
        } else {
            $name = $_SESSION['name'];
            $chat = $_POST['chat'];
            date_default_timezone_set('asia/kolkata');
            $time = date('d:m:Y / H:i:sa');
            $sql = "INSERT INTO `chats` (`id`, `name`, `chat`, `time`) VALUES (NULL, '$name', '$chat','$time');";
            if (mysqli_query($conn, $sql)) {
                header('location:message.php#content');
            } else {
                echo 'not send' . mysqli_error($conn) . $sql;
            }
        }
    }
    ?>

    <div class="container">
        <h1>CHATING NOW ...</h1>
        <div style="overflow-x:auto;width:100%;margin:0;">
            <?php
            $sql = 'SELECT * FROM chats;';
            $res = mysqli_query($conn, $sql);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $no = $row['id'];
                    $cname = $row['name'];
                    $message = $row['chat'];
                    $ctime = $row['time'];
                    echo '
           <table class="table">
           
           <tr>
               <th>NO</th>
               <th>NAME</th>
               <th>MESSAGE</th>
               <th>TIME</th>
           </tr>
           <tr>
               <td>' .
                        $no .
                        '</td>
               <td>' .
                        $cname .
                        '</td>
               <td>' .
                        $message .
                        '</td>
               <td>' .
                        $ctime .
                        '</td>
           </tr>
       </table>
           ';
                }
            }
            ?>

        </div>

        <form id="content" action="message.php" method="post" align="center">

            <input type="text" id="chat" placeholder="TYPE MESSAGE" name="chat" /><br><br>

            <button type="submit" name="send"> SEND </button> <br>

        </form>

    </div>

</body>
<?php footer(); ?>

</html>