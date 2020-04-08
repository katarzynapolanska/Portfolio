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
    <script src="https://kit.fontawesome.com/00bec71c4e.js" crossorigin="anonymous"></script>
    <style>
    * {
        text-align: center;
    }
    .contact {
        margin: 5rem 0 0 5rem;
    }
    .contact i {
        font-size: 1.25rem;
    }
    ul {
        color: #4E6766;
        float: left;
        list-style: none;
        text-align: left;
    }
    li {
        text-decoration: none;
    }
    .message {
        float: right;
        color: #4E6766;
        margin: 1rem 4rem 0 0;
    }
    input[type=text], [type=email] {
        display: inline-block;
        margin: 1rem;
        height: 2rem;
        width: 20rem;
        border: none;
        border-bottom: 1px solid rgba(103, 126, 110, 0.93);
        background: none;
        color: #4E6766;
        font-family: 'Montserrat', sans-serif;
    }
    textarea {
        margin: 1rem;
        width: 20rem;
        height: 5rem;
        border: none;
        border-bottom: 1px solid rgba(103, 126, 110, 0.93);
        background: none;
        font-family: 'Montserrat', sans-serif;
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
    <?php
    $query = "SELECT * FROM contactgegevens";
        $stm = $conn->prepare($query);
				if($stm->execute()) {
					$result = $stm -> fetchAll(PDO::FETCH_OBJ);
					foreach($result as $prod){
                        echo    "<div class='contact'><ul><h4>Contactgegevens</h4></br>
                                <li><i class='fas fa-phone-square-alt'></i>  Telefon: ".$prod->telefonNummer. "</li></br>".
								"<li> <i class='fas fa-envelope-square'></i>  Email: ".$prod->email. "</li></br>".
								"<li> <i class='fas fa-map-marked-alt'></i>  Adres: </li>".$prod->woonplaats. "</li></br></ul></div>";
					}
                }
    ?>
        <div class="message">
            <form method="POST" id="message">
                <input type="text" name="sendingName" placeholder="Uw naam"></br>
                <input type="email" name="sendingEmail" placeholder="Uw e-mail adres"></br>
                <textarea rows="4" cols="50" name="msg"> Bericht... </textarea></br>
                <input type="submit" name="btnSend" value="Send">
            </form>
        </div>
    <?php
    if(isset($_POST['btnSend'])){
        $naam = $_POST['sendingName'];
        $email = $_POST['sendingEmail'];
        $bericht = $_POST['msg'];
        $query = "INSERT INTO message (sNaam, sEmail, message) VALUES ('$naam', '$email', '$bericht')";
        $stm = $conn->prepare($query);
        if($stm->execute()){
            echo "Your message has been sent succesfully!";
        }
    }
    ?>
    </div>
    
    <h1 id="anaam">Polanska</h1>
    </body>
</html>