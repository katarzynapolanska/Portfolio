<?php
$host = "localhost";
$dbname = "";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=".$host.";dbname=".$dbname.";",$username, $password);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Katarzyna Polanska</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <style>
    * {
        text-align: center;
    }
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #F3F1F2;
        background: url("images/contact-bg.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
    #navbar {
        text-align: center;
        display: inline;
    }
    #navbar a {
        text-decoration: none;
        font-weight: bold;
        color: black;
        margin: 5rem;
        border-top: 1px solid rgba(21, 30, 24, 0.83);
        border-bottom: 1px solid rgba(21, 30, 24, 0.83);
    }

    #navbar a:hover{
        color: rgb(255, 30, 30);
    }

    #vnaam {
        text-align: left;
        z-index: -1;
        margin: 2% 15% 0;
        font-family: 'Dancing Script', cursive;
        font-size: 4rem;
        color: rgb(148, 168, 154);
    }
    #anaam {
        text-align: right;
        z-index: -1;
        margin: 0 15% 2%;
        font-family: 'Dancing Script', cursive;
        font-size: 4rem;
        color: rgba(103, 126, 110, 0.93);
    }
    #content {
        background: url("images/ifcontact.jfif");
        background-repeat: no-repeat;
        background-position: center;
        background-color: white;
        height: 30rem;
        margin: 1% 15%;
        border: 10px solid rgb(2,0,36);
        color: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(44,134,91,0.196516106442577) 0%, rgba(0,21,25,1) 100%);
    }
    .var-highlight{
        color: rgba(246, 49, 49, 1);
    }
    .string-highlight{
        color: white;
    }
    .link{
        color: rgba(248, 98, 98, 0.66);
        text-decoration: none;
    }
    a {
        color: rgba(248, 98, 98, 0.66);
        text-decoration: none;
    }

    #typewriter{
            text-align: left;
            font-size: 1.15em;
            margin: 12rem 5rem 0 10rem;
            font-family: "Courier New";

            &:after{
                content: "|";
                animation: blink 500ms linear infinite alternate;
            }
    }

    @-webkit-keyframes blink{
        0%{opacity: 0;}
        100%{opacity: 1;}
    }

    @-moz-keyframes blink{
        0%{opacity: 0;}
        100%{opacity: 1;}
    }

    @keyframes blink{
        0%{opacity: 0;}
        100%{opacity: 1;}
    }
    </style>
    
</head>
<body>

<div id="navbar">
        <a href="index.php">ABOUT ME</a>
        <a href="projects.php">PROJECTS</a>
        <a href="cv.php">MY CV</a>
        <a href="contact.php">CONTACT</a>
        <a href="inloggen.php">INLOGGEN</a>
    </div>

    <h1 id="vnaam">Katarzyna </h1>
    <form method = "POST">
        <div id="content">
            <pre id="typewriter">
                <span class="var-highlight">if</span> <span class="string-highlight">interested == True { </span>
                <span class="string-highlight">print <span class="link"><a href="contact1.php">'Click here!'</a></span></span>
                <span class="var-highlight">else </span><span class="string-highlight"> {</span>
                <span class="string-highlight">print 'Have a nice day!'</span>
                <span class="string-highlight">} </span>
            </pre>  
        </div>
    </form>
    <h1 id="anaam">Polanska</h1>
    
    <script>
        function setupTypewriter(t) {
        var HTML = t.innerHTML;

        t.innerHTML = "";

        var cursorPosition = 0,
            tag = "",
            writingTag = false,
            tagOpen = false,
            typeSpeed = 100,
        tempTypeSpeed = 0;

        var type = function() {
        
            if (writingTag === true) {
                tag += HTML[cursorPosition];
            }

            if (HTML[cursorPosition] === "<") {
                tempTypeSpeed = 0;
                if (tagOpen) {
                    tagOpen = false;
                    writingTag = true;
                } else {
                    tag = "";
                    tagOpen = true;
                    writingTag = true;
                    tag += HTML[cursorPosition];
                }
            }
            if (!writingTag && tagOpen) {
                tag.innerHTML += HTML[cursorPosition];
            }
            if (!writingTag && !tagOpen) {
                if (HTML[cursorPosition] === " ") {
                    tempTypeSpeed = 0;
                }
                else {
                    tempTypeSpeed = (Math.random() * typeSpeed) + 50;
                }
                t.innerHTML += HTML[cursorPosition];
            }
            if (writingTag === true && HTML[cursorPosition] === ">") {
                tempTypeSpeed = (Math.random() * typeSpeed) + 50;
                writingTag = false;
                if (tagOpen) {
                    var newSpan = document.createElement("span");
                    t.appendChild(newSpan);
                    newSpan.innerHTML = tag;
                    tag = newSpan.firstChild;
                }
            }

            cursorPosition += 1;
            if (cursorPosition < HTML.length - 1) {
                setTimeout(type, tempTypeSpeed);
            }

        };

        return {
            type: type
        };
    }

    var typer = document.getElementById('typewriter');

    typewriter = setupTypewriter(typewriter);

    typewriter.type();
    </script>

</body>
</html>