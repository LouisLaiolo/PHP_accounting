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

                        <!-- AJOUTER CLIENT -->
                            <article id="listeFF">
                                <h2 class="major">Factures - fournisseurs :</h2>
                                <?php

                                 $sql2 = "SELECT * FROM facturefournisseur";
                                    $result2 = $conn->query($sql2);
                                    
                                    if ($result2 == FALSE)
                                        echo "<br/>Error select: " . $conn->error;
                                    
                                    if ($result2->num_rows > 0) {
                                        while($row = $result2->fetch_assoc()) {
                                           echo "<strong>IDENTIFIANT FOURNISSEUR :</strong> ".$row["idFournisseur"]." <br><strong>REFERENCE FACTURE :</strong> ".$row["ref"]."<br><strong>DESCRIPTION :</strong> "
                                                .$row["description"]."<br><strong>DATE FACTURE :</strong> ".$row["dateFacture"]." | <strong>DATE DE RECOUVREMENT :</strong>  ".$row["dateRecouvrement"].
                                                "<br><strong>TOTAL HT :</strong> ".$row["totalHT"]." | <strong>MONTANT TVA :</strong> ".$row["montantTVA"].
                                                " | <strong>TOTAL TTC :</strong> ".$row["totalTTC"]."<br><strong>FACTURE PAYEE :</strong> ".$row["paye"]."<br>";

                                        $monId = $row["id"];
                                    ?>
                                    <br>
                                    <div id="optionVisu">
                                        <form method="get" action="modifierFactureFournisseur.php#mFacF"><input type="submit" value="Modifier" name="modif"/><input type="hidden" name="id" value="<?php echo($monId);?>"/></form>
                                        <form method="get" action="suppressionFactureFournisseur.php#SuppFF"><input type="submit" value="Supprimer" name="supp"/><input type="hidden" name="id" value="<?php echo($monId);?>"/></form>
                                    </div>
                                    
                                    <?php
                                        }
                                    } else {
                                        echo "<p>Vous n'avez aucune facture pour fournisseur</p>";
                                    }

                                    $conn->close();
                                        
                                ?>

                                <form action="mainMenu.php#fournisseurs" method="post">
                                
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
