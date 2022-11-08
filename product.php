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
    <a href="">Product</a>
    <a href="cart.php">Cart</a>
    <a href="profile.php">Profile</a>
  </div>
</header>
<div class="containers">

  <div class="search">
    <div class="search-container">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search for a book">
        <input type="submit" name="submit" value="Search">
      </form>
    </div>
  </div>

<section class="products">
   <a href="product2.php" class="next">Next</a>
   <h1 class="title">BOOKS</h1>

   <div class="box-container">
      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `ms_product` LIMIT 9") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="<?php echo $fetch_products['product_image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['product_name']; ?></div>
      <div class="price">Rp. <?php echo $fetch_products['product_price']; ?></div>
      <h1 class="white">Select Rent Time(s)</h1>
      <input type="number"  class="qty" name="duration" min="1" value="1">
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
        <small>Copyright &copy; 2022 ~ Books and Tenancy</small>

    </footer>

</body>
</html>