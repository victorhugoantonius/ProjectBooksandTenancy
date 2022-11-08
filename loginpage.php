<?php 
	session_start();
	include 'db.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="css/style.css">

</head>
<body>

<section class="login" id="login">
  <div class="head">
  <h1 class="company">Login Form</h1>
  </div>
  <div class="form">
    <form method="POST">
  <input type="text" placeholder="Username" class="text" name= "name" id="username" required><br>
  <input type="password" placeholder="Password" name = "pass" class="password"><br>
  <input type="submit" name = "submit" class="log">
    </form>
  </div>
</section>
  <script  src="./script.js"></script>

</body>
</html>

<?php 
	if(isset($_POST['submit'])) {
		$user = $_POST['name'];
		$pass = $_POST['pass'];
		$sql = mysqli_query($conn, "SELECT * FROM ms_admin WHERE
			admin_username = '$user' AND admin_pass = '$pass'");
	$flag = mysqli_num_rows($sql);
	if($flag > 0) {
		$temp = mysqli_fetch_object($sql);
		$_SESSION['var'] = $temp;
		$_SESSION['ID'] = $temp->admin_id;
		echo "<meta http-equiv=refresh content=0;URL='home.php'>";
	} else {
		echo '<script>alert("Invalid Username or Password!")</script>';
	}

	}
?>
