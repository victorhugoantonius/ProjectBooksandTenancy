<?php
session_start();
include 'db.php';

$admin_id = "";
$admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : '';

if(isset($_POST['update_cart'])){
   	$cart_id = "";
	$cart_id = isset($_POST['cart_id']) ? $_POST['cart_id'] : '';
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `ms_cart` SET duration = '$duration' WHERE cart_id = '$cart_id'");
}

if(isset($_GET['delete'])){
   	$delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `ms_cart` WHERE cart_id = '$delete_id'");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/product.css">

</head>
<body>
   
<header>
  <a href="" class="logo">Books and Tenancy</a>
  <div class="header2">
    <a href="home.php" class="on">Home</a>
    <a href="product.php">Product</a>
    <a href="cart.php">Cart</a>
    <a href="profile.php">Profile</a>
  </div>
</header>

<section class="shopping-cart">

   <h1 class="title">Your cart</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `ms_cart`") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['cart_id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
         <img class="image" src="<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['cart_id']; ?>">
            <input type="number" min="1" name="cart_duration" value="<?php echo $fetch_cart['duration']; ?>">
         </form>
         <div class="sub-total"> Sub total : <span>Rp. <?php echo $sub_total = ($fetch_cart['duration'] * $fetch_cart['price']); ?></span> </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
   </div>

            <div class='form-row'>
              <div class='col1'>
                <div class='form-control total btn btn-info'>
                  <p>Total: <span>Rp. <?php echo $grand_total; ?></span></p>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col1'>
                <button class='form-control btn btn-primary submit-button' type='submit'>Pay now</button>
              </div>
            </div>

</section>

    <footer>
      <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <small>Copyright &copy; 2022 ~ Books and Tenancy</small>

    </footer>

</body>
</html>