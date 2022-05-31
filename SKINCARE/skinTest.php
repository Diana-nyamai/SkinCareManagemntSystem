<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skin test questions</title>
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
             overflow-x: hidden;
             height: auto;
             background-image: linear-gradient(180deg,#1e1f31, #f09053);
             color: #fff;
        }
        h2{
            text-align: center;
            padding: 30px 0;
            font-size: 30px;
            border-bottom: 1px solid #fff;
        }
        h3{
            text-align: center;
            padding: 10px 0;
            font-size: 20px;
        }
        .back{
            margin: 30px;
            padding: 20px 0 0 30px;
        }
        .back a{
            color: #fff;
        }
        .questions{
            margin:20px;
            width: 100%;
            padding: 20px;
        }
        .question1,
        .question2,
        .question3,
        .question4,
        .question5,
        .question6,
        .question7,
        .question8,
        .question9{
            margin-bottom: 20px;
        }
        .btn{
            outline: none;
            padding: 10px 30px;
            background:#1e1f31;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body onload="populate()">
    <p class="back"><a href="home.php"> < Back to home page</a></p>
    <h2>WHAT IS YOUR SKIN TYPE?</h2>
    <h3>Heavenly skin type tester.</h3>
<form name="skinForm">
    <div class="questions">
    <div class="question1">
        <h4>1. Texture of your skin</h4> <br/>
        <input type="radio" name="q1" onclick="saver(1, 0)"/> Does not Shine <br/>
        <input type="radio" name="q1" onclick="saver(1, 1)"/> Is dry and sometimes slight flaking may appear <br/>
        <input type="radio" name="q1" onclick="saver(1, 2)"/> Shines on the nose <br/>
        <input type="radio" name="q1" onclick="saver(1, 3)"/> Shines all-over <br/>
        <input type="radio" name="q1" onclick="saver(1, 4)"/> Dry patches<br/>
    </div>
    <div class="question2">
        <h4>2. Appearance of pores on your skin</h4> <br/>
        <input type="radio" name="q2" onclick="saver(2, 0)"/> Normal <br/>
        <input type="radio" name="q2" onclick="saver(2, 1)"/> Very fine <br/>
        <input type="radio" name="q2" onclick="saver(2, 2)"/> Visible<br/>
        <input type="radio" name="q2" onclick="saver(2, 3)"/> Very opened <br/>
        <input type="radio" name="q2" onclick="saver(2, 4)"/> Very visible<br/>
    </div>
    <div class="question3">
        <h4>3. How does your skin look like?</h4> <br/>
        <input type="radio" name="q3" onclick="saver(3, 0)"/> Cool, fresh, and supple <br/>
        <input type="radio" name="q3" onclick="saver(3, 1)"/> Thin and lacking moisture  <br/>
        <input type="radio" name="q3" onclick="saver(3, 2)"/> Shines on the "T" zone(forehead, nose,chin)<br/>
        <input type="radio" name="q3" onclick="saver(3, 3)"/> Shines and has a tendency for acne <br/>
        <input type="radio" name="q3" onclick="saver(3, 4)"/> Redness spots<br/>
    </div>
    <div class="question4">
        <h4>4. How does your skin feel when touched?</h4> <br/>
        <input type="radio" name="q4" onclick="saver(4, 0)"/> Supple<br/>
        <input type="radio" name="q4" onclick="saver(4, 1)"/> Dry or very dry<br/>
        <input type="radio" name="q4" onclick="saver(4, 2)"/> Oily on the forehead and nose <br/>
        <input type="radio" name="q4" onclick="saver(4, 3)"/> Oily all over <br/>
        <input type="radio" name="q4" onclick="saver(4, 4)"/> May feel itchy<br/>
    </div>
    <div class="question5">
        <h4>5. How often do you feel tightness around the eyes and mouth area</h4> <br/>
        <input type="radio" name="q5" onclick="saver(5, 0)"/> Very often <br/>
        <input type="radio" name="q5" onclick="saver(5, 1)"/> Regularly <br/>
        <input type="radio" name="q5" onclick="saver(5, 2)"/> Sometimes <br/>
        <input type="radio" name="q5" onclick="saver(5, 3)"/> Never <br/>
        <input type="radio" name="q5" onclick="saver(5, 4)"/> often<br/>
    </div>
    <div class="question6">
        <h4>6. How often do you have pimples?</h4> <br/>
        <input type="radio" name="q6" onclick="saver(6, 0)"/> Very seldom<br/>
        <input type="radio" name="q6" onclick="saver(6, 1)"/> Never  <br/>
        <input type="radio" name="q6" onclick="saver(6, 2)"/> Sometimes<br/>
        <input type="radio" name="q6" onclick="saver(6, 3)"/> Very often<br/>
        <input type="radio" name="q6" onclick="saver(6, 4)"/> Recurrently when exposed to some products<br/>
    </div>
    <div class="question7">
        <h4>7. Do you have facial lines and wrinkles?</h4> <br/>
        <input type="radio" name="q7" onclick="saver(7, 0)"/> Very few <br/>
        <input type="radio" name="q7" onclick="saver(7, 1)"/> Very deep<br/>
        <input type="radio" name="q7" onclick="saver(7, 2)"/> Expression lines only <br/>
        <input type="radio" name="q7" onclick="saver(7, 3)"/> None <br/>
        <input type="radio" name="q7" onclick="saver(7, 4)"/> around the eyes and forehead<br/>
    </div>
    <div class="question8">
        <h4>8. What happens when your skin is exposed to sun?</h4> <br/>
        <input type="radio" name="q8" onclick="saver(8, 0)"/> Reddens <br/>
        <input type="radio" name="q8" onclick="saver(8, 1)"/> Burns<br/>
        <input type="radio" name="q8" onclick="saver(8, 2)"/> Tans <br/>
        <input type="radio" name="q8" onclick="saver(8, 3)"/> Tans very well<br/>
        <input type="radio" name="q8" onclick="saver(8, 4)"/> Burns and reddens<br/>
    </div>
    <div class="question9">
        <h4>9. How does your skin look and feel at the end of the day?</h4> <br/>
        <input type="radio" name="q9" onclick="saver(9, 0)"/> Feels normal <br/>
        <input type="radio" name="q9" onclick="saver(9, 1)"/> Like the desert. I need to put moisturizer<br/>
        <input type="radio" name="q9" onclick="saver(9, 2)"/> My forehead and nose are very shiny and oily <br/>
        <input type="radio" name="q9" onclick="saver(9, 3)"/> Crazly oily<br/>
        <input type="radio" name="q9" onclick="saver(9, 4)"/> I have some redness and irritation <br/>
    </div>
    <input class="btn" type="button" value="FIND SKIN TYPE" onclick="total()">
    <input class="btn" type="reset" value="RESET">

    <div id="result">

    </div>
</div>
</form>
<script>
    //this sets up an array for all of the answers that are given 
 var Quest = new Array(10);

 // this function gives each of the answers 0 points so if someone doesn't answer a question the whole thing will continue to work 
 function populate(){
     for(var i=0; i<10; i++){
         Quest[i] = 0;
     }
 }

 // this function adds the number of points each answer is worth together 
 function total(){
  myScore=0;
  for(var i=0; i<10; i++){
      myScore=myScore+Quest[i];
  }
  analyser(myScore);
 }

 myContents = new Array();
 myContents[0] = "<h3> Your skin type is: normal .Find more information about NORMAL skin in this link <a href='./normal.php'> click here!</a></h3>";
 myContents[1] = "<h3> Your skin type is: dry .Find more information about DRY skin in this link <a href='./dry.php'> click here!</a></h3>";
 myContents[2] = "<h3> Your skin type is: combination .Find more information about COMBINATION skin in this link <a href='./combination.php'> click here!</a></h3>";
 myContents[3] = "<h3> Your skin type is: OILY .Find more information about OILY skin in this link <a href='./oily.php'> click here!</a></h3>";
 myContents[4] = "<h3> Your skin type is: Oily .Find more information about OILY skin in this link <a href='./oily.php'> click here!</a></h3>";
 myContents[5] = "<h3> Your skin type is: Sensitive .Find more information about SENSITIVE skin in this link <a href='./sensitive.php'> click here!</a></h3>";

function analyser(myScore){
    if (myScore > 30) {myContentsPtr = 5;}
    else{ if(myScore > 24) {myContentsPtr = 4;}
    else{ if(myScore > 18) {myContentsPtr = 3;}
    else{ if(myScore > 12) {myContentsPtr = 2;}
    else{ if(myScore > 6)  {myContentsPtr = 1;}
    else {myContentsPtr = 0;}
}}}}
    myDisplay(myContents[myContentsPtr])
}

function myDisplay(myContents){
   document.getElementById("result").innerHTML = (myContents);
}
function saver(q, points){
    q= q-1;
    Quest[q]= points;
}
</script>

</body>
</html>