<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 11:37 AM
 */
//http://stackoverflow.com/questions/1545357/how-to-check-if-a-user-is-logged-in-in-php
include './../Controller/LoginManagement.php';
include './../../Global/DatabaseConnection/DatabaseConnection.php';
include './../RenderScripts/NavigationBarUnAuthorized.php';
include './../../Global/RenderScripts/MasterNavigationBar.php';
?>

<!DOCTYPE html>
<html id="section">
<head>
    <link rel="stylesheet" type="text/css" href="../StockInformation.css"/>
    <link rel="stylesheet" type="text/css" href="../../Global/StyleSheets/style.css"/>
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

        <?php NavigationBar(2); ?>

<form id="loginBackgroundPage" method="post" action="./../POSTScripts/Register.php">
    <div id="loginCenterPage">
        <h3>Register New User</h3>
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
                Name:
            </td>
            <td>
                <input required class="loginInput" type="text" name="UserName"/>
            </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input required class="loginInput" type="password" name="Password"/>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input class="loginSubmit" type="submit"/>
                </td>
            </tr>
        </table>
    </div>
</form>

<div id="footer">
    <p><font color="Green">"I believe that at the end of the century the use of words and general educated opinion
            will have altered so much that one will be able to speak of machines thinking without expecting to be
            contradicted" - Alan Turing</font>
    <p>
</div>
</div>
</body>
</html>