<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 4:20 PM
 */

function Login($user , $password)
{
    return VerifiyUserTextFile($user , $password);
}

function Logout()
{
    session_start();
    session_unset();
    session_destroy();
    ob_start();
    header("location:Login.php");
    ob_end_flush();
    //include 'home.php';
    exit();
}

function CheckUserStatus()
{
    session_start();
    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true))
    {
        $_SESSION['error'] = "Please Log In";
        return false;
    }

    return true;
}

function VerifiyUserTextFile($user , $password)
{
    session_start();

    $myfile = fopen("./../login.txt", "r") or die("Unable to open file!");

    $prospectiveUser = "";
    // Output one line until end-of-file
    while(!feof($myfile))
    {
        if($prospectiveUser == "")
        {
            $prospectiveUser = fgets($myfile);

            if(substr_count($prospectiveUser , "//")> 0)
                $prospectiveUser = "";
            else
            {
                $data = str_getcsv($prospectiveUser);

                if($data[0] == $user && $data[1] == $password)
                {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $user;

                    return true;
                }
            }
        }
    }
    return false;
}