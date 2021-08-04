<?php
//head
function head()
{
    echo '
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css">
    <meta name="theme-color" content="#4CAF50">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="author" content="srsrinivasan
<meta name="keywords" content="young cricketers, pkmboys,youngcricketers,pkm boys,pkmboys.unaux, pkmboys.">
<meta name="description" content="pkmboys && young cricketers website. 🙂💯🏏">
<meta name="date" content="02-08-2021" schema="dd-mm-yyyy">
    <noscript>Enable javascript</noscript>
 
    ';
}
//end head
//imgslider
function imgslide()
{
    echo '   <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 4</div>
      <img src="assets/1.jpg" style="width: 100%" />
      <div class="text">ENJOY</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 4</div>
      <img src="assets/2.jpg" style="width: 100%" />
      <div class="text">EVERY SUNDAY</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 4</div>
      <img src="assets/3.jpg" style="width: 100%" />
      <div class="text">PLAY CRICKET</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">4 / 4</div>
      <img src="assets/4.jpg" style="width: 100%" />
      <div class="text">WE ARE YOUNG CRICKETERS</div>
    </div>
  </div>
  <br />

  <div style="text-align: center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
 ';
}
//end imgslider
//navbar

function nav()
{
    global $home;
    global $chats;
    global $login;
    global $logout;
    global $me;
    global $signin;
    global $conn;
    //db
    $conn = mysqli_connect('sql109.unaux.com', 'unaux_29312107', '2jjze9b28', 'unaux_29312107_pkm');
//$conn=mysqli_connect('localhost','root','','dbpkm');
    session_start();
    if (!isset($_SESSION['id'])) {
        echo '<div id="preloader">
        <div id="status">&nbsp;
        </div></div>
  <div id="navbar">
  <a class="' .
            $home .
            '" href="index.php#content">YOUNG CRICKETERS</a>
  <a  class="' .
            $chats .
            '"  href="message.php#content">CHATTING</a>
  <a  class="' .
            $login .
            '"  href="login.php#content">LOG IN</a>
  <a  class="' .
            $signin .
            '"  href="signin.php#content">SIGN IN</a>
</div>
  ';
    } else {
        echo '<div id="preloader">
        <div id="status">&nbsp;
        </div></div>
  <div id="navbar">
  <a class="' .
            $home .
            '" href="index.php#content">YOUNG CRICKETERS</a>
  <a  class="' .
            $chats .
            '"  href="message.php#content">CHATTING</a>
  <a  class="' .
            $me .
            '"  href="me.php#content">EDIT ME</a>
  <a  class="' .
            $logout .
            '"  href="logout.php">LOG OUT</a>
</div>
  ';
    }
}
#end navbar
//sign in
function signin()
{
    echo '<div class="container"id="content">
  <h1>SIGN IN</h1>
  <form action="signin.php" method="post" align="center" enctype="multipart/form-data">

  <input type="text" id="cuname"placeholder="NAME" name="cuname" required /><br><br>

  <input type="password" id="code"placeholder="VERIFY CODE" name="code" required/><br><br>

  <input type="password" id="cupass1"placeholder="ENTER PASSWORD" name="cupass" required /><br><br>

  <input type="text" id="roll"placeholder="BATSMAN or BOWLER or ALLROUNDER" name="roll"  required/><br><br>

  <input type="text" id="des"placeholder="DESCRIPTION" name="des" required/><br><br>

  <label for="img">UPLOAD PROFILE PHOTO</label>
  <input type="file" id="img" name="image" accept="image/*" required/><br><br>

  <button type="submit"name="signin">SIGN IN </button> <br>

  </form>


</div>
  ';
}
//signin end
//login
function login()
{
    echo '
<div class="container" id="content">
          <h1>LOG IN</h1>
          <form action="" method="post" align="center">

          <input type="text" id="luname"placeholder="USER NAME" name="luname" required /><br><br>

          <input type="password" id="lupass"placeholder="USER PASSWORD" name="lupass" required /><br><br>
          <button type="submit"name="login">LOG IN </button> <br>

          </form>

      </div>
';
}
//login end
//editme
function editme()
{
    echo '<div class="container"id="content">
  <h1>EDIT ME</h1>
  <form action="" method="post" align="center" enctype="multipart/form-data">

  <input type="text" id="ename"placeholder="EDIT NEW USER NAME" name="ename" required/><br><br>

  <input type="password" id="epass"placeholder="EDIT NEW USER PASSWORD" name="epass" required/><br><br>

  <input type="text" id="roll"placeholder="BATSMAN or BOWLER or ALLROUNDER" name="roll"  required/><br><br>

  <input type="text" id="des"placeholder="DESCRIPTION" name="des" required/><br><br>

  <label for="img">UPLOAD PROFILE PHOTO</label>
  <input type="file" id="img" name="image" accept="image/*" required/><br><br>

  <button type="submit"name="update"> UPADTE </button> <br>

  </form>


</div>
  ';
}
//end editme

//footer
function footer()
{
    echo ' <script src="assets/script.js"></script>
    ';
}
//end footer