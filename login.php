<?php
session_start();
require 'logincheck.php';
 
if(isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false){

        die('Incorrect username / password combination!');
    } 
    else{
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        if($validPassword){
            
            $_SESSION['user_id'] = $user['email'];
            $_SESSION['logged_in'] = time();
            
               
        }
        else{
            die('Incorrect username / password combination!');
        	}
    }   
}
?>
<html>
<head>
	<title>Login Page</title> 

	<meta charset="utf-8">
	<meta name="language" content="english"> 
	<meta http-equiv="content-type" content="text/html">
	<meta name="author" content="Peter Jough">
	<meta name="designer" content="Peter Jough">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
	<meta name="description" content="A login design for IS218 - Yong Zhao">
	<meta name="keywords" content="Peter Jough, NJIT, bis, web design, login, page, php, pdo, mysql, yong zhao, is218">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	<link rel="icon" type="image/x-icon" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<section>
		<div class = "bgc">
		<p class = "logintext">Welcome! Please login</p>
		<div class = "container boxmove">
			<div class="form-group">
			<form method="post" action="validlogin.php">
				<input type="text" id = "username" name = "username" placeholder="Enter Email"><br>
				<div class = "loginbox">
					<input type = "password" id = "password" name = "password" placeholder="Enter Password"><br><br>
					<input type = "submit"  action="validlogin.php" name = "register" value = "Register"></button>
				</div>
			</form>	
			</div>
		</div>		
		<div class = "logintext">
			<p class = "logintext">Don't have an account?<br></p>
			<a href="https://web.njit.edu/~pjj5/week4hw/project1/IS218-Week1/project.php" target="_blank"><p class = "registertext">Register Here!</p>
			</a>
		</div>
	</section>
	<script>
	//jquery 
	function main() {
	  $('.bgc').hide();
	  $('.bgc').fadeIn(2010);
	  
	  $('.projects').hide();
	  
	  $('.projects-button').on('click', function() {
			$(this).next().slideToggle(400);
	    $(this).toggleClass('active');
	    $(this).text('Projects Viewed');
		});
	}
	$(document).ready(main);
	</script>
</body>
</html>
