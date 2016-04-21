<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/16/2016
 * Time: 1:31 PM
 */

include './../Controller/PortfolioManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';

//File used to dynamically create the ajax call used by the website
session_start();
$conn = GetDatabase();

$displayType = $_REQUEST["q"];

//Create the order by statement
$OrderBy = "";

if($displayType == 0)
{
    $OrderBy = "ORDER BY
      P.stockTickIdentifier DESC";
}
else if ($displayType == 1)
{
    $OrderBy = "ORDER BY
      P.stockTickIdentifier";
}
else if ($displayType == 2)
{
    $OrderBy = "ORDER BY
      T.lastTradePrice DESC";
}
else if($displayType == 3)
{
    $OrderBy = "ORDER BY T.lastTradePrice";
}

//$createUserVariable = "  SET @UserId = ".strval($_SESSION['userID']);
$createUserVariable = "Set @UserId = 1";

$query = "SELECT
    T.transactionDate as TDate, P.stockTickIdentifier as StockTick, T.lastTradePrice as StockPrice, SPTU.stockAmount as NumberOfStock
  FROM
    stock_transaction as T
    INNER JOIN
      (
        SELECT
          MAX(T.transactionDate) AS GreatestDate, t.stockPortfolioID
        FROM
          stock_transaction as T
        GROUP BY
          T.stockPortfolioID
      ) MS
    ON T.transactionDate = MS.GreatestDate AND T.stockPortfolioID = MS.stockPortfolioID
    INNER JOIN
      stock_portfolio AS P
    ON
      T.stockPortfolioID = P.id
    INNER JOIN
      stock_portfolio_to_user AS SPTU
    ON
      P.id = SPTU.stockId AND SPTU.userId = @UserId ".$OrderBy;

$res = $conn->query($createUserVariable);

if(!$res)
{
    $x = 'error ahhhh';
}

$res = $conn->query($query);

$totalValue = 0.0;

while($rowEntry = $res->fetch_assoc())
{
    $date = $rowEntry['TDate'];
    $tick = $rowEntry['StockTick'];
    $price = $rowEntry['StockPrice'];
    $numStock = $rowEntry['NumberOfStock'];
    $stockValue = $numStock * $price;
    $totalValue += $stockValue;


    PrintTableEntry($tick , intval($numStock) , $stockValue);
}

$conn->close();
PrintTableTotalValue($totalValue);
