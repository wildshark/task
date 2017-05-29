<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 28-May-17
 * Time: 8:42 PM
 */
session_start();
$page=$_GET['user'];
//echo $_SESSION['username'];
if (empty($_SESSION['username'])){

    include_once "config/config.php";
    session_destroy();
    include_once "templates/login.php";
}else{
    switch ($page){

        case "dashboard";
            include_once "config/config.php";
            include_once "modules/messager.php";
            include_once "templates/dashboard.php";
        break;

        case "profile";
            include_once "config/config.php";
            include_once "modules/messager.php";

            include_once "templates/profile.php";
            break;

        case "new_task";
            include_once "config/config.php";
            include_once "modules/messager.php";
            include_once "templates/newtask.php";
        break;

        case "all_task";
            include_once "config/config.php";
            include_once "modules/messager.php";

            $pageTitle="Task";
            include_once "templates/table.php";

        break;

        case "achieved_task";
            include_once "config/config.php";
            include_once "modules/messager.php";

            $pageTitle="Achieved Task";
            include_once "templates/table.php";

        break;

        case "pending_task";
            include_once "config/config.php";
            include_once "modules/messager.php";

            $pageTitle="Pending Task";
            include_once "templates/table.php";
        break;

        case "login";
            include_once "config/config.php";
            session_destroy();
            include_once "templates/login.php";
            break;

        default:
            include_once "config/config.php";
            include_once "modules/messager.php";
            include_once "templates/error-404.php";
            break;
    }
}




