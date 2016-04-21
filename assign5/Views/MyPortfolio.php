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
<?php MasterNavigationBar(6);?>

<div id="paragraph">

    <h1>COP 4813: Internet Programming</h1>
    <h2>ePortfolio for COP4813: Internet Programming</h2>
    <h3>Travis Allen King</h3>
    <hr/>

    <?php NavigationBar(1); ?>

    <h1>My Portfolios</h1>
    <hr/>
    <table align="center">
        <tr>
            <td>
                Order Table By:
            </td>
        </tr>
        <tr>
            <td>
                <select id="ddListUpdateTable" name="users" onchange="updateTable(this.value)">
                    <option value="1">Alphabetically</option>
                    <option value="0">Reverse Alphabetically</option>
                    <option value="2">Greatest Value Per Share</option>
                    <option value="3">Smallest Value Per Share</option>
                </select>
            </td>
        </tr>
    </table>
    <hr/>
    <div id="PortfolioCenterTable">
        <div id="PortfolioTable">
        </div>
    </div>

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
    function updateTable(str)
    {
        $.get("http://45.55.228.243/assign5/AJAXScripts/GetTableRow.php?q="+str, function(data , status)
        {
            document.getElementById("PortfolioTable").innerHTML = data;
        });
    }

    $(document).ready(function(){updateTable("1")})
</script>
</html>
