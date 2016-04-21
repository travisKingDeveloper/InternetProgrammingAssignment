<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 12:43 PM
 */
include './../../Global/DatabaseConnection/DatabaseConnection.php';
include './../Controller/LoginManagement.php';
include './../Controller/PortfolioManagement.php';
include './../RenderScripts/NavigationBar.php';
include './../../Global/RenderScripts/MasterNavigationBar.php';

if (!CheckUserStatus())
{
    $_SESSION['error'] = "Please Log In";
    header( "Location: ./Login.php" );
}
?>

<!DOCTYPE html>
<html id="section">
<head>
    <link rel="stylesheet" type="text/css" href="../../Global/StyleSheets/style.css">
    <link rel="stylesheet" type="text/css" href="../StockInformation.css"/>
    <title>Stock Portfolio Management</title>
    <meta charset="utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
<?php MasterNavigationBar(6)?>;

<div id="paragraph">

    <h1>COP 4813: Internet Programming</h1>
    <h2>ePortfolio for COP4813: Internet Programming</h2>
    <h3>Travis Allen King</h3>
    <hr/>

    <?php NavigationBar(2); ?>


    <h1>Add Stock</h1>
    <hr/>
    <form action="./../POSTScripts/AddStock.php" method="post">
        <div id="loginCenterPage">
            <table>
                <div class="error">
                    <?php
                    if(isset($_SESSION['error']))
                    {
                        echo $_SESSION['error'];
                        $_SESSION['error'] = null;
                    }
                    ?>
                </div>
                <td>
                    Stock Ticker Identifier
                </td>
                <td>
                    <input autocomplete="off" required class="loginInput" type="text" name="StockTickerIdentifier" onkeyup="showHint(this.value)"/>
                </td>
                </tr>
                <tr>
                    <td>
                        Number of Stock
                    </td>
                    <td>
                        <input id="numberStock" required class="loginInput" type="text" name="NumberOfStock"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><span id="txtHint"></span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="loginSubmit" type="submit" value="Add Stock"/>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <div id="footer">
        <p>
            <font color="Green">
                "I believe that at the end of the century the use of words and general educated opinion
                will have altered so much that one will be able to speak of machines thinking without expecting to be
                contradicted" - Alan Turing
            </font>
        <p>
    </div>
</div>
</body>
<script>
    function showHint(str) {

        if (str.length == 0)
        {
            document.getElementById("txtHint").innerHTML = "No suggestions";
        }
        else
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()
            {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET" ,"http://45.55.228.243/assign5/AJAXScripts/GetSuggestions.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
</html>