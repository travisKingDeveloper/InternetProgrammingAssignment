<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 12:43 PM
 */
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
    <script src="../../statistics.js"></script>
    <title>Statistical Information</title>
    <meta charset="utf-8"/>

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
    <div id="PortfolioCenterTable">
        <table >
            <div class="error">
                <?php
                if(isset($_SESSION['error']))
                {
                    echo $_SESSION['error'];
                    $_SESSION['error'] = null;
                }
                ?>
            </div>
            <?php PrintTableFile();?>
        </table>
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
</html>
