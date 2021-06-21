

<html>
<head>

</head><body>
   <?php

        error_reporting(E_ALL);

        ini_set('display_errors', 1);

        $Base=$_POST["Base"];

        $shoulder= $_POST["shoulder"];

        $Elbow= $_POST["Elbow"];

        $Wrist=$_POST["Wrist"];

        $Gripper=$_POST["Gripper"];

        $Engine =$_POST["Engine"];



        $conn = new mysqli('localhost','root','','motors');

        if(isset($_POST["Save"])){

        $stmt=$conn->prepare("INSERT INTO motors (Base,Shoulder,Elbow,Wrist,Gripper,Engine) VALUES (?,?,?,?,?,?)");

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
</html>