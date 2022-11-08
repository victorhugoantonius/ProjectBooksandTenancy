<?php 
  session_start();
  include 'db.php';
  // $id = $_GET['admin_id'];
  $query = mysqli_query($conn, "SELECT * FROM ms_admin WHERE
    admin_id = '".$_SESSION['ID']."' ");

  $temp = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOMEPAGE</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Eczar">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cambria">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body>
	<header>
  <a href="" class="logo">Books and Tenancy</a>
  <div class="header2">
    <a href="home.php" class="on">Home</a>
    <a href="">Product</a>
    <a href="cart.php">Cart</a>
    <a href="profile.php">Profile</a>
  </div>
</header>

<div class="container">
  <h2>Your Profile</h2>
  <div class="container1">
      <form action="" method="POST">
        <input type="text" name="nama"
        placeholder="Nama Anda" class="box1" value="<?php echo $temp->admin_name ?>">
        <input type="text" name="hape"
        placeholder="No Handphone Anda" class="box1" value="<?php echo $temp->admin_phone ?>">
        <input type="text" name="user"
        placeholder="Username Anda" class="box1" value="<?php echo $temp->admin_username ?>">
        <input type="text" name="address"
        placeholder="Alamat Email Anda" class="box1" value="<?php echo $temp->admin_email ?> ">

        <input type="submit" name="submit" class="btn">
      </form>
  </div>
</div>

    <footer>
      <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <small>Copyright &copy; 2022 ~ Books and Tenancy</small>

    </footer>

</body>
</html>

<?php 
  if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $hape = $_POST['hape'];
    $user = $_POST['user'];
    $address = $_POST['address'];

    $update = mysqli_query(
      $conn, "UPDATE ms_admin SET 
      admin_name = '".$nama."',
      admin_phone = '".$hape."',
      admin_username = '".$user."',
      admin_email = '".$address."'
      ");

    if($update) {
      echo '<script>window.location="profile.php"</script>';
    } else {
      echo 'error';
    }
  }
 ?>