<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/10/2016
 * Time: 1:26 PM
 */

include './../Controller/LoginManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';
include './../Controller/PortfolioManagement.php';
include './../RenderScripts/NavigationBar.php';
include './../../Global/RenderScripts/MasterNavigationBar.php';

if (!CheckUserStatus())
{
    $_SESSION['error'] = "Please Log In";
    header( "Location: ./Login.php" );
}
else if($_SERVER["REQUEST_METHOD"] != "POST")
{
    header( "Location: ./MyPortfolio.php");
}
else
{
    session_start();
    $stockSymbol = $_POST['stockSymbol'];

    $numberOfStock = retrieveNumberOfStock($_SESSION['userID'] ,$stockSymbol);
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

    <h1><?php echo $stockSymbol ?></h1>
    <table id="mainUpdateSpace">
        <tr>
            <td id="UpdateStockTableInfo">

                <form class="centerForm" method="post" action="./../POSTScripts/UpdateStock.php">
                    <table>
                        <tr>
                            <td >
                                <h3>You Own <?php echo $numberOfStock ?> shares of this stock:</h3>
                                <?php echo '<input name="currentAmount" type="hidden" value="'.strval($numberOfStock).'"/>';?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                I want to
                                <select name="changeMade" class="BackGroundLess">
                                    <option value="add">Add</option>
                                    <option value="saab">Subtract</option>
                                </select>

                                <?php echo '<input name="stockSymbol" type="hidden" value="'.$stockSymbol.'"/>';?>

                                <input required type="number" name="changeNumber" class="BackGroundLess" value="10" style="width:80px;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Make Change" class="BackGroundLess"/>
                            </td>
                        </tr>
                    </table>

                </form>

            </td>
            <td id="UpdateStockTableInfo">

                <form class="centerForm" action="../POSTScripts/DeleteStock.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <h3>Delete this stock?</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" class="BackGroundLess" placeholder="Type your password to confirm" style="width:200px"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo '<input name="stockSymbol" type="hidden" value="'.$stockSymbol.'"/>';?>
                                <input value="Delete Stock" class="BackGroundLess" type="submit"/>
                            </td>
                        </tr>
                    </table>
                    <br/>


                </form>

            </td>
        </tr>
    </table>


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
</html>

