<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/6/2016
 * Time: 1:44 PM
 */
include './../Controller/PortfolioManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';


// collect value of input field
$StockTick = $_REQUEST['StockTickerIdentifier'];
$NumberStock = intval($_REQUEST['NumberOfStock']);

if(!AddStock($StockTick,$NumberStock))
{
    $_SESSION['error'] = "Error Stock Not Properly Added";
}
header("Location: ../Views/MyPortfolio.php");
