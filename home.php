<?php 
  session_start();
  include 'db.php';
  //  $res="SELECT * FROM ms_product";
  // $query=mysqli_query($conn, $res);
  $admin_id = "";
  $admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : '';

  if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $duration = $_POST['duration'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `ms_cart` WHERE 'admin_id' = '$admin_id'");

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `ms_cart`(admin_id, name, price, image, duration) VALUES('$admin_id', '$product_name', '$product_price', '$product_image', '$duration')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>homepage</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cambria">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
	<header>
  <a href="" class="logo">Books and Tenancy</a>
  <div class="header2">
    <a href="homepage.php" class="on">Home</a>
    <a href="product.php">Product</a>
    <a href="cart.php">Cart</a>
    <a href="profile.php">Profile</a>
    <a href="loginpage.php">Log out</a>
  </div>
</header>
<div class="containers">
  <section class="home">

   <div class="content">
      <h3>WELCOME TO BOOKS AND TENANCY</h3>
      <p>Books and Tenancy is an online rental bookstore with a purpose to get you more knowledge. We wanted to create easy and convenient way for you to get your books at the same time. We will provide lots of books to read and improve your reading skills. Not only that, we will help make your life happier.</p>
      <a href="" class="white-btn">Rent Books Now</a>
   </div>

</section>

<section class="products">

   <h1 class="title">SALES PRODUCT</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `ms_product` LIMIT 3") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="<?php echo $fetch_products['product_image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['product_name']; ?></div>
      <div class="price">Rp. <?php echo $fetch_products['product_price']; ?></div>
      <h1 class="white">Select Rent Time(s)</h1>
      <input type="number" min="1" name="duration" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['product_name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['product_price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['product_image']; ?>">
      <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>
</div>
    <footer>
      <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <small>Copyright &copy; 2022 ~ Books and Tenancy</small>

    </footer>
</body>
</html>
