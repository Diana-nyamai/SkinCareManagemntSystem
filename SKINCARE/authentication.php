<!-- page that contains the login and signup page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>Authentication</title>
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
          padding: 20px 0 0 30px;
        }
        .back a{
          color: #fff;
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
        .preview{
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border: 1px solid #999;
            background: transparent;
        }
        .fa-refresh{
          position: absolute;
          right: 0;
          top: 55%;
          transform: translate(-55%, -55%);
          color: white;
          background-color:#888;
          padding: 3px;
          cursor: pointer;
        }
        .check-box{
            margin: 20px 16px 30px 0;
        }
        span{
            color: #777;
            font-size: 12px;
        }
        .forgot_password{
          margin-left: 80px;
          font-size:12px;
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
<p class="back"><a href="index.php"> < Back</a></p>
  <!-- the main form box -->
    <div class="form-box">
       <div class="button-box">
           <div id="btn"></div>
           <button type="button" class="toggle-btn" onclick="Login()">log in</button>
           <button type="button" class="toggle-btn" onclick="Signup()">sign up</button>
       </div>
        
<!-- login form -->
       <form name="login" id="login" class="login" action="login.php" method="post" onsubmit="return validateLoginForm(event)">
        <input type="text" class="input-field" id="Lfname" name="fname" placeholder="First Name...">
        <input type="password" class="input-field" id="Lpassword" name="lpassword" placeholder="Password...">
        <p class="preview"></p>
        <input type="text" class="input-field" id="captcha" name="captcha" placeholder="Enter captcha text...">
        <button type="button" class="captcha-refresh"><i class="fa fa-refresh"></i></button>
        <input type="checkbox" class="check-box"><span>Remember me</span>
        <a href="forgot.php" id="forgot" class="forgot_password">forgot password?</a>
        <input type="submit" class="submit-btn" id="login-btn" value="Log In">
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
function validateLoginForm(event){
  event.preventDefault();
   fname = document.login.Lfname.value;

   if(fname == ""){
     alert('please enter first name');
     document.getElementById('Lfname').focus();
     return false;
   }
   var lpassword = validateLPassword();
   if(!lpassword){
     return;
   }
   event.target.submit();
   

  

 }

// validating the password
function validateLPassword(){
  var p = document.getElementById('password').value;
   if(p == ""){
     alert('user must have password!');
     return false;
   }
     return true;
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

(function(){
  const fonts = ["cursive","sans-serif","serif","monospace"];
  let captchaValue = "";
  function generateCaptcha(){
    let value = btoa(Math.random()*1000000000);
    value = value.substr(0,5+Math.random()*5);
    captchaValue = value;
  }
  function setCaptcha(){
    let html = captchaValue.split("").map((char)=>{
      const rotate = -20 + Math.trunc(Math.random()*30);
      const font = Math.trunc(Math.random()*fonts.length);
      return `<span 
        style="
          transform:rotate(${rotate}deg);
          font-family:${fonts[font]}
          color: green;
        "
      >${char}</span>`;
    }).join("");
    document.querySelector(".preview").innerHTML = html;
  }
  function initCaptcha(){
    document.querySelector(".captcha-refresh").addEventListener("click",function(){
      generateCaptcha();
      setCaptcha();
    });
    generateCaptcha();
    setCaptcha();
  }
  initCaptcha();
  
  document.querySelector("#login-btn").addEventListener("click",function(event){
    let inputCaptchaValue = document.querySelector("#captcha").value;
    if(inputCaptchaValue === captchaValue){
      alert("SUCCESS");
    } else {
      event.preventDefault();
      alert("Invalid captcha");

    }
  });
})();





    </script>
</body>
</html>