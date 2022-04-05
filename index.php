<?php
$error=false;
$submit=false;
if(isset($_POST['name'])){
//SET CONNECTION VARIABLE
$server="localhost";
$username="root";
$password="";


//CREATE DATABASE CONNECTION
$con=mysqli_connect($server,$username,$password);

//CHECK FOR CONNECTION SUCCESS
if(!$con){
    die( "Failed to connect to db due to ".mysqli_connect_error());
}
// echo "Successfully connect to DB";

//COLLECT POST VARIABLES
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$description=$_POST['description'];

$sql= "INSERT INTO `pgectrip`.`travel`( `Name`, `Age`, `Gender`, `Phone`, `Email`, `Description`, `DateTime`) VALUES ( '$name', '$age', '$gender', '$phone', '$email', '$description', current_timestamp());";
// echo $sql;

if($name=''){
    $con=!$con;
    $error=true;
}

// INSERTION OF QUERY
if($con->query($sql)==true){
    // echo "Successfully inserted!";

    //FLAG FOR SUCCESSFULLY INSERTION
    $submit=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

//CLOSE THE DATABASE CONNECTION
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGEC travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/33/fe/ac/kolkata-calcutta.jpg?w=700&h=500&s=1"
        alt="" width="100%" height="100%" style="position: absolute;z-index: -1;opacity: .6;">
    <div class="container">
        <h1>Welcome to PGEC-Kolkata trip</h1>
        <p> -:Enter your details for registration:-</p>

        <?php

        if($submit==true){
            echo "<p style='color: green;font-size:30px;'>Thanks for filling out the registration form. We appreciate your pressence in the trip.</p>";
        }
        if($error==true){
            echo "<p style='color: red;font-weight:1000;'>Name field cannot be empty!!!!</p>
            ";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="description" id="description" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <div class="btn">
                <button id="submit">Submit</button>
                <!-- <button id="reset">reset</button> -->
            </div>
        </form>


    </div>
    <script src="script.js"></script>

</body>

</html>
