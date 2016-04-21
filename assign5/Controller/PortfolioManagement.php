<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/19/2016
 * Time: 7:52 AM
 */

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\HttpClient;
use Scheb\YahooFinanceApi\Exception\ApiException;
use Scheb\YahooFinanceApi\Exception\HttpException;

include './../../YahooFinanceAPI/HttpClient.php';
include './../../YahooFinanceAPI/ApiClient.php';
include './../../YahooFinanceAPI/Exception/ApiException.php';
include './../../YahooFinanceAPI/Exception/HttpException.php';

function AddStock($StockTick, $NumberStock)
{
    AddStockDatabase($StockTick, $NumberStock);
    return true;
}

function PrintTable()
{
    PrintTableDatabase();
}

function PrintTableDatabase()
{
    $conn = GetDatabase();
    session_start();

    $createUserVariable = "SET @UserId = ".$_SESSION['userID'];
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
      P.id = SPTU.stockId AND SPTU.userId = @UserId ORDER BY T.lastTradePrice DESC";


    $res = $conn->query($createUserVariable);
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
}

function PrintTableEntry($stockSymbol , $numberOfStock , $value)
{
        echo'<form action="./../Views/UpdateStock.php" method="post">';

            echo '<table>';

                echo '<tr>';

                    echo '<td>';

                        echo '<h3>You own '.strval($numberOfStock).' shares of <text name="StockSymbol">'.$stockSymbol.'</text> valued at '.strval($value).' at '.
                            strval($value / $numberOfStock).' a share '.'</h3>';

                    echo '</td>';

                echo '</tr>';

                echo '<tr>';

                    echo '<td>';

                        echo '<input class="BackGroundLess Rounded" type="submit" value="Change This" />';
                        echo '<input name="stockSymbol" type="hidden" value="'.$stockSymbol.'"/>';

                    echo '</td>';

                echo '</tr>';

            echo '</table>';

        echo'</form>';
}

function PrintTableTotalValue($value)
{
        echo '<table>';
            echo '<tr>';
                echo '<td>';
                    echo '<h3>';
                     echo 'The total value of your assets is '.strval($value);
                    echo '</h3>';
                echo '</td>';
            echo '</tr>';
        echo '</table>';
}

function retrieveNumberOfStock($userId , $tick)
{
    $conn = GetDatabase();
    $SQL = "SELECT
  stockAmount
FROM stock_portfolio_to_user INNER  JOIN stock_portfolio ON stock_portfolio_to_user.stockId = stock_portfolio.id
  WHERE userId = ".$userId."
    AND stockTickIdentifier = '".$tick."';";
    $res = $conn->query($SQL);
    $row = $res->fetch_all();
    return $row[0][0];
}

function AddStockDatabase($StockTick, $NumberStock)
{
    $client = new ApiClient();
    session_start();
    try
    {
        $response = $client->getQuotesList(array($StockTick));
    }
    catch(ApiException $ex)
    {
        echo 'error could\'t get quote list';
    }

    $Symbol = $response['query']['results']['quote']['Symbol'];
    $LastTradePriceOnly = $response['query']['results']['quote']['LastTradePriceOnly'];

    $LastTradeDate = $response['query']['results']['quote']['LastTradeDate'];
    $LastTradeTime = $response['query']['results']['quote']['LastTradeTime'];
    $LastTradeDateTime = new DateTime($LastTradeDate.$LastTradeTime);

    $Change = $response['query']['results']['quote']['Change'];
    $Open = $response['query']['results']['quote']['Open'];
    $DaysHigh = $response['query']['results']['quote']['DaysHigh'];
    $DaysLow = $response['query']['results']['quote']['DaysLow'];
    $Volume = $response['query']['results']['quote']['Volume'];

    $conn = GetDatabase();

    $GetStockPortfolioID
        = "SELECT
      id
    FROM
      stock_portfolio
    WHERE
      stock_portfolio.stockTickIdentifier = '".$Symbol."'";

    $res = $conn->query($GetStockPortfolioID);
    $row = $res->fetch_all();
    $StockId = $row[0][0];
    $formattedDate = $LastTradeDateTime->format('Y-m-d H:m:s');
    $InsertTransaction
        = "INSERT INTO stock_transaction (transactionDate , lastTradePrice, Volume, `change`, stockPortfolioID) VALUES ('".
        $formattedDate."','".$LastTradePriceOnly."','".$Volume."','".$Change."','".$StockId."')";

    $res = $conn->query($InsertTransaction);

    $InsertDay
        = "INSERT INTO stock_day (stock_portfolio_id, dayHigh, dayLow, volume) VALUES (".$StockId.",".$DaysHigh.",".$DaysLow.",".$Volume.');';

    $res = $conn->query($InsertDay);


    $InsertCorrelation = "INSERT INTO stock_portfolio_to_user (userId, stockId, stockAmount) VALUES"
                            ."(".$_SESSION['userID'].",".$StockId.",".$NumberStock.");";

    $conn->query($InsertCorrelation);

}

//Deprecated
function AddStockFile($Stock, $DollarPerShare, $NumberOfShares)
{
    $myfile = fopen("./../../TestPortfolio", "a") or die("Unable to open file!");

    fwrite($myfile, $Stock.'|'.$DollarPerShare.'|'.$NumberOfShares.'|'.strval(number_format(floatval($DollarPerShare) * intval($NumberOfShares), 2)."\n"));
}

function PrintTableFile()
{
    $myfile = fopen("./../../TestPortfolio", "r") or die("Unable to open file!");
    $data = array("Stock Tick Identifier" , "Individual Stock Value" , "Number Of Stock" , "Portfolio Value");
    echo "<h2>"."Portfolios"."</h2>";
    echo "<td>".$data[0]."</td>"."<td>".$data[1]."</td>"."<td>".$data[2]."</td>"."<td>".$data[3]."</td>";

    // Output one line until end-of-file
    $totalWorth = 0.0;
    while(!feof($myfile))
    {
        $ProspectData = (fgets($myfile));

        if(substr_count($ProspectData, "//") == 0)
        {
            $data = str_getcsv($ProspectData, "|");
            echo "<tr>"."<td>".$data[0]."</td>"."<td>".$data[1]."</td>"."<td>".$data[2]."</td>"."<td>".$data[3]."</td>"."</tr>";
            $totalWorth += floatval(str_replace(",", "",$data[3]));
        }
    }
    echo "<tr>"."<td>"."Total Worth"."</td>"."<td></td><td></td>"."<td>".number_format($totalWorth, 2)."</td>"."</tr>";
    fclose($myfile);
}

function GetDummy()
{
    return "<form action=\"./../Views/UpdateStock.php\" method=\"post\"><table><tr><td><h3>You own 31 shares of <text name=\"StockSymbol\">AOSL</text> valued at 378.82 at 12.22 a share </h3></td></tr><tr><td><input class=\"BackGroundLess Rounded\" type=\"submit\" value=\"Change This\" /><input name=\"stockSymbol\" type=\"hidden\" value=\"AOSL\"/></td></tr></table></form><form action=\"./../Views/UpdateStock.php\" method=\"post\"><table><tr><td><h3>You own 12 shares of <text name=\"StockSymbol\">ASYS</text> valued at 75.96 at 6.33 a share </h3></td></tr><tr><td><input class=\"BackGroundLess Rounded\" type=\"submit\" value=\"Change This\" /><input name=\"stockSymbol\" type=\"hidden\" value=\"ASYS\"/></td></tr></table></form><form action=\"./../Views/UpdateStock.php\" method=\"post\"><table><tr><td><h3>You own 10 shares of <text name=\"StockSymbol\">MSFT</text> valued at 556.5 at 55.65 a share </h3></td></tr><tr><td><input class=\"BackGroundLess Rounded\" type=\"submit\" value=\"Change This\" /><input name=\"stockSymbol\" type=\"hidden\" value=\"MSFT\"/></td></tr></table></form><form action=\"./../Views/UpdateStock.php\" method=\"post\"><table><tr><td><h3>You own 12 shares of <text name=\"StockSymbol\">POOL</text> valued at 1086.84 at 90.57 a share </h3></td></tr><tr><td><input class=\"BackGroundLess Rounded\" type=\"submit\" value=\"Change This\" /><input name=\"stockSymbol\" type=\"hidden\" value=\"POOL\"/></td></tr></table></form><form action=\"./../Views/UpdateStock.php\" method=\"post\"><table><tr><td><h3>You own 189 shares of <text name=\"StockSymbol\">TFSC</text> valued at 1869.21 at 9.89 a share </h3></td></tr><tr><td><input class=\"BackGroundLess Rounded\" type=\"submit\" value=\"Change This\" /><input name=\"stockSymbol\" type=\"hidden\" value=\"TFSC\"/></td></tr></table></form><form action=\"./../Views/UpdateStock.php\" method=\"post\"><table><tr><td><h3>You own 22 shares of <text name=\"StockSymbol\">UHAL</text> valued at 7446.78 at 338.49 a share </h3></td></tr><tr><td><input class=\"BackGroundLess Rounded\" type=\"submit\" value=\"Change This\" /><input name=\"stockSymbol\" type=\"hidden\" value=\"UHAL\"/></td></tr></table></form><form action=\"./../Views/UpdateStock.php\" method=\"post\"><table><tr><td><h3>You own 12 shares of <text name=\"StockSymbol\">YHOO</text> valued at 438.48 at 36.54 a share </h3></td></tr><tr><td><input class=\"BackGroundLess Rounded\" type=\"submit\" value=\"Change This\" /><input name=\"stockSymbol\" type=\"hidden\" value=\"YHOO\"/></td></tr></table></form><table><tr><td><h3>The total value of your assets is 11852.59</h3></td></tr></table>";
}