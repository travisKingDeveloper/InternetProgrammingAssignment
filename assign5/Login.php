<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 3/16/2016
 * Time: 12:40 PM
 */

//http://stackoverflow.com/questions/1545357/how-to-check-if-a-user-is-logged-in-in-php
include 'LoginManagement.php';

session_start();

if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true))
{
    header( "Location: ./LandingPage.php" );
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // collect value of input field
    $name = $_REQUEST['UserName'];
    $password = $_REQUEST['Password'];

    if(ConfirmManagement($name, $password))
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;

        //Redirect to landing page
        header( "Location: ./LandingPage.php" );
    }
    else
    {
        global $errorMessage;
        $_SESSION['error'] = "Login Not Valid, please try a different User Name and Password";
    }
}
?>

<!DOCTYPE html>
<html id="section">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css"/>
    <link rel="stylesheet" type="text/css" href="StockInformation.css"/>
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
        <li><a class="active" href="../assign5/Login.php">Stock Portfolio</a></li>
    </ul>
    <div id="paragraph">
        <h1>COP 4813: Internet Programming</h1>
        <h2>ePortfolio for COP4813: Internet Programming</h2>
        <h3>Travis Allen King</h3>

        <form id="loginBackgroundPage" method="post" action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']));?>">
                <div id="loginCenterPage">
                    <h3>Stock Portfolio Manager Login</h3>
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