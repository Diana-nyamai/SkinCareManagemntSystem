<!-- change password page-->
<!DOCTYPE html>
<!-- used to sttructure the webpage and its content -->
<html lang="en">
  <!-- container for metadata -->
<head>
  <!-- specifies character encoding for the doc -->
  <!-- meta tag contains meta data of the doc -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>Change password</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background: #1e1f31;
            overflow-x: hidden;
            height: 100%;
        }
        .back{
          padding: 20px;
        }
        .back a{
          color: #fff;
        }
        /* the main form box */
        .form-box{
            width: 380px;
            height: 500px;
            position: relative;
            margin: 5% auto;
            background: #fff;
            padding: 5px;
            overflow: hidden;
        }
        .button-box{
            width: 220px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #f0b753;
            border-radius: 30px;
            text-align: center;
        }
        /* styles the buttons to be toggles */
        .toggle-btn{
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            color: #fff;
        }
        /* the button that will be transitioning from one side to the other */
        #btn{
            width: 220px;
            height: 100%;
            background: linear-gradient(to right, #1e1f31, #f09053);
            position: absolute;
            border-radius: 30px;
            transition: .5s;
        }
        .login{
            top: 180px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        .input-field{
            width: 100%;
            padding: 10px 0;
            margin: 20px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }
        .submit-btn{
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            background: linear-gradient(to left, #1e1f31, #f09053);
            border: 0;
            border-radius: 30px;
        }
        #login{
            left: 50px;
        }
  </style>
</head>
<body>
  <p class="back"><a href="authentication.php"> < Back</a></p>
  <!-- the main form box -->
    <div class="form-box"> 
     
       <div class="button-box">
           <div id="btn"></div>
           <button type="button" class="toggle-btn">Change Password</button>
       </div>
        
<!-- new password form -->
       <form name="login" id="login" class="login" action="newpControl.php" method="post" onsubmit="return validateLoginForm(event)" autocomplete="off">
        <input type="password" class="input-field" id="password" name="password" placeholder="Enter password...">
        <input type="password" class="input-field" id="Cpassword" name="Cpassword" placeholder="Confirm password...">
        <input type="submit" class="submit-btn" id="change" name="change" value="Change Password">
       </form>
    </div>

    <script>
    // form validation of new password
function validateLoginForm(event){
  event.preventDefault();
   var password = validatePassword();
   var Cpassword = validateCPassword();
   if(!password || !Cpassword){
     return;
   }
   event.target.submit();
   
 }
// validating the password
function validatePassword(){
   var p = document.getElementById('password').value;
   if(p == ""){
     alert('user must have password!');
     return false;
   }
   if(p.length < 8){
     alert('The password length must be atleast 8 characters');
     return false;
   }
   if(p.length > 15){
     alert('The password length must not exceed 15 characters');
     return false;
   }
     return true;
}

function validateCPassword(){
   var p = document.getElementById('Cpassword').value;
   if(p == ""){
     alert('user must have password!');
     return false;
   }
   if(p.length < 8){
     alert('The password length must be atleast 8 characters');
     return false;
   }
   if(p.length > 15){
     alert('The password length must not exceed 15 characters');
     return false;
   }
     return true;
}

    </script>
</body>
</html>