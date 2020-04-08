<?php
    include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Katarzyna Polanska</title>
    <link rel="stylesheet" style="text/css" href="code.css">
    <style>

    </style>
    </head>
<body>

    <div id="navbar">
        <a href="projects.php">Back</a>
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
                    echo "<blockquote><pre><code>".highlight_string($prod->upload)."</code></pre></blockquote>";
                    }
                }
                
        ?>

    </div>
    
    </body>
</html>