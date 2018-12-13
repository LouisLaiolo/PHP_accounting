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

<!--Script pour rediriger vers modification-->

        <SCRIPT LANGUAGE="JavaScript">
            function modification(){
                document.location.href="mainMenu.php";
            }
        </SCRIPT>

<!--Script pour rediriger vers suppression-->

                <SCRIPT LANGUAGE="JavaScript">
            function suppression(){
                document.location.href="mainMenu.php";
            }
        </SCRIPT>

<!--Script pour rediriger vers mail-->

        <SCRIPT LANGUAGE="JavaScript">
            function sendMail(){
                document.location.href="mainMenu.php";
            }
        </SCRIPT>

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
                            <article id="listeFC">
                                <h2 class="major">Factures - clients :</h2>
                                <?php

                                    $sql1 = "SELECT * FROM factureclient";
                                    $result1 = $conn->query($sql1);
                                    
                                    if ($result1 == FALSE)
                                        echo "<br/>Error select : " . $conn->error;
                                    
                                    if ($result1->num_rows > 0) {
                                        while($row = $result1->fetch_assoc()) {
                                            echo "<strong>IDENTIFIANT CLIENT :</strong> ".$row["idClient"]." <br><strong>REFERENCE FACTURE :</strong> ".$row["ref"]."<br><strong>DATE D'EMISSION :</strong> "
                                                .$row["dateEmission"]." | <strong>DATE DE RECOUVREMENT :</strong> ".$row["dateRecouvrement"]."<br><strong>PRODUIT :</strong> ".$row["produit"].
                                                "<br><strong>TAUX TVA :</strong>  ".$row["tauxTVA"]." | <strong>TOTAL HT :</strong> ".$row["totalHT"]." | <strong>MONTANT TVA :</strong> ".$row["montantTVA"].
                                                " | <strong>TOTAL TTC :</strong> ".$row["totalTTC"]."<br><strong>FACTURE PAYEE :</strong> ".$row["paye"]."<br>";

                                        $monId = $row["id"];
                                    ?>
                                    <br>
                                    <div id="optionVisu">
                                        <form method="get" action="modifierFactureClient.php#mFacC"><input type="submit" value="Modifier" name="modif"/><input type="hidden" name="id" value="<?php echo($monId);?>"/></form>
                                        <form method="get" action="suppressionFactureClient.php#SuppFC"><input type="submit" value="Supprimer" name="supp"/><input type="hidden" name="id" value="<?php echo($monId);?>"/></form>
                                        <form method="get" action="envoyerMail.php#Mail"><input type="submit" value="Mail de rappel" name="mail"/><input type="hidden" name="id" value="<?php echo($monId);?>"/></form>
                                    </div>
                                    <?php
                                        }
                                    } else {
                                        echo "<p>Aucune facture n'est disponible</p>";
                                    }

                                    $conn->close();
                                        
                                ?>

                                <form action="mainMenu.php#clients" method="post">
                                
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
