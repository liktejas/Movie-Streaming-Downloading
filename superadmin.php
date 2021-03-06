<?php
    session_start();
    include 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/3039/3039386.svg" type="image/x-icon">

    <title>HDMovies.com</title>
    <style>
		body {font-family: Arial, Helvetica, sans-serif;}
		form {border: 3px solid #f1f1f1;}

		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		#button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		#button:hover {
			opacity: 0.8;
		}

		span.psw {
			float: right;
			padding-top: 16px;
		}

		/* Change styles for span and cancel button on extra small screens */
		@media screen and (max-width: 300px) {
			span.psw {
				display: block;
				float: none;
			}
		}
	</style>
  </head>
  <body>
        
        <div class="container mt-5">
        <?php
		if(isset($_POST['login']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM superadmin WHERE username='$username' AND password='$password'";
			$q = mysqli_query($connection, $sql);
			if(mysqli_num_rows($q) > 0)
			{
				$get_superadmin_details = mysqli_fetch_array($q);
                $get_superadmin_name = $get_superadmin_details['name'];
				$_SESSION['superadmin_username'] = $username;
				$_SESSION['superadmin_name'] = $get_superadmin_name;
				header('Location:control.php');
			}
			else
			{
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Login Failed</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			}
			
		}
	    ?>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <h1 class="text-center" style="background-color:black;color:white">SuperAdmin Login</h1>
                    <form action="" method="post">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" id="username" autofocus required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required>

                        <button type="submit" id="button" name="login">Login</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>