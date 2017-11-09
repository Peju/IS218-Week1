<?php
session_start();
require 'logincheck.php';
/*
$loginfirst = $_POST['username'];
$loginpass = $_POST['password'];
$qry = $sql("SELECT* FROM accounts WHERE username = '$loginfirst'")
*/
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login2.php');
}
else{

}
?>

<?php include 'view/header.php'; ?>

<html>
<title>Valid</title>
<head>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/x-icon" href="favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="newacc.css">
</head>
<body>
  <section>
    <img class = "bgt" src = "boatblur.jpg">
      <div>
        <p class = "logoutmsg">You are currently signed in</p><br>
        <a href="failureacc.php"><p class = "logoutmsg2">Sign out</a></p>
        <br>
      </div>
  </section>
  <!--<form method="post" action="login.php" name="loginform" id="loginform">
    <input type="submit" name="login" value="Login" class="btn btn-default">
  </form>-->
</body>
</html>

<?php include 'view/footer.php'; ?>