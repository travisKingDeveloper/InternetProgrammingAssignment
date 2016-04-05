<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 12:05 PM
 */

include './../Controller/LoginManagement.php';

if (CheckUserStatus())
{
    header( "Location: ./../Views/MyPortfolio.php" );
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // collect value of input field
    $name = $_REQUEST['UserName'];
    $password = $_REQUEST['Password'];

    session_start();
    if(VerifyUser($name, $password))
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;
        //Redirect to landing page
        header( "Location: ./../Views/MyPortfolio.php" );
    }
    else
    {
        global $errorMessage;
        $_SESSION['error'] = "Login Not Valid, please try a different User Name and Password";
        header( "Location: ./../Views/Login.php" );
    }
}