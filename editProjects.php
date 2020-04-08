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
        $stm=$conn->prepare($query);
        if($stm->execute()){
            $result = $stm -> fetchAll(PDO::FETCH_OBJ);
					foreach($result as $prod){
                        echo "<h4><a href='updateProjects.php?pId=".$prod->projectId."'>$prod->projectNaam</a></h4>".
                        $prod->taal;
								
					}
        }
        ?>
        
    </div>
    <form method="post">
            <input type="text" name="projectName" placeholder="Projectname"></br>
            <input type="text" name="txtTaal" placeholder="Programmerentaal"></br>
            <textarea cols="80" rows="10" name="newProject" require>Code here...</textarea></br>
            <input type="submit" name="btnAdd" value="Add">
        </form>

        <?php
        if(isset($_POST['btnAdd'])){
            $name = $_POST['projectName'];
            $taal = $_POST['txtTaal'];
            $project = addslashes($_POST['newProject']);
            $query = "INSERT INTO project (projectNaam, taal, upload) VALUES ('$name', '$taal', '$project')";
            $stm=$conn->prepare($query);
            if($stm->execute()){
                Header("Location: editProjects.php");
            }else echo "Something wrong";
        }
        ?>

    
    <h1 id="anaam">Polanska</h1>
    </body>
</html>