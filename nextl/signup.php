<?php
	require 'dbconfig/config.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Signup</title>
</head>
<body>
<div class="signup-container d-flex align-items-center justify-content-center">
  <form class="login-form text-center" action="signup.php" method="post">
    <h1 class="mb-5 font-weight-light text-text-uppercase">Register</h1>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Name" name="username" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
    </div>
    <button name="submit_btn" type="submit" class="btn mt-5 btn-primary btn-block">Signup</button>
    <br>
    <br>
  </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  </body>
</html>
<?php
	if(isset($_POST['submit_btn']))
	{
		//echo '<script> alert("nothing")</script>';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		
		if($password==$cpassword)
		{
			$query = "select * from userinfo WHERE username = '$username'";
			$query_run = mysqli_query($con,$query);
			
			if(mysqli_num_rows($query_run)>0)
			{
				//there is user with same name
				echo '<script type="text/javascript"> alert("User already exists..try another Username")</script>';
			}
			else
			{
				$query = "insert into userinfo values('$username','$password')";
				$query_run = mysqli_query($con,$query);
				
				if($query_run)
				{   
                    
					echo '<script type="text/javascript"> alert("User Registered.. Go To Login page to Login")</script>';
                    header('location:login.php');
				}
				else
				{
					echo '<script type="text/javascript"> alert("Error!")</script>';
				}
			}	
		}
		else
		{
			echo '<script type="text/javascript"> alert("Password and Confirm password does not match")</script>';
		}
	
	
	}
		
?> 

</body>
</html>
