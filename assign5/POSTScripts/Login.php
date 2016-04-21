<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 12:05 PM
 */

include './../Controller/LoginManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';


// collect value of input field
$name = $_POST['UserName'];
$password = $_POST['Password'];

session_start();

$userId = VerifyUser($name, $password);

if($userId != 0)
{
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $name;
    $_SESSION['userID'] = $userId;
    //Redirect to landing page
    header( "Location: ./../Views/MyPortfolio.php");///Views/MyPortfolio.php" );
}
else
{
    global $errorMessage;
    $_SESSION['error'] = "Login Not Valid, please try a different User Name and Password";
    header( "Location: ./../Views/Login.php" );
}
