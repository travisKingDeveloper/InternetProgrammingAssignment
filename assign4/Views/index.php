<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 6:05 PM
 */

include './../../Global/RenderScripts/MasterNavigationBar.php';

?>
<!DOCTYPE html>
<html id="section">
<head>
    <link rel="stylesheet" type="text/css" href="../../Global/StyleSheets/style.css">
    <script src="../ticTacToeControl.js"></script>
    <title>Statistical Information</title>
    <meta charset="utf-8"/>
    <script type="text/javascript">
        //src ticTacToeControl.js
        window.onload = drawFace;

        function resetTicTacToe()
        {
            var elements = document.getElementsByClassName("estimation");

            for(var i =0; i < elements.length; i++)
            {
                elements[i].style.visibility = "visible";
            }

            var canvas = document.getElementById("myCanvas");
            var ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.beginPath();

            drawFace();
        }
    </script>

</head>
<body>

<?php MasterNavigationBar(5);?>
<!--<ul class="SideBar">-->
<!--    <li><a href="../../HomePage/Views/index.html">Home</a></li>-->
<!--    <li><a href="index.html">About Me</a></li>-->
<!--    <li><a href="index.html">Contact Me</a></li>-->
<!--    <li><a href="index.html">Statistics</a></li>-->
<!--    <li><a class="active" href="index.html">Graphics</a></li>-->
<!--    <li><a href="Login.php">Stock Portfolio</a></li>-->
<!--</ul>-->
<div id="paragraph">
    <h1>COP 4813: Internet Programming</h1>
    <h2>ePortfolio for COP4813: Internet Programming</h2>
    <h3>Travis Allen King</h3>

    <hr/>
    <table>
        <tr>
            <td>
                <h1>
                    Tic Tac Toe For Dummies
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <canvas id="myCanvas" width="350" height="350"
                        style="border:1px solid #00d35c;">
                    Your browser does not support the canvas element.
                </canvas>
            </td>
            <td>
                <p style="max-width: 350px;">
                    I purpose that if there is a perfect strategy implemented in tic tac toe there is no way two people
                    can win.
                    I have created an algorithm that will perfectly predict how to prevent you from making a victory in
                    the game. So I'll prove to you how to make sure you never lose again in Tic Tac Toe for Dummies !
                </p>
                <iframe src="../../Assets/dummyPic.jpg" width="400" height="340" frameborder="0"></iframe>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="estimation" id="11">
                <input type="button" onclick="drawInQuadrant(1 ,1);" value="Draw X in the upper left hand corner"/>
            </td>
            <td class="estimation" id="21">
                <input type="button" onclick="drawInQuadrant(2 ,1)" value="Draw X in the middle of the upper row"/>
            </td>
            <td class="estimation" id="31">
                <input type="button" onclick="drawInQuadrant(3 ,1)" value="Draw X in the upper right hand corner"/>
            </td>
        </tr>
        <tr>
            <td class="estimation" id="12">
                <input type="button" onclick="drawInQuadrant(1 ,2)" value="Draw X in the middle left area"/>
            </td>
            <td class="estimation" id="22">
                <input type="button" onclick="drawInQuadrant(2, 2)" value="Draw X in the center"/>
            </td>
            <td class="estimation" id="32">
                <input type="button" onclick="drawInQuadrant(3 , 2)" value="Draw X in the middle right area"/>
            </td>
        </tr>
        <tr>
            <td class="estimation" id="13">
                <input type="button" onclick="drawInQuadrant(1 ,3)" value="Draw X in the lower left hand corner"/>
            </td>
            <td class="estimation" id="23">
                <input type="button" onclick="drawInQuadrant(2 ,3)" value="Draw X in the middle of the lower row"/>
            </td>
            <td class="estimation" id="33">
                <input type="button" onclick="drawInQuadrant(3, 3)" value="Draw X in the lower right hand corner"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" onclick="resetTicTacToe()" value="Reset"/>
            </td>
        </tr>
    </table>

    <hr/>
    <div id="footer">
        <p><font color="Green">"I believe that at the end of the century the use of words and general educated opinion
                will have altered so much that one will be able to speak of machines thinking without expecting to be
                contradicted" - Alan Turing</font>
        <p>
    </div>
</div>
</body>
</html>
