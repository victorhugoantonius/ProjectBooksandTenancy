<?php 
  session_start();
  include 'db.php';
  //  $res="SELECT * FROM ms_product";
  // $query=mysqli_query($conn, $res);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>homepage</title>
	<link rel="stylesheet" type="text/css" href="css/product.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cambria">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">
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
<div class="containers">

<section class="products">

   <div class="box-container">
    <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_products = mysqli_query($conn, "SELECT * FROM ms_product WHERE product_name LIKE '%$search_item%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
   ?>
   <form action="" method="post" class="box">
      <img src="<?php echo $fetch_product['product_image']; ?>" alt="" class="image">
      <div class="name"><?php echo $fetch_product['product_name']; ?></div>
      <div class="price">$<?php echo $fetch_product['product_price']; ?>/-</div>
      <h1 class="white">Select Rent Time(s)</h1>
      <input type="number"  class="qty" name="duration" min="1" value="1">
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image']; ?>">
      <input type="submit" class="btn" value="add to cart" name="add_to_cart">
   </form>
   <?php
            }
         }else{
            echo '<p class="empty">no result found!</p>';
         }
      }
   ?>
   </div>

</section>
</div>
    <footer>
        <small>Copyright &copy; 2022 ~ Books and Tenancy</small>

    </footer>

</body>
</html>