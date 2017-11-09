<?php
session_start();
require 'logincheck.php';
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //error checker
    
    //Construct the SQL statement and prepare it, check if user exists
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //prep insert
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
    $result = $stmt->execute();
    
    if($result){
        echo 'Registration Complete. Thank you!';
    }   
}

?>

<html>
<head>
	<title>Register Page</title> 

	<meta charset="utf-8">
	<meta name="language" content="english"> 
	<meta http-equiv="content-type" content="text/html">
	<meta name="author" content="Peter Jough">
	<meta name="designer" content="Peter Jough">
	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
	<meta name="description" content="A register design for IS218 - Yong Zhao">
	<meta name="keywords" content="Peter Jough, NJIT, bis, web design, php, pdo, mysql yong zhao njit, is218">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	<link rel="icon" type="image/x-icon" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="project.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<section>
		<img class = "bgt" src = "boatblur.jpg">
			<div class = "registerbox">
				<p class = "registertext">Welcome to IS218</p>
				<p class = "welcometext">Register below
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</p>
				<div class="container boxmove">
			    	<form method="post" action="newacc.php" style="display:inline">
				    	<div class="form-group boxsize">
				      		<input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
				    	</div>
				    	<div class="form-group boxsize">
					      	<input type="password" name="password" class="form-control" id="email" placeholder="Enter password">
				    	</div>
				    	<div class="form-group boxsize">
				      		<input type="text" name="fname" class="form-control" id="email" placeholder="Enter first name">
					    </div>
				    	<div class="form-group boxsize">
				    		<input type="text" name="lname" class="form-control" id="email" placeholder="Enter last name">
				    	</div>
				    	<div class="form-group boxsize">
				      		<input type="text" name="phone" class="form-control" id="email" placeholder="Enter phone number">
				    	</div>
				    	<div class="form-group boxsize">
				      		<input type="date" name="birhtday" class="form-control" id="pwd" >
					    </div>
					    <div class="form-group boxsize">
				      		<input type="text" name="gender" class="form-control" id="pwd" placeholder="Enter gender">
					    </div>
			    	<input type="submit" action="newacc.php" value="Create Account" class="btn btn-default buttoncolor">
			  		</form>
				</div><br>
			</div>	
	</section>

<script>
//jquery 
function main() {
  $('.bgt').hide();
  $('.bgt').fadeIn(2200);
  
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