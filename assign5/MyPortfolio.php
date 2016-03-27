<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 12:43 PM
 */
include 'LoginManagement.php';
include 'PortfolioManagement.php';

if (!CheckUserStatus())
{
    $_SESSION['error'] = "Please Log In";
    header( "Location: ./Login.php" );
}
?>

<!DOCTYPE html>
<html id="section">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="StockInformation.css"/>
    <script src="../jquery-2.2.2.min.js"></script>
    <script src="../statistics.js"></script>
    <title>Statistical Information</title>
    <meta charset="utf-8"/>

</head>
<body>
<ul class="SideBar">
    <li><a href="../index.html">Home</a></li>
    <li><a href="../assign1/index.html">About Me</a></li>
    <li><a href="../assign2/index.html">Contact Me</a></li>
    <li><a href="../assign3/index.html">Statistics</a></li>
    <li><a href="../assign4/index.html">Graphics</a></li>
    <li><a class="active" href="../assign5/Login.php">Stock Portfolio</a> </li>
</ul>

<div id="paragraph">

    <h1>COP 4813: Internet Programming</h1>
    <h2>ePortfolio for COP4813: Internet Programming</h2>
    <h3>Travis Allen King</h3>
    <hr/>

    <ul id="landingPageNavigation">
        <li><a class="active" href="MyPortfolio.php">My Portfolio</a></li>
        <li><a href="AddStock.php">Add Stock</a></li>
        <li class="floatRight"><a href="LogOut.php">Log Out</a></li>
        <li class="floatRight"><a href="MyProfile.php">Welcome <?php echo $_SESSION['username'] ?></a></li>
    </ul>

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
            <?php PrintTable();?>
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
