<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
   
   <link rel="stylesheet" href="style.css">   
   
   
</head>
<style>

body{
    background: rgb(110, 110, 110);
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color :black ;
    padding: 0px;
    margin: 0px;
    display: flex;
    justify-content: center;
    font-size: 2rem;
    color: white;
   
}

p{
   text-align: center;
    margin-top: 50px ;
}
h3{
    text-align: center;
}

.button{
	background-color:#f44336;
	color:white;
	}
	.button2{
	background-color:#4CAF50;
	color:white;
	display: inline-block;
	
	}
.slideContainer{
	border-style: outset;
	background-color: #5F9EA0;
    margin-bottom: 100px;
	 margin-top: 100px;  
	width: 50%;
}


.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}
.slider :hover{
    opacity: 1;
}
.slider::-webkit-slider-thumb{
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  background: #047baa;
  cursor: pointer;
}

</style>
<body>
   
 
 
    <div class = "slideContainer">
       
       
       
        
        <form action="TaskMotors.php" method = "POST">
		
		<p>Drag the slider to Select the value:</p>
        
        <h3>Motor1</h3>
        <div class = "motor1">
        <input type="range" min = "0" max = "180" value="0" id = "myRange1" class = "slider" name = "Base">
        <p>Value: <span id = "value1"></span></p>
        </div>
        <br>
       
        <h3>Motor2</h3>
        <div class = "motor2">
        <input type="range" min = "0" max = "180" value="0" id = "myRange2" class = "slider" name = "shoulder">
        <p>Value: <span id = "value2"></span></p>
        </div>
       
        <br>
      
        <h3>Motor3</h3>
        <div class = "motor3">
        <input type="range" min = "0" max = "180" value="0" id = "myRange3" class = "slider" name = "Elbow">
        <p>Value: <span id = "value3"></span></p>
        </div>
        <br>
     
        <h3>Motor4</h3>
        <div class = "motor4">
        <input type="range" min = "0" max = "180" value="0" id = "myRange4" class = "slider" name = "Wrist">
        <p>Value: <span id = "value4"></span></p>
        </div>
        <br>
       
        <h3>Motor5</h3>
        <div class = "motor5">
        <input type="range" min = "0" max = "180" value="0" id = "myRange5" class = "slider" name = "Gripper">
        <p>Value: <span id = "value5"></span></p>
        </div>
        <br>
        
        <h3>Motor6</h3>
        <div class = "motor6">
        <input type="range" min = "0" max = "180" value="0" id = "myRange6" class = "slider" name = "Engine">
        <p>Value: <span id = "value6"></span></p>
        </div>
		
       <button class="button" name="Save">Save</button>
       <button class="button button2" name="On">On</button>
   
   </form>
          </div>
   
   
           <?php

        error_reporting(E_ALL);

        ini_set('display_errors', 1);

        $Base=$_POST["Base"];

        $shoulder= $_POST["shoulder"];

        $Elbow= $_POST["Elbow"];

        $Wrist=$_POST["Wrist"];

        $Gripper=$_POST["Gripper"];

        $Engine =$_POST["Engine"];



        $conn = new mysqli('localhost','root@localhost','','motors');

        if(isset($_POST["save"])){

        $stmt=$conn->prepare("INSERT INTO motor (Base,Shoulder,Elbow,Wrist,Gripper,Engine) VALUES (?,?,?,?,?,?)");

        $stmt -> bind_param("iiiiii",$Base,$shoulder,$Elbow,$Wrist,$Gripper,$Engine);

        $stmt->execute();

        echo "Saved successfully";

        }

       

         if(isset($_POST["On"])){

        $stmt=$conn->prepare("INSERT INTO runinng VALUES (NULL,1);");

        $stmt->execute();

         echo "Ran successfully";

}

        ?>
   
   
</body>
<script> 
var slider1 = document.getElementById("myRange1");
var  output1 = document.getElementById("value1");
output1.innerHTML = slider1.value;
slider1.oninput = function() {
    output1.innerHTML = this.value;
   
}
var slider2 = document.getElementById("myRange2");
var  output2 = document.getElementById("value2");
output2.innerHTML = slider2.value;
slider2.oninput = function() {
    output2.innerHTML = this.value;
   
}
var slider3 = document.getElementById("myRange3");
var  output3 = document.getElementById("value3");
output3.innerHTML = slider3.value;
slider3.oninput = function() {
    output3.innerHTML = this.value;
   
}
var slider4 = document.getElementById("myRange4");
var  output4 = document.getElementById("value4");
output4.innerHTML = slider4.value;
slider4.oninput = function() {
    output4.innerHTML = this.value;
   
}
var slider5 = document.getElementById("myRange5");
var  output5 = document.getElementById("value5");
output5.innerHTML = slider5.value;
slider5.oninput = function() {
    output5.innerHTML = this.value;
   
}
   
var slider6 = document.getElementById("myRange6");
var  output6 = document.getElementById("value6");
output6.innerHTML = slider6.value;
slider6.oninput = function() {
    output6.innerHTML = this.value;
   
} </script>
</html>
