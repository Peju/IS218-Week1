<?php
session_start();
include_once 'logincheck.php';
/*
$loginfirst = $_POST['username'];
$loginpass = $_POST['password'];
$qry = $sql("SELECT* FROM accounts WHERE username = '$loginfirst'")
*/

$user = ['fname','lname']; 
        
$_SESSION['user'] = $user; 


echo "<div class='welcome_login'><h1>Welcome!",$_SESION['user']['firstname'] ," Thanks for logging in!!</h1></div>";

if(!isset($_SESSION['user_id']) || !isset($_SESSION['pppword'])){
    header("Location: login2.php");
}


?>

<?php include 'view/header.php'; ?>

<html>
<title>Valid Login</title>
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
</body>
</html>

<?php include 'view/footer.php'; ?>