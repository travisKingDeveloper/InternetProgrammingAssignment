<?php
/**
 * Created by PhpStorm.
 * User: travi_000
 * Date: 4/5/2016
 * Time: 6:12 PM
 */

include '../../Global/RenderScripts/MasterNavigationBar.php';

?>
<!DOCTYPE html>
<html id="section">
<head>
    <link rel="stylesheet" type="text/css" href="../../Global/StyleSheets/style.css">
    <title>Homepage</title>
</head>

<body>

<?php MasterNavigationBar(1); ?>


<div id="paragraph">
    <h1>COP 4813: Internet Programming</h1>
    <h2>ePortfolio for COP4813: Internet Programming</h2>
    <h3>Travis Allen King</h3>

    <hr/>
    <h4>Home Page</h4>
    <hr/>

    <div class="learningObjectives">
        <a href="./../../assign1/Views/index.php">Assignment 1</a>
        <hr/>
        <p>
            This assignment's main goal was to establish the platform to which subsequent
            assignments would be based off of. I chose to implement the layout you see now because
            I had found an example on W3. I saw it and thought, I could make something pretty cool with this. I believe
            it was <i>very</i> informative to learn HTML and CSS via a simple text editor, as
            opposed to a more competent IDE. Personally I'm very used to Visual Studios 2013 and 2015, two very
            powerful IDE's, and I found that the simplicity of not using these technologies has helped me better
            grasp the fundamental topics listed below.
        </p>
        <p>
            Major aspects of the assignment were getting familiar with using Ubuntu as a web hosting
            platform, implementing changes to style via CSS files, using common html tags, and
            and following the directions of sites like W3. I am used to a technology called, Razor which embedds
            C# directly into the HTML allowing there two be logic in the rendering of the page. In this assignment
            I found it very strange to have to hard code all of this information. If you look at the source code, I'm
            sure you'd understand
            what I mean if your technologically inclined. Overall, this project was very fun, took me ~8 hours or so of
            experimenting
            and reading, and I mostly completed the final work on 1/15/2016.
        </p>
        <h4>Learning Objectives</h4>
        <ul>
            <li>Hosting Simple Websites</li>
            <li>Using Common HTML Tags</li>
            <li>Using CSS</li>
            <li>Using Active Links to navigate and use other web services (SMTP)</li>
            <li>Designing a Website</li>
        </ul>
        <hr/>
    </div>
    <div class="learningObjectives">
        <a href="../../assign2/Views/index.php">Assignment 2</a>
        <hr/>
        <p>
            This assignment was difficult because I had never used javascriptoutside of a dedicated environment like
            Visual Studios.
            I found that it was difficult to debug, until I realized the utility of Edge's debugging tools. I'm sure
            this is
            applicable to all dev tools in web explorers but I saw that when I had written my javascript code I tended
            to say
            .text as opposed to .value and that messed with me a lot. Also assigning a function to a click event was
            pretty difficult as well.
        </p>
        <p>
            I played a lot with the structure of the website after the last assignment and the majority of my time was
            spent on that.
            I plan on expanding this assignment to be a full fledge automatic mailing using php. However I will soon
            implement the
            opening of the link similar to project 1 and passing the information gathered from the form via the url.
            Overall, this project was very insightful, took me ~8 hours or so towards restructuring the sight and about
            the same to create the javascript. I completed the final work on 2/7/2016.
        </p>
        <h4>Learning Objectives</h4>
        <ul>
            <li>Embedding JavaScript in an HTML file</li>
            <li>Creating a form with click events</li>
            <li>Using JavaScript to perform logic</li>
            <li>Organizing logic flow using Flow Charts</li>
        </ul>
        <hr/>

    </div>
    <div class="learningObjectives">
        <a href="../../assign3/Views/index.php">Assignment 3</a>
        <hr/>
        <p>
            The goal of this assignment was to further develop my javascript skills and inadvertently refreshed my
            skills in statistics! This assignment also really heavily used modularity to reduce the amount of code
            necessary to actually create. An interesting problem that occured was whether or not I should put code
            inline with the html, or inside of a javascript file. After I thought about it I came to the conclusion that
            if it pertained to collecting data inside my
            form that only pertained to the html it resided in it should live there. If some other html page can use it
            then it should be in a file.
        </p>
        <h4>Learning Objectives</h4>
        <ul>
            <li>
                Furthering Javascript
            </li>
            <li>
                Developing Modular Code
            </li>
            <li>
                Reusing Code
            </li>
        </ul>

    </div>
    <div class="learningObjectives">
        <hr/>
        <a href="../../assign4/Views/index.php">Assignment 4</a>
        <hr/>
        <p>
            This assignment was to try and illustrate a concept through an animation. My choice was to mimic tic tac
            toe in order to illustrate how to create images including X's O's and the board itself. I mapped it out
            using a canvas map that was 350 by 350 but only used 300 by 300 with 25 border essentially to make it look
            more appealing. I failed in order to try and calculate how to predict the next move but I was able to create
            all the images that are used and used javascript to do it. If you click The middle button you will see where.
            It creates the O. Unfortunately there is some reason why this just isn't running properly. I'm going to go
            back and try and do this better to further illustrate the point. After reviewing the assignment I believe
            I completely missed the target as to what was being looked for. This will be updated once it properly works.
            For those viewing this outside of school the login is "testAccount" and the password is "test".
        </p>
        <h4>Learning Objectives</h4>
        <ul>
            <li>
                Motion Tweening
            </li>
            <li>
                Html Canvas
            </li>
            <li>
                Following Directions :(
            </li>
        </ul>
    </div>
    <div class="learningObjectives">
        <hr/>
        <a href="../../assign5/Views/Login.php">Assignment 5</a>
        <hr/>
        <p>
            This assignment was a very interesting challenge. For the last couple of years I had an interest in learning
            more about the stock market but I never got around to it. Not Anymore! This project helped sparked an interest
            in learning more about stock and the various API's out there that can be used to accumulate data from it.
            If you look in the <i>YahooFinanceAPI</i>, you will see a PHP wrapper that allows a user to call a large amount of
            the Yahoo finance API. I found it on GitHub and I included it in the project because I plan on implementing it
            but in the interest of fairness, for this assignment I used the fOpen as described in the rubric. I spent a
            small amount of time on the CSS but the main focus was learning PHP and it's capabilities. I implemented $_SESSION
            to manage whether the user was logged in or not, and I used various files to read and write to a file. I will migrate
            this to a database for project 6.
        </p>
        <h4>Learning Objectives</h4>
        <ul>
            <li>
                Correctly Spelling a URL :P
            </li>
            <li>
                PHP Skills
            </li>
            <li>
                Managing Login Status Throughout A Website
            </li>
        </ul>
    </div>
    <div class="learningObjectives">
        <hr/>
        <a href="../../assign5/Views/Login.php">Assignment 6</a>
        <hr/>
        <p>
            I thought this was a very good learning excercise in developing a database, implementing it and preventing
            against sql injection. The biggest problem i faced was developing the stored procedures using MySQL. I found it
            to be a steep learning curve and I ended up using in line sql mostly throughout this project. Addendum -
            Making a Virtual Machine with Digital ocean was really challenging as well but I am very happy with the result :)
            This was the

            <a href="../../Assets/ERDiagram.png">ER Diagram</a>
        </p>
        <h4>Learning Objectives</h4>
        <ul>
            <li>
                Stored Procedures
            </li>
            <li>
                Basic CRUD
            </li>
            <li>
                Developing a database around the information readily available from yahoo api
            </li>
        </ul>
    </div>
    <div class="learningObjectives">
        <hr/>
        <a href="">Assignment 7</a>
        <hr/>
        <p>
            This assignment was one I found very challenging because of the lengths I went to make this website a reality.
            When I first looked at the problem I noticed that my SQL in populating the table was <i>very</i> sloppy. I queried
            for all of the id's of relevant stock information, did another query for each of those queries to then obtain the information
            needed to create the table. I found that this was very inefficient and was inflexible for the assignment that I was doing.
            I recreated this by making an sql query that did an inner join on itself in order to obtain the most recent date of a transaction
            with respect to the stock portfolio it has. With this I inner joined as I would before based off of foreign key relationships
            and then I had the final query. After that was done I had to create the ajax call Get Table Row and I realized a pretty important
            feature of PHP and internet programming in general. NEVER try to create the html dynamically on the backend. After talking
            with someone who has done php development for over 5 years he said that is terrible practice and you should be building the
            html via javascript on the front end as opposed to doing this in php. Lesson Learned, people get fired for that kind of thing.
            Once I had the ajax file correct, the next step was making sure I called it right. I did this using the jquery get function. It was
            after a small amount of time I was able to confirm that that worked but I couldn't figure out how to do anything with the information
            that I had. I had two choices restructure the html so that it would be more appropriate or change what I did in the backend to use
            JSON in order to more easily dynamically create tags. I went with the first understanding that it was bad practice and not to do it again.
            All of this was done in the MyPortfolio page and is triggered by a drop down list being changed. Another Ajax call I did that
            was much easier was querying the database for any stock tick identifiers that begin with what was previously typed in. This was the first
            that I accomplished and this was through the help of a W3 schools tutorial. I was reading it and said, that would be perfect here and I
            basically copied and pasted code and modified it to query my database. Getting all of the NASDAQ stock tick identifiers wasn't very hard,
            but if this is ever to be live I need a more accurate way of keeping it up to date.
        </p>
        <h4>Learning Objectives</h4>
        <h5>Travis' Takeaway</h5>
        <ul>
            <li>
                Proper Internet Programming Practice
            </li>
            <li>
                AJAX
            </li>
            <li>
                JQUERY
            </li>
            <li>
                Creating MySQL queries more effectively
            </li>
            <li>
                Asking for help!
            </li>
        </ul>
    </div>

    <div id="footer">
        <p><font color="Green">"I believe that at the end of the century the use of words and general educated opinion
                will have altered so much that one will be able to speak of machines thinking without expecting to be
                contradicted" - Alan Turing</font>
        <p>
    </div>
</div>
</body>
</html>

