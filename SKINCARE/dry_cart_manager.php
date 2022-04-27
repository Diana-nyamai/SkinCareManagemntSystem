<!-- this manages the products added to cart -->
<?php
session_start();
// session_destroy();
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //   enables you to add a product to a cart
      if(isset($_POST["addtocart"])){
        if(isset($_SESSION["cart"])){
          $myitems = array_column($_SESSION['cart'], 'item_name');
            //   this condition makes sure the same product is not added twice
          if(in_array($_POST['item_name'], $myitems)){
              echo "<script>
              alert('product already added');
              window.location.href ='dry.php';
              </script>";
          }
        //   this condition makes sure a product is added to cart
          else{
          $count = count($_SESSION['cart']);
          $_SESSION['cart'][$count] = array('product_id' => $_POST['product_id'] ,'shop_name' => $_POST['shop_name'] , 'product_image' => $_POST['product_image'] ,'item_name' => $_POST['item_name'], 'price'=>$_POST['price'], 'quantity' => $_POST['qty']);
                echo "<script>
                alert('you have added a product');
                window.location.href ='dry.php';
                </script>";
        }}
        else{
            $_SESSION['cart'][0]=array('product_id' => $_POST['product_id'] ,'shop_name' => $_POST['shop_name'] ,'product_image' => $_POST['product_image'] , 'item_name' => $_POST['item_name'], 'price'=>$_POST['price'], 'quantity' => $_POST['qty']);
            echo "<script>
             alert('you have added a product');
              window.location.href ='dry.php';
              </script>";
        }
      }

    // enables you to remove a product from the cart page
   if(isset($_POST['remove'])){
       foreach($_SESSION['cart'] as $key => $value){
           if($value['item_name'] == $_POST['item_name']){
           unset($_SESSION['cart'] [$key]);
           $_SESSION['cart'] = array_values($_SESSION['cart']);
           echo" <script>
           window.location.href= 'cart.php';
           </script>";
       }}
   }
  }
?>