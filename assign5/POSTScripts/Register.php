<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 12:07 PM
 */

include './../Controller/LoginManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';


// collect value of input field
$name = $_REQUEST['UserName'];
$password = $_REQUEST['Password'];
$userId = AddUser($name, $password);
session_start();
if($userId != 0)
{
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $name;
    $_SESSION['userID'] = $userId;
    //Redirect to landing page
    header( "Location: ./../Views/MyPortfolio.php" );
}
else
{
    $_SESSION['error'] = "Registering ".$name." failed, please email IT for more information";
    header( "Location: ./../Views/Login.php" );
}


