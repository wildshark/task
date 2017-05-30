<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 28-May-17
 * Time: 10:08 PM
 */
session_start();
include_once "../db/db.php";

$username=$_GET['username'];
$password=$_GET['password'];
$rememberMe=$_GET['chkBox'];

$sql="SELECT * FROM user_account WHERE StatusID='2' AND UserName='$username' AND Passwd='$password'";
$result=$conn->query($sql);

if (!$row= $result->fetch_assoc()){
    //if the username and password don't exist load login page
    header("location: ../index.php");
}else{

    /*  get value from user_account to Session
        and load the start page
    */
    $userID=$row['userID'];
    $fullName=$row['FullName'];
    $userEmail=$row['Email'];
    $userPath=$row['Path'];
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['email']=$userEmail;
    $_SESSION['FullName']=$fullName;
    $_SESSION['userID']=$userID;
    $_SESSION['photo']=$userPath;
    $_SESSION['mobile']=$row['MobileNo'];
    $_SESSION['createDate']=$row['CreatedDate'];

    header("location: ../page.php?user=dashboard");
}