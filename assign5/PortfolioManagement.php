<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/19/2016
 * Time: 7:52 AM
 */

//The purpose of this file is to control the changes made in Profile Changes

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\HttpClient;
use Scheb\YahooFinanceApi\Exception\ApiException;
use Scheb\YahooFinanceApi\Exception\HttpException;

include './../YahooFinanceAPI/HttpClient.php';
include './../YahooFinanceAPI/ApiClient.php';
include './../YahooFinanceAPI/Exception/ApiException.php';
include './../YahooFinanceAPI/Exception/HttpException.php';

function PopulateTable()
{
    //GET INFORMATION BASED OFF OF USER

    //POPULATE A TABLE USING THIS INFORMATION
    try {
        $client = new ApiClient();

        $data = $client->getQuotesList(array("YHOO", "GOOG")); //Multiple stocks at once

        foreach ($data as $key => $value)
            echo $key . " " . $value;
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }

    echo "HAHHAA";
    echo "HAHHAA";
    //END PSUEDOCODE
}

/**
 * @param $StockTick
 * @param $NumberStock
 */
function AddStock($StockTick, $NumberStock)
{
    $_SESSION['error'] = "";
    if ($NumberStock < 0)
    {
        $_SESSION['error'] = "Please enter a correct number of stocks";
        return false;
    }
    else
    {
        $url = "http://download.finance.yahoo.com/d/quotes.csv?s=" . $StockTick . "&f=sl1d1t1c1ohgv&e=.csv";
        $open = fopen($url, "r");

        if($open == false)
        {
            $_SESSION['error'] = "Stock Tick Information Incorrect Please Try Again\nThis is the url".$url;
            return false;
        }
        else
        {
            while (!feof($open))
            {
                $data = str_getcsv(fgets($open));

                if($data[1] == "N/A")
                {
                    $_SESSION['error'] = "Stock Tick Information Incorrect Please Try Again";
                    return false;
                }

                AddStockFile($StockTick , $data[1] , $NumberStock);

                return true;
            }
        }
    }
}
function AddStockFile($Stock, $DollarPerShare, $NumberOfShares)
{
    $myfile = fopen("./../TestPortfolio", "a") or die("Unable to open file!");

    fwrite($myfile, $Stock.'|'.$DollarPerShare.'|'.$NumberOfShares.'|'.strval(number_format(floatval($DollarPerShare) * intval($NumberOfShares), 2)."\n"));
}
function PrintTable()
{
    $myfile = fopen("./../TestPortfolio", "r") or die("Unable to open file!");

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