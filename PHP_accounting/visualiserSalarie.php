<?php
    session_cache_limiter('private_no_expire, must-revalidate');
    session_start();
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>M314 - PROJET</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body>

<?php //Connexion BDD
    
    $servername = "localhost";
    $username = "id4218719_root";
    $password = "code51";
    $dbname = "id4218719_projetcompta";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

?>
        <!-- Wrapper -->
            <div id="wrapper">

                    <!-- Main -->
                    <div id="main">

                        <!-- VISUALISER SALARIE -->
                            <article id="listeS">
                                <h2 class="major">Liste de vos salariés :</h2>
                                <?php

                                $sql = "SELECT * FROM salarie";
                                $result = $conn->query($sql);
    
                                if (!$result)
                                    echo "<br/>Error select: " . $conn->error;
    
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {

                                    echo "<strong>NOM : </strong>".$row["nom"]."<br><strong>ADRESSE : </strong>".$row["adresse"]."<br><strong>TELEPHONE : </strong>".$row["tel"]." <strong>MAIL : </strong>".$row["mail"]."<br><strong>FONCTION : </strong>".$row["fonction"]."<br><strong>SALAIRE BRUT : </strong>".$row["salaireBrut"]." | <strong>SALAIRE NET : </strong>".$row["salaireNet"]."<br><strong>DATE DE PAIEMENT : </strong>".$row["datePaiement"]."<br>";

                                    $monId = $row["id"];
                                ?>
                                            <br>
                                    <div id="optionVisu">
                                        <form method="get" action="modifierSalarie.php#McreerS"><input type="submit" value="Modifier" name="modif"/><input type="hidden" name="id" value="<?php echo($monId);?>"/></form>
                                        <form method="get" action="suppressionSalarie.php#SuppS"><input type="submit" value="Supprimer" name="supp"/><input type="hidden" name="id" value="<?php echo($monId);?>"/></form>
                                    </div>
                                   
    
                                <?php
                                    }
                                } else {
                                    echo "<p>Vous ne disposez d'aucun salarié.</p>";
                                }
    
                                ?>
    
                                <?php 
        
                                $conn->close();
        
                                ?>

                                <form action="mainMenu.php#salaries" method="post">
                                
                                <input type="submit" value="Retour" name="return" id="return_submit" />
                                </form>

                            </article>

                    </div>

                <!-- Footer -->
                    <footer id="footer">
                        <p class="copyright">&copy; IUT Nice - M314 - 2018</p>
                    </footer>

            </div>

        <!-- BG -->
            <div id="bg"></div>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>
