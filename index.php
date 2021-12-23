<?php
$insert=false;
if(isset($_POST["name"])){
// Set connection variables
$server="localhost";
$username="root";
$password="";

//Create a database connection
$con=mysqli_connect($server,$username,$password);

// Check for conection success
if(!$con){
    die("Connection to this database failed due to".mysqli_connect_error());

}
// echo "Successful Connection To DB";

//Collect Post Variables
$name=$_POST["name"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$desc=$_POST["desc"];
// For multiple cursor you can also use alt+shift+drag mouse
$sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";//To select database type 'trip'.'table'
// echo $sql;

//Execute the Query

if($con->query($sql)==true){//"->"is an object operator
    // echo "Succesfully inserted";

    //Flag for successfull connection
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
    $con->close();
    // Close the Databse Connection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="Japan">
    <div class="container">
        <h1>Welcome To Japan Trip</h1>
        <p>Enter Your Details</p>
        <?php
        if($insert==true){
        echo "<p class='submitmsg'>Thanks for booking your Trip.Have a Safe Journey!</p>";
        }
        ?>
        <form action="" method="post"></form>

    </div>
    <form action="index.php" method="post">

        <input type="text" name="name" id="name" placeholder="Enter your Name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
        <input type="email" name="email" id="email" placeholder="Enter your Email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
        <textarea name="desc" id="desc" cols=10 rows=10
            placeholder="Enter any Description regarding you purpose for the trip"></textarea>
        <button class="btn">Submit</button>



    </form>

    <script src="index.js"></script>
</body>

</html>
