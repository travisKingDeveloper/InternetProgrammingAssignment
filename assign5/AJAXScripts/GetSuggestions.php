<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/15/2016
 * Time: 6:17 PM
 */

include './../../Global/DatabaseConnection/DatabaseConnection.php';

$conn = GetDatabase();

$InsertSQL = "SELECT stockTickIdentifier FROM stock_portfolio;";
$res = $conn->query($InsertSQL);

$stockIdentifiers = $res->fetch_all();

$conn->close();

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    $counter = 0;
    foreach($stockIdentifiers as $name) {
        if (stristr($q, substr($name[0], 0, $len))) {
            if ($hint === "") {
                $hint = $name[0];
            } else {
                $hint .= ", $name[0]";
            }
            $counter++;
        }
        if($counter == 3) break;
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No suggestions!" : $hint;