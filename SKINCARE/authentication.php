<!-- page that contains the login and signup page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>Authentication</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
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
        /* the main form box */
        .form-box{
            width: 380px;
            height: 700px;
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
        }
        /* styles the buttons to be toggles */
        .toggle-btn{
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
        }
        /* the button that will be transitioning from one side to the other */
        #btn{
            width: 110px;
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
        .signup{
            top: 180px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        .input-field{
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }
        .check-box{
            margin: 20px 16px 30px 0;
        }
        span{
            color: #777;
            font-size: 12px;
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
        .radio1{
            position: absolute;
            bottom: 220px;
            font-size: 14px;
        }
        .radio2{
            position: absolute;
            bottom: 197px ;
            font-size: 14px;
        }
        #login{
            left: 50px;
        }
        #signup{
            left: 450px;
        }
    </style>
</head>
<body>
  <!-- the main form box -->
    <div class="form-box">
       <div class="button-box">
           <div id="btn"></div>
           <button type="button" class="toggle-btn" onclick="Login()">log in</button>
           <button type="button" class="toggle-btn" onclick="Signup()">sign up</button>
       </div>
        
<!-- login form -->
       <form name="login" id="login" class="login" action="login.php" method="post" onsubmit="return validateLoginForm()">
        <input type="text" class="input-field" id="Lfname" name="fname" placeholder="First Name...">
        <input type="password" class="input-field" id="Lpassword" name="lpassword" placeholder="Password...">
        <input type="checkbox" class="check-box"><span>Remember me</span>
        <button type="submit" class="submit-btn">Log In</button>
       </form>

<!-- sign up form -->
       <form name="signup" id="signup" class="signup" action="signup.php" method="post" onsubmit="return validateSignupForm(event)">
        <input type="text" class="input-field" id="fname" name="fname" placeholder="First Name...">
        <input type="text" class="input-field" id="lname" name="lname" placeholder="Last Name...">
        <input type="text" class="input-field" id="phone" name="phone" placeholder="Phone Number...">
        <input type="text" class="input-field" id="email" name="email" placeholder="Email...">
        <input type="radio" class="input-field" id="m" name="gender" value="male" > <span class="radio1">Male</span>
        <input type="radio" class="input-field" id="f" name="gender" value="female"> <span class="radio2">Female</span>
        <select class="input-field" name="user" id="user">
            <option value="" selected="selected"> select your role</option>
            <option value="customer"> customer</option>
            <option value="dermatologist"> dermatologist</option>
            <option value="admin"> admin</option>
        </select>
        <input type="password" class="input-field" id="password" name="password" placeholder="Password...">
        <input type="checkbox" class="check-box"><span>I agree with the terms & conditions</span>
        <input type="submit" value="signup" class="submit-btn">
        <!-- <button type="submit" class="submit-btn">Sign Up</button> -->
       </form>
    </div>

    <script>
    // login and signup toggle
        var l = document.getElementById('login');
        var s = document.getElementById('signup');
        var b = document.getElementById('btn');

        function Signup(){
            l.style.left = "-400px";
            s.style.left = "50px";
            b.style.left = "110px";
        }
        function Login(){
            l.style.left = "50px";
            s.style.left = "450px";
            b.style.left = "0px";
        }

    // form validation of log in
function validateLoginForm(){
   fname = document.login.Lfname.value;
   lname = document.login.Llname.value;

   if(fname == ""){
     alert('please enter first name');
     document.getElementById('Lfname').focus();
     return false;
   }
   if(lname == ""){
     alert('please enter second name')
     document.getElementById('Llname').focus();
     return false;
   }
   var returned = true;
  
   returned == validateLPassword();
   if(returned == true)
   return returned;
 }



// validating the password
function validateLPassword(){
   p = document.getElementById('Lpassword').value;
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
   else{
     alert('password is correct');
   }
}





        // Form validation of sign up
function validateSignupForm(event){
   fname = document.signup.fname.value;
   lname = document.signup.lname.value;
   phone = document.signup.phone.value;
   email = document.signup.email.value;
   

   if(fname == ""){
     alert('please enter first name');
     document.getElementById('fname').focus();
     return false;
   }
   if(lname == ""){
     alert('please enter second name')
     document.getElementById('lname').focus();
     return false;
   }
   if(phone.length == 0 || isNaN(phone)){
    alert('Enter a valid number');
    document.getElementById('phone').focus();
    return false;
  }
  if(email.length == 0 || email.indexOf('@') == -1 || email.indexOf('.') == -1){
    alert('enter a valid email.should contain @ and .');
    document.getElementById('email').focus();
    return false;
  }
     event.preventDefault();
     var gender = validateGender();
     var role = validateRole();
     var password = validatePassword();
    if(!gender || !role || !password){
      return;
    }
    event.target.submit();
  
 }

 // validating gender
function validateGender(){
  if (document.getElementById('m').checked) {
  return true;
    }
    else if(document.getElementById('f').checked){
     return true;
    }
    else{
    alert('please select the gender');
    return false;
   }
}

// validating role of user
function validateRole(){
      role = document.forms["signup"]["user"].options.selectedIndex;
      if(role == 0){
        alert('select the role of user');
        return false;
      }
      return true;
      // else{
      //   return true;
      // }
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







    </script>
</body>
</html>