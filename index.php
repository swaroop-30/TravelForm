<?php
    $insert = false;
    if(isset($_POST['name']))
    {
    //Set connection variables
       
    $server = "localhost";
    $username = "root";
    $password= "";
    //Create a database connection

    $con = mysqli_connect($server, $username, $password);
    // Connection check
    if(!$con)
    {
        die("connection to this database failed due to" . mysqli_connect_error());

    }
    echo "Success connecting to the database";

    //collect post variables
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $age= $_POST['age'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $desc= $_POST['desc'];
    $sql = "INSERT INTO `project1.0`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;
   //execute query
    if($con->query($sql) == true)
    {
        //Flag for successful insertion
        $insert=true;
       // echo "Successfully inserted";

    }
    else{
        echo "ERROR: $sql <br> $con->error";


    }
    //close the database connection
    $con->close();
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
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="BG" src="BG1.webp" alt="IIT Indore">
    <div class="container">
        <h1>Welcome to IIT Indore</h1>
        <p><b>Please Enter your details</b></p>
        <?php
        if($insert == true)
        {
        echo "<p class='submitmsg'> Thanks for submitting the form. Welcome Onboard</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name" required>
            <input type="text" name="age" id="age" placeholder="Enter your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <!--<select class="imp" name="gender" id="gender" placeholder ="Gender">
            <option selected>Select your Gender</option>
            <option >Male</option>
            <option >Female</option>      
            <option>Other</option>
        </select>-->
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other details (if any)"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>

</body>

</html>