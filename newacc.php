<?php
  session_start();
  include_once 'logincheck.php';
  $uname = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $fname = $_REQUEST['fname'];
  $lname = $_REQUEST['lname'];
  $num = $_REQUEST['phone'];
  $birthday = $_REQUEST['birthday'];
  $gender = $_REQUEST['gender'];
  $sql = 'SELECT* FROM accounts WHERE email = "'.$uname.'"';
  $results = runQuery($sql);
  if (count($results) > 0) {
    header("Location: identical.php");
  }else{
    $sql = 'INSERT INTO accounts (`email`, `password`, `fname`, `lname`, `birthday`, `gender`, `phone`) VALUES ("'.$uname.'", "'.$password.'", "'.$fname.'", "'.$lname.'", "'.$birthday.'", "'.$gender.'", "'.$num.'")';
    $result = runQuery($sql);
  }
?>

<?php include 'view/header.php'; ?>

<html>
<title>Successful Login</title>
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
        <p class = "logoutmsg">Congratulations!</p><br>
        <p class = "logoutmsg2">You have made an account</p>
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