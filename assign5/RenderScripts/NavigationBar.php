<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 11:16 AM
 */

function NavigationBar($active)
{
    session_start();

    echo "<ul id=\"landingPageNavigation\">";

    if($active == 1)
    {
        echo "<li><a class=\"active\" href=\"MyPortfolio.php\">My Portfolio</a></li>";
    }
    else
    {
        echo "<li><a href=\"MyPortfolio.php\">My Portfolio</a></li>";
    }

    if($active == 2)
    {
        echo "<li><a class='active' href=\"AddStock.php\">Add Stock</a></li>";
    }
    else
    {
        echo "<li><a href=\"AddStock.php\">Add Stock</a></li>";
    }

    echo "<li class=\"floatRight\"><a href=\" ../POSTScripts/LogOut.php\">Log Out</a></li>";

    if($active == 3)
    {
        echo "<li class=\"floatRight\"><a class='active' href=\"MyProfile.php\">Welcome ".$_SESSION['username']." </a></li>";
    }
    else
    {
        echo "<li class=\"floatRight\"><a href=\"MyProfile.php\">Welcome ".$_SESSION['username']." </a></li>";
    }

    echo "</ul>";
}
