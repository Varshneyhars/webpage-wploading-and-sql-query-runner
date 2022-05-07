<?php
include "connection.php";
error_reporting(1);
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql  = "select * from users where username='".$user."' AND password = '".$pass."'  ";
    $result= mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    
    $sqli  = "SELECT * FROM profile where username='.$user'";
    
	$results = $conn->query($sqli);
  
    $rows=$results->fetch_assoc();

    //$_SESSION['first_name'] = "harshit";
   // $_SESSION['first_name']= $rows['first_name'];


    if($row["access_level"]=="admin"){
        $_SESSION['username']= $user;
        
        $_SESSION['access_level'] = "admin";
        header("location:../admin/dist/");
    }
    elseif($row["access_level"]=="user"){
        $_SESSION['username']= $user;
        $_SESSION['access_level'] = "user";
        header("location:../admin/dist/");
    }
    else{
        echo "username password incorrect";
    }

    if($row['password']==12345){
        header("location:newuser.php");
    }
   


}
?>