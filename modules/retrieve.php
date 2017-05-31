<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25-Apr-17
 * Time: 9:36 PM
 */

include_once"../db/db.php";

$user_email = $_GET['email'];

$sql= "SELECT *  FROM `user_account` WHERE Email = '$user_email'";
$result=$conn->query($sql);
if (!$row= $result->fetch_assoc()){
    echo"No Email Found";
}else {
    $user_fullName = $row['FullName'];
    $username = $row['UserName'];
    $password = $row['Passwd'];

    // $_SESSION['name']= "Name ".$user_fullName."<br>";
    // $_SESSION['username']= "Username ".$username."<br>";
    // $_SESSION['Password']= "Password ".$password."<br>";

    header("location: ../retrieve.php?name=$username&password=$password&success");
}
