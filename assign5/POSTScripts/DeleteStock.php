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

$SQLDelete = 'DELETE FROM stock_portfolio_to_user WHERE userId = '.$_SESSION['userID']." AND stockId = ".strval($stockId).";";

$res = $conn->query($SQLDelete);

header("Location: ../Views/MyPortfolio.php");

