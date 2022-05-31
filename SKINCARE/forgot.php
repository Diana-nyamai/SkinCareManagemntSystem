<!-- forgot pasword page-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=0">
    <title>Forgot password</title>
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
  <!-- the main form box -->
    <div class="form-box">
       <div class="button-box">
           <div id="btn"></div>
           <button type="button" class="toggle-btn">Forgot Password</button>
       </div>
        
<!-- login form -->
       <form name="login" id="login" class="login" action="forgotControl.php" method="post" onsubmit="return validateLoginForm()" autocomplete="off">
        <input type="text" class="input-field" id="email" name="email" placeholder="Email address...">
        <input type="submit" class="submit-btn" id="forgot" name="forgot" value="Verify Email">
       </form>
    </div>

    <script>
    // form validation of log in
function validateLoginForm(){
    email = document.login.email.value;

    if(email.length == 0 || email.indexOf('@') == -1 || email.indexOf('.') == -1){
    alert('enter a valid email.should contain @ and .');
    document.getElementById('email').focus();
    return false;
  }
 }

    </script>
</body>
</html>