<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/19/2016
 * Time: 9:47 AM
 */
include './../../Global/DatabaseConnection/DatabaseConnection.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // collect value of input field
    $name = $_REQUEST['username'];
    $email = $_REQUEST['email'];

    $_SESSION['username'] = $name;
    $_SESSION['email'] = $email;
    //Redirect to landing page

    $_SESSION['message'] = "Successfully Changed Profile";

    header("Location: ./../Views/MyProfile.php");
}
else
{
    header("Location: ./../Views/MyProfile.php");
}