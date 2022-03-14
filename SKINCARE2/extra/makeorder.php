v<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0 ">
    <title>order form</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
<style>
        * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
        }
        body{
          color: #fff;
          background-image: linear-gradient(45deg,#1e1f31, #f09053);
          height: 100vh;
          overflow-x: hidden;
        }
        h1{
            text-align: center;
            padding: 20px;
            color: #000;
        }

        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }

        label {
          padding: 12px 12px 12px 0;
          display: inline-block;
        }

        input[type=submit] {
          background-image: linear-gradient(45deg,#1e1f31, #f09053);
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
          width: 100%;
          font-size: 20px;
        }

        input[type=submit]:hover {
          cursor: pointer;
        }

        .container {
          border-radius: 5px;
          background-image: linear-gradient(45deg,#1e1f31, #f09053);-color: #e1e2e1;
          padding: 20px;
        }

        .col-25 {
          float: left;
          width: 25%;
          margin-top: 6px;
        }

        .col-75 {
          float: left;
          width: 75%;
          margin-top: 6px;
        }

        /* to Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /*adding  Responsivess to the forms when the screen is less than 600px wide */
        @media screen and (max-width: 600px) {
          .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
          }
        }
    </style>
</head>
<body>
  <!-- body section -->
    <h1>Make order</h1>
    <div class="container">
      <!-- start of the form -->
      
        <form name="order" action="order.php" method="post" onsubmit="return validateForm()">
          <div class="row">
            <div class="col-25"><label for="email">first name</label></div>
            <div class="col-75"><input type="text" id="fname" name="fname" placeholder="first name.."></div>
          </div>
          <div class="row">
            <div class="col-25"><label for="email">email</label></div>
            <div class="col-75"><input type="text" id="email" name="email" placeholder="email.."></div>
          </div>
        <div class="row">
            <div class="col-25"><label for="tamount">total amount</label></div>
            <div class="col-75"></div>
          </div>
          <div class="row">
            <div class="col-25"><label for="payment">payment type</label></div>
            <div class="col-75">
              <select id="payment" name="payment">
                <option value="" selected="selected"></option>
                <option value="cash">cash on delivery</option>
              </select>
            </div>
          </div>
        <br>
        <div class="row">
          <input type="submit" value="make order">
        </div>
        </form>
      </div>

      <!-- javascript section -->
<script>
  // validating the main form
 function validateForm(){
  date = document.order.date.value;
  tamount = document.order.tamount.value;

  

  if(date == ""){
    alert('enter the date');
    return false;
  }
  if(tamount == ""){
    alert('enter the total amount');
    return false;
  }
  var returned = true;

  returned = validatepayment();
  if(returned == true)
  return returned

  //  validating payment type
function validatepayment(){
      payment = document.getElementById('payment').options.selectedIndex;
      if(payment == 0){
        alert('select the payment');
        return false;
      }
      else{
        return true;
      }
}
 }


 


</script>
</body>
</html>