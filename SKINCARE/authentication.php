<!-- page that contains the login and signup page -->
<!-- <!DOCTYPE html> is a declaration that informs a browser the type of document to expect which is html5 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>Authentication</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <!-- href specifies the location of the linked document. 
    - rel specifies the rship between the current doc and the linked one -->
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
            /* element is positioned relative to its normal position */
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
            /* specifies the radius on an element's corner */
            border-radius: 30px;
        }
        /* styles the buttons to be toggled */
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
            /* creates an image consisting of progressive transition between two or more colors */
            background: linear-gradient(to right, #1e1f31, #f09053);
            /* positioned relative to the nearest ancestor */
            position: absolute;
            border-radius: 30px;
            transition: .5s;
        }
        .login{
            /* border: 5px solid blue; */
            top: 180px;
            position: absolute;
            width: 280px;
            /* allows an element to change smoothly over a given time */
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
            /* specifies the mouse pointer to be displayed */
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
           <!-- onclick executes a javascript when clicked -->
           <button type="button" class="toggle-btn" onclick="Login()">log in</button>
           <button type="button" class="toggle-btn" onclick="Signup()">sign up</button>
       </div>
        
<!-- login form -->
<!-- onsubmit executes when a form is submited -->
<!-- action specifies where the form data will be sent wen form submit -->
<!-- method specifies the http method used to send data wen fom submit -->
<!-- element that contains the input elements eg text fields, radio button etc -->
       <form name="login" id="login" class="login" action="login.php" method="post" onsubmit="return validateLoginForm(event)">
       <!-- specifies an input field where user can enter data 
      placeholder describes expected input
    name and id is used to reference elements-->
        <input type="text" class="input-field" id="Lfname" name="fname" placeholder="First Name...">
        <input type="password" class="input-field" id="Lpassword" name="lpassword" placeholder="Password...">
        <p class="preview"></p>
        <input type="text" class="input-field" id="captcha" name="captcha" placeholder="Enter captcha text...">
        <button type="button" class="captcha-refresh"><i class="fa fa-refresh"></i></button>
        <input type="checkbox" class="check-box"><span>Remember me</span>
        <!-- creates hyperlink to web pages, files etc -->
        <a href="forgot.php" id="forgot" class="forgot_password">forgot password?</a>
        <input type="submit" class="submit-btn" id="login-btn" value="Log In">
       </form>

<!-- sign up form -->
       <form name="signup" id="signup" class="signup" action="signup.php" method="post" onsubmit="return validateSignupForm(event)">
        <input type="text" class="input-field" id="fname" name="fname" placeholder="First Name...">
        <input type="text" class="input-field" id="lname" name="lname" placeholder="Last Name...">
        <input type="text" class="input-field" id="phone" name="phone" placeholder="Phone Number...">
        <input type="text" class="input-field" id="email" name="email" placeholder="Email...">
        <!-- radio selects one of the many given choices -->
        <input type="radio" class="input-field" id="m" name="gender" value="male" > <span class="radio1">Male</span>
        <input type="radio" class="input-field" id="f" name="gender" value="female"> <span class="radio2">Female</span>
        <!-- creates a drop down list -->
        <select class="input-field" name="user" id="user">
          <!-- available option in the dropdown -->
            <option value="" selected="selected"> select your role</option>
            <option value="customer"> customer</option>
            <option value="dermatologist"> dermatologist</option>
            <option value="admin"> admin</option>
        </select>
        <!-- chars are masked -->
        <input type="password" class="input-field" id="password" name="password" placeholder="Password...">
        <input type="checkbox" class="check-box"><span>I agree with the terms & conditions</span>
        <input type="submit" value="signup" class="submit-btn">
        <!-- <button type="submit" class="submit-btn">Sign Up</button> -->
       </form>
    </div>

    <script>
    // login and signup toggle
    // method used to return an element with specified id property

        var l = document.getElementById('login');
        var s = document.getElementById('signup');
        var b = document.getElementById('btn');

        function Signup(){
          // will be pushed to the left
            l.style.left = "-400px";
            // will be pushed to left
            s.style.left = "50px";
            // 110px from left will push to right
            b.style.left = "110px";
        }
        function Login(){
          // will be pushed to right
            l.style.left = "50px";
            // will be pushed to the right
            s.style.left = "450px";
            // 0px from left will be pushed to left
            b.style.left = "0px";
        }

    // form validation of log in
function validateLoginForm(event){
  // method prevents default behaviour of an event
  event.preventDefault();
  // html object model document,form name,element name, value
   fname = document.login.Lfname.value;

   if(fname == ""){
     alert('please enter first name');
    //  sets focus on the specified element
     document.getElementById('Lfname').focus();
     return false;
   }
   var lpassword = validateLPassword();
   if(!lpassword){
     return;
   }
  //  The submit event fires when the user clicks a submit button
   event.target.submit();
 }

// validating the password
function validateLPassword(){
  var p = document.getElementById('Lpassword').value;
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
    //  html dom used when you want to edit or view an html element
    // focus method gives focus to an html element
     document.getElementById('fname').focus();
    //  stops the browsers default behaviour of browser
     return false;
   }
   if(lname == ""){
     alert('please enter second name')
     document.getElementById('lname').focus();
     return false;
   }
  //  isNAN returns true if a value is a number
   if(phone.length < 10 || isNaN(phone) || phone.length > 10){
    alert('Enter a valid number');
    document.getElementById('phone').focus();
    return false;
  }
  // index of is a method that returns the positon of the 1st occurrence of a value in a string
  if(email.length == 0 || email.indexOf('@') == -1 || email.indexOf('.') == -1){
    alert('enter a valid email.should contain @ and .');
    document.getElementById('email').focus();
    return false;
  }
   // method prevents default behaviour of an event
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
}

// validating the password
function validatePassword(){
   var p = document.getElementById('password').value;
   if(p == ""){
     alert('user must have password!');
     return false;
   }+
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

// self executing function
// block of code designed to perform a particular task
(function(){
  const fonts = ["cursive","sans-serif","serif","monospace"];
  // let allows you to declare variables that are limited to scope of the block statement
  let captchaValue = "";
  function generateCaptcha(){
    // btoa method encodes a string in base 64.uses A-Z,a-z, 0-9, +, / characters to encode the string
    // math.random method returns a random number from 0 to 999999999
    let value = btoa(Math.random()*1000000000);
    // substr method extracts a substring from value between the specified vlue
    value = value.substr(0,5);
    captchaValue = value;
  }
  function setCaptcha(){
    // split splits a string to an array of substring
    // map creates a new array from calling a function for every array element
    let html = captchaValue.split("").map((char)=>{
      // trunc returns integer part of a number
      const rotate = -20 + Math.trunc(Math.random()*30);
      const font = Math.trunc(Math.random()*fonts.length);
      return `<span 
        style="
          transform:rotate(${rotate}deg);
          font-family:${fonts[font]}
          color: green;
        "
      >${char}</span>`;
      // join returns an array as a string
    }).join("");
    // displaying on the browser
    // method returns the first element that matches css selector
    // inner html get the content of the class
    document.querySelector(".preview").innerHTML = html;
  }
  // refreshing the captcha
  function initCaptcha(){
     // method returns the first element that matches css selector
    document.querySelector(".captcha-refresh").addEventListener("click",function(){
      generateCaptcha();
      setCaptcha();
    });
    generateCaptcha();
    setCaptcha();
  }
// calling init captcha
  initCaptcha();
   // method returns the first element that matches css selector
   // addeventlistener method attaches an event handler to a document
  document.querySelector("#login-btn").addEventListener("click",function(event){
    let inputCaptchaValue = document.querySelector("#captcha").value;
    if(inputCaptchaValue === captchaValue){
      alert("Correct Captcha");
    } else {
      // prevents default behavior 
      event.preventDefault();
      alert("Invalid captcha");

    }
  });
})();

    </script>
</body>
</html>