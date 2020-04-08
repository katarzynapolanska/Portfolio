<?php
$host = "localhost";
$dbname = "portfolio";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=".$host.";dbname=".$dbname.";",$username, $password);
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
    #content {
        overflow: scroll;
    }

    .column {
        text-align: left;
        float: left;
        width: 50%;
        padding-left: 2rem;
        font-size: 18px;
    }
    .row:after {
        display: table;
        clear: both;
    }
    @media screen and (max-width: 600px) {
    .column {
        width: 100%;
        }
    }
    .column1 {
        text-align: left;
    }
    h3 {

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
    <div class="row">
        
        <?php
        $query = "SELECT * FROM werkervaring ORDER BY datum DESC";
        $stm = $conn->prepare($query);
        if($stm->execute()) {
            $result = $stm -> fetchAll(PDO::FETCH_OBJ);
            echo "<h3>• Werkervaring •</h3>";
            foreach($result as $prod) {
                echo "<div class='column'><ins>".$prod->datum."</ins></br>".
                $prod->bedrijfsNaam."</br>".
                $prod->functie."</br></br></div>";
            }
        }
        
        $query = "SELECT * FROM school ORDER BY datum DESC";
        $stm = $conn->prepare($query);
        if($stm->execute()){
            $result = $stm -> fetchAll(PDO::FETCH_OBJ);
            foreach($result as $key) {
                echo "<div class='column'><h3>• Opleidingen •</h3><ins>".$key->datum."</ins></br>". 
                $key->schoolNaam."</br>". 
                $key->opleiding."</br></div>";
            }
        }

        $query = "SELECT * FROM diplom";
        $stm = $conn->prepare($query);
        if($stm->execute()) {
            $result = $stm -> fetchAll(PDO::FETCH_OBJ);
            echo "<h3>• Diploma •</h3>";
            foreach($result as $data) {
                echo "<div class='column1'>".$data->diplomNaam."</br></div>";
            }
        }

        $query = "SELECT * FROM taal ORDER BY taalName DESC";
        $stm = $conn->prepare($query);
        if($stm->execute()){
            $result = $stm -> fetchAll(PDO::FETCH_OBJ);
            echo "<h3>• Talen •</h3>";
            foreach($result as $taal) {
                echo "<div class='column1'>".$taal->taalName."</br></div>";
            }
        }
        ?>
        <?php
        include("session.php");
        
        if(isset($_SESSION['login']) == true){
            echo "<form method='POST'><input type='submit' name='btnEdit' value='Edit'></form>";
                    "<form method='POST'>
                    <input type='text' name='exa' value='Edit'>
                    </form>";
                    }
            
        
        
        ?>
    </div>
    </div>
    
    <h1 id="anaam">Polanska</h1>
    </body>
</html>