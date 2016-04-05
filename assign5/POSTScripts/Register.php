<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 12:07 PM
 */

include './../Controller/LoginManagement.php';

if (CheckUserStatus() && $_SERVER["REQUEST_METHOD"] == "POST")
{
    session_start();
    session_unset();
    session_destroy();
    ob_start();
    ob_end_flush();
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // collect value of input field
    $name = $_REQUEST['UserName'];
    $password = $_REQUEST['Password'];

    session_start();
    if(AddUser($name, $password))
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;
        //Redirect to landing page
        header( "Location: ./../Views/MyPortfolio.php" );
    }
    else
    {
        $_SESSION['error'] = "Registering ".$name." failed, please email IT for more information";
        header( "Location: ./../Views/Login.php" );
    }
}

