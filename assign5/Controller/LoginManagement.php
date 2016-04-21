<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 4:20 PM
 */

function VerifyUser($user , $password)
{
    $isValid = VerifyUserStoredProcedure($user, $password);
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
    $conn = GetDatabase();
    $sql = "CALL verifyUser('".$username."' , '".$password."', @msg);";
    $conn->query($sql);
    $res = $conn->query("SELECT @msg AS RESPONSE");
    $row = $res->fetch_assoc();
    $conn->close();

    return $row['RESPONSE'];
}

function AddUserStoredProcedure($username , $password)
{
    $conn = GetDatabase();
    $sql = "CALL addUser('".$username."' , '".$password."', @msg);";
    $conn->query($sql);
    $res = $conn->query("SELECT @msg AS RESPONSE");
    $row = $res->fetch_assoc();
    $conn->close();

    return $row['RESPONSE'];
}

function AddUser($username , $password)
{
    AddUserStoredProcedure($username, $password);
    $userId = VerifyUser($username , $password);
    if($userId !=0)
    {
        return $userId;
    }
    else
    {
        return 0;
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
