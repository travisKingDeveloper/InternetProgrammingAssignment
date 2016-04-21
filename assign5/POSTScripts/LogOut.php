<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 5:08 PM
 */
include './../Controller/LoginManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';

session_start();
session_unset();
session_destroy();
ob_start();
header("location:./../Views/Login.php");
ob_end_flush();
exit();
