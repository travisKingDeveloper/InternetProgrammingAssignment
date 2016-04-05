<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 6:08 PM
 */

include '../../Global/RenderScripts/MasterNavigationBar.php';

?>

<!DOCTYPE html>
<html id="section">
<head>
    <link rel="stylesheet" type="text/css" href="../../Global/StyleSheets/style.css">
    <script src="../../statistics.js"></script>
    <title>Statistical Information</title>
    <meta charset="utf-8"/>

    <script>
        function loadArray() {
            var numbersRaw = document.getElementById("numberTxtArea").value;

            var numberArray = numbersRaw.split(" ");

            return numberArray;
        }
        function getHelp() {
            alert('Enter numbers into the above text area and click Calculate in order to find out the information on the right');
        }
        function calculateNumbers() {
            var numberArray = loadArray();

            if (numberArray.length == 1)
                return;

            document.getElementById("MeanTxtBx").value = findMean(numberArray);

            document.getElementById("MedianTxtBx").value = findMedian(numberArray);

            document.getElementById("CountTxtBx").value = findNumberOfElements(numberArray);

            document.getElementById("SummationTxtBx").value = findSummation(numberArray);

            document.getElementById("ModeTxtBx").value = findMode(numberArray);

            document.getElementById("VarianceTxtBx").value = findVariance(numberArray);

            document.getElementById("StandardDeviationTxtBx").value = findStandardDeviation(numberArray);
        }
        function reset() {
            var resets = document.getElementsByClassName("textResetable");

            for (i = 0; i < resets.length; i++) {
                resets[i].value = "";
            }
        }
        function populateData(set) {
            if (set == 1) {
                document.getElementById("numberTxtArea").value = "1 1 1 1 1";
                calculateNumbers();
            }
            else if (set == 2) {
                document.getElementById("numberTxtArea").value = "600 470 170 430 300";
                calculateNumbers();
            }
            else if (set == 3) {
                document.getElementById("numberTxtArea").value = "1.5 2.5 4 2 1 1";
                calculateNumbers();
            }
            else {
                alert("error sample data not found");
            }
        }
    </script>
</head>
<body>

<?php
    MasterNavigationBar(4);
?>

<div id="paragraph">
    <h1>COP 4813: Internet Programming</h1>
    <h2>ePortfolio for COP4813: Internet Programming</h2>
    <h3>Travis Allen King</h3>
    <hr/>
    <h4>Statistical Information</h4>
    <hr/>
    <form>
        <table>
            <tr>
                <td>
                    <textarea id="numberTxtArea" rows="14" cols="50" placeholder="Enter random numbers here"></textarea>
                </td>
                <td>
                    <table class="tableDisplay">
                        <tr>
                            <td>
                                <input id="MeanTxtBx" class="textResetable" type="text" placeholder="Mean"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="MedianTxtBx" class="textResetable" type="text" placeholder="Median"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="CountTxtBx" class="textResetable" type="text" placeholder="Count"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="SummationTxtBx" class="textResetable" type="text" placeholder="Summation"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="ModeTxtBx" class="textResetable" type="text" placeholder="Mode"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="VarianceTxtBx" class="textResetable" type="text" placeholder="Variance"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="StandardDeviationTxtBx" class="textResetable" type="text"
                                       placeholder="Standard Deviation"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" onclick="getHelp()" value="Help"/>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                            </td>
                            <td class="estimation">
                                <input type="button" onclick="populateData(1)" value="Test Data 1"/>
                            </td>
                            <td class="estimation">
                                <input type="button" onclick="populateData(2)" value="Test Data 2"/>
                            </td>
                            <td class="estimation">
                                <input type="button" onclick="populateData(3)" value="Test Data 3"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="estimation">
                                Mean
                            </td>
                            <td class="estimation">
                                1
                            </td>
                            <td class="estimation">
                                394
                            </td>
                            <td class="estimation">
                                1.833
                            </td>
                        </tr>
                        <tr>
                            <td class="estimation">
                                Median
                            </td>
                            <td class="estimation">
                                1
                            </td>
                            <td class="estimation">
                                430
                            </td>
                            <td class="estimation">
                                1.75
                            </td>
                        </tr>
                        <tr>
                            <td class="estimation">
                                Count
                            </td>
                            <td class="estimation">
                                5
                            </td>
                            <td class="estimation">
                                5
                            </td>
                            <td class="estimation">
                                6
                            </td>
                        </tr>
                        <tr>
                            <td class="estimation">
                                Summation
                            </td>
                            <td class="estimation">
                                5
                            </td>
                            <td class="estimation">
                                1970
                            </td>
                            <td class="estimation">
                                11
                            </td>
                        </tr>
                        <tr>
                            <td class="estimation">
                                Mode
                            </td>
                            <td class="estimation">
                                1
                            </td>
                            <td class="estimation">
                                600 , 470 , 170 , 430 , 300
                            </td>
                            <td class="estimation">
                                1
                            </td>
                        </tr>
                        <tr>
                            <td class="estimation">
                                Variance
                            </td>
                            <td class="estimation">
                                0
                            </td>
                            <td class="estimation">
                                27130
                            </td>
                            <td class="estimation">
                                1.3
                            </td>
                        </tr>
                        <tr>
                            <td class="estimation">
                                Standard Deviation
                            </td>
                            <td class="estimation">
                                0
                            </td>
                            <td class="estimation">
                                164.72
                            </td>
                            <td class="estimation">
                                1.14
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" onclick="calculateNumbers()" value="Calculate"/>
                    <input type="button" onclick="reset()" value="Reset" style="float:right"/>
                </td>
            </tr>
        </table>
    </form>
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

