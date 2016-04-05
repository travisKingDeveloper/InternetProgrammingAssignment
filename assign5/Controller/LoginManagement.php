<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 4:20 PM
 */
include './../../Global/DatabaseConnection/DatabaseConnection.php';

function VerifyUser($user , $password)
{
    $isValid =  VerifyUserStoredProcedure($user , $password) == 1;
    return $isValid;
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

function VerifyUserStoredProcedure($username, $password)
{
    $conn = DatabaseConnection();
    $sql = "CALL verifyUser('".$username."' , '".$password."', @msg);";
    $conn->query($sql);
    $res = $conn->query("SELECT @msg AS RESPONSE");
    $row = $res->fetch_assoc();
    $conn->close();

    return $row['RESPONSE'];
}

function AddUserStoredProcedure($username , $password)
{
    $conn = DatabaseConnection();
    $sql = "CALL verifyUser('".$username."' , '".$password."', @msg);";
    $conn->query($sql);
    $res = $conn->query("SELECT @msg AS RESPONSE");
    $row = $res->fetch_assoc();
    $conn->close();

    return $row['RESPONSE'];
}

function AddUser($username , $password)
{
    $response = AddUserStoredProcedure($username, $password);

    if($response == 1)
    {
        return true;
    }
    else if(VerifyUser($username , $password))
    {
        return true;
    }
    else
    {
        return false;
    }
}

//Deprecated
function VerifyUserTextFile($user , $password)
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
