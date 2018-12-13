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

<?php //Gestion de la modification d'un salarié

    $alerteRe = "";
    $identifiant = null;

    if (isset($_GET["id"])){
        $identifiant = $_GET["id"];
    } else {
        echo "<p>Erreur récupération ID Taxe</p>";
    }
 
    $sql = "SELECT * FROM taxe WHERE id = ".$identifiant;
    $result = $conn->query($sql);
    
    if ($result == FALSE) 
        echo "<br/>Error modif: " . $conn->error;
    
    $row = $result->fetch_assoc();

    if (isset($_POST['type']))
            $type = htmlspecialchars($_POST["type"]);
    
    if (isset($_POST['montant']))
            $montant = htmlspecialchars($_POST["montant"]);
    
    if (isset($_POST['dateEmission']))
            $dateEmission = htmlspecialchars($_POST["dateEmission"]);
    
    if (isset($_POST['dateRecouvrement']))
            $dateRecouvrement = htmlspecialchars($_POST["dateRecouvrement"]);

    if(isset($_POST['subReg']) AND $_POST['subReg']=='Valider'){

                $alerteRe = '';
                $modif = "UPDATE taxe SET type = '$type', montant = '$montant', dateEmission = '$dateEmission', dateRecouvrement = '$dateRecouvrement' WHERE id = '$identifiant' ";
                $getReq = $conn->query($modif);
        
            if ($getReq){
                    $alerteRe = '<p> Modification enregistrée !</p>';
                    $conn->close();
            } else {
                    $alerteRe = "<p><br/>Error: $req <br> $conn->error</p>";
                    $conn->close();
            }
    }

?>
        <!-- Wrapper -->
            <div id="wrapper">

                    <!-- Main -->
                    <div id="main">

                        <!-- AJOUTER TAXE -->
                            <article id="McreerT">
                                <h2 class="major">Modifier une taxe</h2>
                                <?php echo $alerteRe ?>
                                <form method="post">
                                    <div class="field half first">
                                        <label for="adresse">Date d'emission</label>
                                        <input type="date" name="dateEmission" value="<?php echo($row["dateEmission"]);?>" required>
                                    </div>
                                    <div class="field half">
                                        <label for="telephone">Date de recouvrement</label>
                                        <input type="date" name="dateRecouvrement" value="<?php echo($row["dateRecouvrement"]);?>" required>
                                    </div>
                                    <div class="field half first">
                                        <label for="nom">Type</label>
                                        <input type="text" name="type" value="<?php echo($row["type"]);?>" required>
                                    </div>
                                    <div class="field half">
                                        <label for="email">Montant</label>
                                        <input type="text" name="montant" value="<?php echo($row["montant"]);?>" required>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" name="subReg" value="Valider" class="special" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>
                                </form>
                                <form action="visualiserTaxe.php#listeT" method="post">
                                <input type="submit" value="Retour liste des taxes" name="return" id="return_submit" />
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
