<?php
    include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Katarzyna Polanska</title>
    <link rel="stylesheet" style="text/css" href="code.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=desert"></script>
    <style>

    </style>
    </head>
<body>

    <div id="navbar">
        <a href="editProjects.php">Back</a>
    </div>
    <div id="content">
        
    <?php
    
        $pId = $_GET['pId'];
       
        $Query = "SELECT * FROM project WHERE projectId = $pId";

            $stm = $conn->prepare($Query);
            if($stm->execute()) {
                $result = $stm -> fetchAll(PDO::FETCH_OBJ);
                foreach($result as $prod){
                    echo "<h3>".$prod->projectNaam."</h3></br>".
                                $prod->taal."</br>";
                    echo "<blockquote><pre><code>".highlight_string($prod->upload)."</code></pre></blockquote>";;
                    }
                }
?>
                <form method='post' enctype='multipart/form-data'>
                    <input type='text' name='projectName' placeholder='<?php echo $prod->projectNaam;?>' readonly></br>
                    <textarea cols='80' rows='10' name='newProject' require><?php echo $prod->upload;?></textarea></br>
                    <input type='submit' name='btnUpdate' value='Update'>
                    <input type='submit' name='btnDelete' value='Delate'>
                </form>

 <?php           
            $pId = $_GET['pId'];
            if(isset($_POST['btnUpdate'])){
                $code=addslashes($_POST['newProject']);
                $query = ("UPDATE project SET upload = '$code' WHERE projectId = $pId");
		        $stm = $conn->prepare($query);
		        if($stm->execute())
		        {
                    echo "Update gelukt!!";
		        }else echo "Sorry..";
            }
            
            
            if(isset($_POST['btnDelete'])){
                $pId = $_GET['pId'];
                $query = ("DELETE FROM project WHERE projectId = '$pId'");
                $stm = $conn->prepare($query);
                if($stm->execute()){
                    echo "Project removed!";
                }else echo "Noo..";
            }
            ?>
                

    </div>
    
    </body>
</html>