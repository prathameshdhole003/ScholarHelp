<?php
    session_start();

    include('config.php');
    
    $email = $_SESSION['SESSION_EMAIL'];

    $sql = mysqli_query($conn, "select * from users where email = '$email'");
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];

    $query = mysqli_query($conn, "select * from details where user_id = {$id}");
    $count = mysqli_num_rows($query);

    // function function_alert($message) { 
    //     echo "<script>alert('$message');</script>";
    // }

    if($count === 1){
        echo"<script type='text/javascript'>alert('You have already registered');window.location.href='welcome.php';</script>";
    }  

    else{
        header("Location: regform.php");
    }
?>  