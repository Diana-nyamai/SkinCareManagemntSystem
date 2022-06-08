<!-- this manages the products added to cart -->
<!-- open tag for php -->
<?php
session_start();
// session_destroy();
// server stores info about the server
// request method used to access the page
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //   enables you to add a product to a cart
      if(isset($_POST["addtocart"])){
        // checks whether the session has some data
        if(isset($_SESSION["cart"])){
          // get item name from session cart
          // returns values from a single column
          $myitems = array_column($_SESSION['cart'], 'item_name');
            //   this condition makes sure the same product is not added twice
            // in array searches in an array(myitems) if the value item name exist 
          if(in_array($_POST['item_name'], $myitems)){
              echo "<script>
              alert('product already added');
              window.location.href ='home.php';
              </script>";
          }
        //   this condition makes sure a product is added to cart
          else{
            // returns no. of elements in a cart
          $count = count($_SESSION['cart']);
          // enters the data in an associative array
          // session with index zero
          $_SESSION['cart'][$count] = array('product_id' => $_POST['product_id'] ,'shop_name' => $_POST['shop_name'] , 'product_image' => $_POST['product_image'] ,'item_name' => $_POST['item_name'], 'price'=>$_POST['price'], 'quantity' => $_POST['qty']);
                echo "<script>
                alert('you have added a product');
                window.location.href ='home.php';
                </script>";
        }}
      }

    // enables you to remove a product from the cart page
   if(isset($_POST['remove'])){
       foreach($_SESSION['cart'] as $key => $value){
           if($value['item_name'] == $_POST['item_name']){
            //  removes a variable from a session
           unset($_SESSION['cart'] [$key]);
          //  $_SESSION['cart'] = array_values($_SESSION['cart']);
           echo" <script>
           window.location.href= 'cart.php';
           </script>";
       }}
   }
  }
?>