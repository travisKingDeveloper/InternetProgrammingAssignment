/**
 * Created by Travis on 3/6/2016.
 */
var current;

function drawFace()
{
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    ctx.strokeStyle = "#D36364";

//This is the lines across
    ctx.moveTo(25,125);
    ctx.lineTo(325,125);
    ctx.stroke();

    ctx.moveTo(25,225);
    ctx.lineTo(325,225);
    ctx.stroke();

//This is the lines down
    ctx.moveTo(125, 25);
    ctx.lineTo(125, 325);
    ctx.stroke();

    ctx.moveTo(225, 25);
    ctx.lineTo(225, 325);
    ctx.stroke();

    current = new Array(3);
    for(var i =0; i < 3; i++)
    {
        current[i] = new Array(3);
    }

    for(var i =0; i < 3; i++)
    {
        for(var j =0; j < 3; j++)
        {
            current[i][j] = -1;
        }
    }
}

function drawX(startX, startY, length)
{
    //The start position creates a grid almost inside of a grid and the length dictates the square that the x and
    //y plane represent. The x will go fill the box
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    ctx.strokeStyle = "#D36364";

    ctx.moveTo(startX, startY);
    ctx.lineTo(startX + length, startY + length);
    ctx.stroke();

    ctx.moveTo(startX + length, startY);
    ctx.lineTo(startX, startY + length);
    ctx.stroke();

}

function drawInQuadrant(row , column)
{
    //This works as follows. The row indicates the row that the x should be drawn in and the column is the column
    //I wrote it out by hand where the x should be in a 5 px border
    drawX( 30 + (100 * (row - 1)) , 30 + (100 * (column - 1)) , 90);
    var hideElement = document.getElementById(row.toString() + column.toString());
    hideElement.style.visibility = "hidden";

    //set the corresponding bit to true in double array
    current[row - 1][column - 1] = 1;

    //set the corresponding O to an O and hide that button
    calculateO(row, column)
}
function calculateO(row, column)
{
    row--;
    column--;
    if(row == 1 && column == 1)
    {
        //Middle case
        for(var i =0; i < 3; i++)
        {
            for(var j = 0; j < 3; j++)
            {
                if( i == j && i == 1)
                    continue;

                if(current[i][j] = 1)
                {
                    //This says is it in the outside middle
                    if( i - j == 1 | i - j == -1)
                    {
                        //It Doesn't check if there is a victory because there never will be one
                        if( i == 0)
                        {
                            drawOInQuadrant(2 ,1);
                            return;
                        }
                        else if( i == 2)
                        {
                            drawOInQuadrant(0 , 1);
                            return;
                        }
                        else if( j == 2)
                        {
                            drawOInQuadrant(1 , 0);
                            return;
                        }
                        else if( j == 0)
                        {
                            drawOInQuadrant(1 ,2);
                            return;
                        }
                    }
                    else
                    {
                        if( i == j)
                        {
                            if(i == 0)
                            {
                                drawOInQuadrant(2,2);
                                return;
                            }
                            else
                            {
                                drawOInQuadrant(0 , 0);
                                return;
                            }
                        }
                        else
                        {
                            if( i == 2)
                            {
                                drawOInQuadrant(0 , 2);
                                return;
                            }
                            else
                            {
                                drawOInQuadrant(2 , 0);
                                return;
                            }
                        }
                    }
                }
            }
        }
    }
    else if( row - column == 1 | row - column == -1)
    {
        //Outside parts in the cross

    }
    else
    {
        //The outside edges

    }
}
function drawOInQuadrant(row , column)
{
    row++;
    column++;
    drawO( 30 + (100 * (row - 1)) , 30 + (100 * (column - 1)) , 45);

    var hideElement = document.getElementById(row.toString() + column.toString());
    hideElement.style.visibility = "hidden";
}

function drawO(startX, startY, radius)
{
    //The start position creates a grid almost inside of a grid and the length dictates the square that the x and
    //y plane represent. The x will go fill the box
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    ctx.strokeStyle = "D32BD0";
    ctx.strokeWidth = 1;

    ctx.beginPath();
    ctx.arc(startX + radius, startY + radius, radius, 0, 2 * Math.PI, false);
    ctx.stroke();

}
