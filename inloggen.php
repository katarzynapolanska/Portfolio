<?php
    include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Katarzyna Polanska</title>
    <link rel="stylesheet" style="text/css" href="styleAll.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <style>
    * {
        text-align: center;
    }
    .inputs {
        border-top: 5px solid white;
        border-bottom: 5px solid white;
        -webkit-box-shadow: 0px -1px 24px 0px rgba(102,82,60,1);
        -moz-box-shadow: 0px -1px 24px 0px rgba(102,82,60,1);
        box-shadow: 0px -1px 24px 0px rgba(102,82,60,1);
        margin: 8rem -5rem 0 -5rem;
    }

    input[type=text],
    input[type=password]{
        margin: 2rem;
        height: 2rem;
        width: 20rem;
        border: none;
        border-bottom: 1px solid rgba(103, 126, 110, 0.93);
        background: none;
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
    <div id="content">
        <div class="inputs">
            <form method="POST">
                <input type="text" name="user" placeholder="Username"></br>
                <input type="password" name="password" placeholder="Password"></br>
                <input type="submit" name="btnSubmit" value="Log in">
                
            </form>
        </div>
        <?php
        //include("session.php");
        session_start();
        if(isset($_POST['btnSubmit'])){
            $username = $_POST['user'];
            $pass = $_POST['password'];
            $query = "SELECT * FROM gebruiker WHERE gebruikerNaam='$username' AND wachtwoord='$pass'";
            $stm = $conn -> prepare($query);
            $stm->execute();
            $login = $stm->fetch(PDO::FETCH_OBJ);
            
            if($login != false){
                header("Location: editProjects.php");
            }
            else{
                echo "Your username or password is incorrect!";
            }
          
        }
        ?>

    </div>
    
    <h1 id="anaam">Polanska</h1>
    </body>
</html>