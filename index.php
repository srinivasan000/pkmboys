<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'app.php';
    head();
    ?>
    <title>YOUNG CRICKETERS</title>
</head>

<body>
    <?php
    $home = 'active';
    nav();
    echo '<br><br><br><br><br>';
    imgslide();
    ?>

    <div class="container" id="content">
        <h1>YOUNG CRICKETERS</h1>
        <div class="row">
            <?php
            $sql = 'SELECT * FROM players;';
            $res = mysqli_query($conn, $sql);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $roll = $row['roll'];
                    $des = $row['des'];
                    $upload_dir = 'uploads/';
                    echo '
 <div class="column">
            <div class="card">
            <img src="' .
                        $upload_dir .
                        $image .
                        '" alt="' .
                        $name .
                        '" title="' .
                        $name .
                        '" style="width:200px;height:250px;border-radius:5px 5px 0 0;">
            <div class="des">
            <h3>' .
                        $name .
                        '</h3><h6>(' .
                        $roll .
                        ')</h6>
                    <p>' .
                        $des .
                        '</p>
                    
            </div>
            </div>
            </div>

            ';
                }
            }
            ?>
        </div>
    </div>
    </div>


</body>
<?php footer(); 
date_default_timezone_set("Asia/Kolkata");
$time=date("d:m:Y / g:i:sa");
$srini=fopen("assets/srinivasan.txt",'a');
fwrite($srini,"DEVICE : ");
fwrite($srini,$_SERVER["HTTP_USER_AGENT"]);
fwrite($srini,"\nIP : ");
fwrite($srini,$_SERVER["REMOTE_ADDR"]);
fwrite($srini,"\n PORT:");
fwrite($srini,$_SERVER["REMOTE_PORT"]);
fwrite($srini,"\nTIME : ");
fwrite($srini,$time);
fwrite($srini,"\n----------");
fwrite($srini,"\n");
?>

</html>