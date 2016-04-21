<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/11/2016
 * Time: 1:47 AM
 */

include './../Controller/PortfolioManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';

$conn = GetDatabase();
session_start();

$SQLGetID = "SELECT
  id
FROM
  stock_portfolio_to_user INNER JOIN stock_portfolio ON stock_portfolio_to_user.stockId = stock_portfolio.id
WHERE stock_portfolio.stockTickIdentifier = "."'".$_POST['stockSymbol']."';";

$res = $conn->query($SQLGetID);
$row = $res->fetch_all();

$stockId = $row[0][0];

$isAdd = $_POST['changeMade'] == 'add';
$number = $_POST['changeNumber'];

if(!$isAdd)
    $number = $number * -1;

$number = $_POST['currentAmount'] + $number;

$SQLUpdate = "UPDATE stock_portfolio_to_user
  SET stockAmount = ".strval($number)."
  WHERE userId = ".strval($_SESSION['userID'])."
    AND stockId = ".strval($stockId);

$res = $conn->query($SQLUpdate);

header("Location: ../Views/MyPortfolio.php");
