<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24-Apr-17
 * Time: 6:16 PM
 */

session_start();

include_once"../db/db.php";

//set date and time
date_default_timezone_set("Africa/Accra");

//get feeds
$date=$_GET['date'];
$assignTo=$_GET['assign_to'];
$task=$_GET['task_subject'];
$priority=$_GET['priority'];
$dueDate=$_GET['due_date'];
$note=$_GET['note'];
$statusID="1";

if (empty($assignTo)){
    $assignTo=$_SESSION['FullName'];
}

if (empty($priority)){
    $priority="1";
}
//session
$assignFrom=$_SESSION['FullName'];
$user_id=$_SESSION['userID'];
//get date and time
$createDate= date_create('now')->format('d-m-Y H:i:s');

$sql= "INSERT INTO user_task( taskDate,Assign_to,Subject,Priority,DueDate,Note,Assign_from,createDate,statusID,userID)
      VALUES ('$date','$assignTo','$task','$priority','$dueDate','$note','$assignFrom','$createDate','$statusID','$user_id')";

$result=$conn->query($sql);

header("location: ../page.php?user=new_task");
