<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	include 'templates/head.php';

	 ?>
</head>

<body>
	
	
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form  action="#" method="GET">
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div class="step">
									<h3 class="main_question"><strong></strong>Login</h3>
									<div class="form-group"><label>UserName</label>
										<input type="text" name="user_name" placeholder="UserName" class="form-control required" >
									</div>
									<div class="form-group">
									<label>Password</label>
										<input type="password" name="password"  class="form-control required" placeholder="Password"  >
									</div>
									<div class="form-group">
										<input type="submit" name="login" class="form-control required" >
								</div>
								</div>
	
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Wizard script -->
	<script src="js/survey_func.js"></script>

</body>
</html>
 <?php  

session_start();     
  
 require __DIR__ . '/conn.php';

 
if (isset($_REQUEST["login"]))
 {
   $user_name=$_REQUEST['user_name'];
	 $password=$_REQUEST['password'];
   
    $sql = "SELECT * FROM `user_reg` WHERE `user_name`='$user_name' AND  `password`='$password' ";
  
   $result=$conn->query($sql);
   if($result==true)
   {
 

  if($result->num_rows > 0)

  { 
    while($row=$result->fetch_assoc())
    {
      $user_id=$row["user_id"];

    }
 }
 else
 {
  $errors[]="incorrect username or password";
 }
  	if(empty($errors)){


      
      $_SESSION['user_id']=$user_id;
      $_SESSION["isLoggedIn"]=true;
      $_SESSION['user_name']=$user_name;

       header("Location: index.php");


    }
    else
    {
      echo implode("<br>",$errors);

    }
  
  }
  
  }  else{
      $errors="incorrect details";
    }

 ?>