<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 11:53 AM
 */

function MasterNavigationBar($active)
{
    echo "<ul class=\"SideBar\">";

    if($active == 1)
    {
        echo "<li><a class='active' href=\"../../HomePage/Views/index.php\">Home</a></li>";
    }
    else
    {
        echo "<li><a href=\"../../HomePage/Views/index.php\">Home</a></li>";
    }

    if($active == 2)
    {
        echo "<li><a class='active' href=\"./../../assign1/Views/index.php\">About Me</a></li>";
    }
    else
    {
        echo "<li><a href=\"./../../assign1/Views/index.php\">About Me</a></li>";
    }

    if($active == 3)
    {
        echo "<li><a class='active' href=\"./../../assign2/Views/index.php\">Contact Me</a></li>";
    }
    else
    {
        echo "<li><a href=\"./../../assign2/Views/index.php\">Contact Me</a></li>";
    }

    if($active == 4)
    {
        echo "<li><a class=\"active\" href=\"./../../assign3/Views/index.php\">Statistics</a></li>";
    }
    else
    {
        echo "<li><a href=\"./../../assign3/Views/index.php\">Statistics</a></li>";
    }

    if($active == 5)
    {
        echo "<li><a class='active' href=\"./../../assign4/Views/index.php\">Graphics</a></li>";
    }
    else
    {
        echo "<li><a href=\"./../../assign4/Views/index.php\">Graphics</a></li>";
    }

    if($active == 6)
    {
        echo "<li><a class='active' href=\"./../../assign5/Views/Login.php\">Stock Portfolio</a></li>";
    }
    else
    {
        echo "<li><a href=\"./../../assign5/Views/Login.php\">Stock Portfolio</a></li>";
    }

    echo "</ul>";
}