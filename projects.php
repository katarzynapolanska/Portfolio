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
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=desert"></script>
    <style>
    * {
        text-align: center;
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
    $query = "SELECT * FROM project";
    $stm = $conn->prepare($query);
    if($stm->execute() == true){
    $res = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($res as $project) {
        echo 
        
          "<h4><a href='showProjects.php?pId=".$project->projectId."'>$project->projectNaam</a></h4>".
          $project->taal."</br>";
     
    }
}
    ?>
    </div>
    <h1 id="anaam">Polanska</h1>
    </body>
</html>