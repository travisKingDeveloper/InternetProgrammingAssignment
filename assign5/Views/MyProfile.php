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
    header( "Location: ./Login.php");
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

    <?php NavigationBar(3);?>

    <div id="myProfileCenterPage">
        <form action="../POSTScripts/UpdateProfile.php" method="post">
            <div id="myProfileTableInformation">
                <h2>Edit Profile</h2>
            </div>

            <table>
                <tr>
                    <td>
                        User Name:
                    </td>
                    <td>
                        <input type="text" name="UserName" required value="<?php echo $_SESSION['username']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="email" name="Email" value="<?php echo $_SESSION['email']?>"required />
                    </td>
                </tr>
            </table>

            <input id="myProfileTableInformation" type="submit" value="Make Changes"/>
        </form>
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