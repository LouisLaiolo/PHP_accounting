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

<?php //Gestion de la création d'un salarié

    $mail = null;
    $nom = null;
    $tel = null;
    $adresse = null;
    $fonction = null;
    $salaireBrut = null;
    $salaireNet = null;

    $alerteRe = null;

     if (isset($_POST['nom']))
            $nom = htmlspecialchars($_POST["nom"]);
    
    if (isset($_POST['adresse']))
            $adresse = htmlspecialchars($_POST["adresse"]);
    
    if (isset($_POST['tel']))
            $tel = htmlspecialchars($_POST["tel"]);
    
    if (isset($_POST['mail']))
            $mail = htmlspecialchars($_POST["mail"]);
    
    if (isset($_POST['fonction']))
            $fonction = htmlspecialchars($_POST["fonction"]);
    
    if (isset($_POST['salaireNet']))
            $salaireNet = htmlspecialchars($_POST["salaireNet"]);
    
    if (isset($_POST['salaireBrut']))
            $salaireBrut = htmlspecialchars($_POST["salaireBrut"]);
    
    if (isset($_POST['datePaiement']))
            $datePaiement = htmlspecialchars($_POST["datePaiement"]);

    if(isset($_POST['subReg']) AND $_POST['subReg']=='Valider'){

                $alerteRe = '';
                $req = "INSERT INTO salarie(nom, adresse, tel, mail, fonction, salaireNet, salaireBrut, datePaiement) VALUES('$nom','$adresse','$tel','$mail','$fonction','$salaireNet','$salaireBrut','$datePaiement');";
                $getReq = $conn->query($req);
        
            if ($getReq){
                    $alerteRe = '<p> Ce salarié a été ajouté à votre liste !</p>';
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

                        <!-- AJOUTER SALARIE -->
                            <article id="creerS">
                                <h2 class="major">Ajouter un salarié</h2>
                                <?php echo $alerteRe ?>
                                <form method="post">
                                    <div class="field">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" id="fnom" required/>
                                    </div>
                                    <div class="field">
                                        <label for="email">Email</label>
                                        <input type="email" name="mail" id="fmail" required/>
                                    </div>
                                    <div class="field">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" id="fadresse" required/>
                                    </div>
                                    <div class="field">
                                        <label for="telephone">Téléphone</label>
                                        <input type="tel" name="tel" id="ftel" required/>
                                    </div>
                                    <div class="field">
                                        <label for="fonction">Fonction</label>
                                        <input type="text" name="fonction" id="fonc" required/>
                                    </div>
                                    <div class="field">
                                        <label for="fonction">Date de paiement</label>
                                        <input type="date" name="datePaiement" required/>
                                    </div>
                                    <div class="field half first">
                                        <label for="fonction">Salaire Brut</label>
                                        <input type="text" name="salaireBrut" id="sb" required/>
                                    </div>
                                    <div class="field half">
                                        <label for="fonction">Salaire Net</label>
                                        <input type="text" name="salaireNet" id="sb" required/>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" name="subReg" value="Valider" class="special" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>
                                </form>
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
