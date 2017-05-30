<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-May-17
 * Time: 10:13 AM
 */

$msgID=$_GET['msg'];
include_once "../db/db.php";

    $sql="UPDATE `messager` SET `readID`='2' WHERE (`messageID`='$msgID') LIMIT 1";
    $msgResult=$conn->query($sql);

// Go Back Browse History
header('Location: ' . $_SERVER['HTTP_REFERER']);
