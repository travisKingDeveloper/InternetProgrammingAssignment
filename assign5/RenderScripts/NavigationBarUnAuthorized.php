<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 11:20 AM
 */

function NavigationBar($active)
{
    echo "<ul id=\"landingPageNavigation\">";

    //The order of the number is the spot reading left to right. This is reversed because of how it renders
    if($active == 2)
    {
        echo "<li class=\"floatRight \"><a class='active' href=\"../Views/Register.php\">Register</a></a></li>";
    }
    else
    {
        echo "<li class=\"floatRight\"><a href=\"../Views/Register.php\">Register</a></a></li>";
    }

    if($active == 1)
    {
        echo "<li class=\"floatRight active\"><a class='active' href=\"../Views/Login.php\">Login</a> </li>";
    }
    else
    {
        echo "<li class=\"floatRight\"><a href=\"../Views/Login.php\">Login</a> </li>";
    }

    echo "<li class=\"floatRight\"><a href=\"../Views/MyPortfolio.php\">Welcome!</a></li>";
    echo"</ul>";
}
