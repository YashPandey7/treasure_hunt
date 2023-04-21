<?php

$showAlert = false;
$showerror = false;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include './partials/dbconnect.php';
		$username = $_REQUEST["username"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		$cpassword = $_REQUEST["cpassword"];

		$existsql = "SELECT * FROM `signup` WHERE username = '$username'";
    	$result = mysqli_query($conn, $existsql);
    	$numexistrows = mysqli_num_rows($result);

    	if($numexistrows > 0 )
    	{
        	//$exists = true;
       	 	$showerror = "Username already Exists";
    	}
    	else
    	{  
        	if(($password == $cpassword))
        	{
           		$hash = password_hash($password , PASSWORD_DEFAULT);
				$sql = "INSERT INTO `signup` (`username`, `email`, `password`, `date & time`) VALUES ('$username', '$email', '$hash', current_timestamp())";

           		$result = mysqli_query($conn,$sql);

            	if($result)
            	{
            	    $showalert = true;
            	    header("location:./index.php");
            	}
        	}
        	else
        	{
            	$showerror="Password do not match"; 
        	}
    	}

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

	<?php

	if($showAlert){
		echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" >
          <strong>Success!</strong> Your account is created successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button> 
    	</div>';
	}

	if($showerror)
      {
          echo '
      <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
          <strong>Error! </strong>'. $showerror.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button> 
      </div>';
      }
	?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>

				<form class="login100-form validate-form" action="./signup.php" method="post">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="cpassword" placeholder="Enter confirm password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div>
                            Already have an account?
							<a href="./index.php" class="txt1" style="font-size: 15px;">
								Sign in
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type = "submit" class="login100-form-btn">
							Create Account
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>