<?php
    session_start();

    include('config.php');
    
    $email = $_SESSION['SESSION_EMAIL'];

    $sql = mysqli_query($conn, "select * from users where email = '$email'");
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];

    $query = mysqli_query($conn, "select * from details where user_id = {$id}");
    $count = mysqli_num_rows($query);
    if($count === 1){
        echo "Registration already completed";
    }    
    
    else{
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $aadhar = $_POST['aadhar'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $dob = date('Y-m-d',strtotime($_POST['dob']));
        $age = $_POST['age'];
        $category = $_POST['category'];
        $income = $_POST['income'];

        //Databse connection
        $conn = new mysqli('localhost','root','','login');
        if($conn->connect_error){
            die('Connection Failed:'.$conn->connect_error);
        }
        else{
            if(isset($id) || isset($firstName) || isset($middleName) || isset($lastName) || isset($dob) || isset($aadhar) || isset($contact) || isset($address) || isset($age) || isset($category) || isset($income)){
                $stmt = $conn->prepare("insert into details (user_id, fname, mname, lname, dobfield, aadhno, conno, address, age, cat, inc) values ('$id', '$firstName', '$middleName', '$lastName', '$dob', '$aadhar', '$contact', '$address', '$age', '$category', '$income')");
                $stmt->execute();
                echo"<script type='text/javascript'>alert('Registration Successful');window.location.href='welcome.php';</script>";
                $stmt->close();
                $conn->close();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="sqlToJSON.php">SEE JSON</a>
</body>
</html>