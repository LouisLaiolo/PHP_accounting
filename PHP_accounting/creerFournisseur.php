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

<?php //Gestion de la création d'un client

    $mail = null;
    $nom = null;
    $tel = null;
    $adresse = null;
    $alerteRe = null;

     if (isset($_POST['fnom']))
            $nom = htmlspecialchars($_POST["fnom"]);
    
    if (isset($_POST['fadresse']))
            $adresse = htmlspecialchars($_POST["fadresse"]);
    
    if (isset($_POST['ftel']))
            $tel = htmlspecialchars($_POST["ftel"]);
    
    if (isset($_POST['fmail']))
            $mail = htmlspecialchars($_POST["fmail"]);

    if(isset($_POST['subReg']) AND $_POST['subReg']=='Valider'){

                $alerteRe = '';
                $req = "INSERT INTO fournisseur(nom, adresse, tel, mail) VALUES('$nom','$adresse','$tel','$mail');";
                $getReq = $conn->query($req);
        
            if ($getReq){
                    $alerteRe = '<p> Ce fournisseur a été ajouté à votre liste !</p>';
                    $conn->close();
            } else {
                    $alerteRe = "<p><br/>Error: $req <br> $conn->error</p>";
                    $conn->close();
            }
    }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
       
function verify_password($password1, $password2){
    if($password1==$password2)
        return true;
    else
        return false;
}        
   
?>

        <!-- Wrapper -->
            <div id="wrapper">

                    <!-- Main -->
                    <div id="main">

                        <!-- AJOUTER CLIENT -->
                            <article id="creerF">
                                <h2 class="major">Ajouter un fournisseur</h2>
                                <?php echo $alerteRe ?>
                                <form method="post">
                                    <div class="field">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="fnom" id="fnom" required/>
                                    </div>
                                    <div class="field">
                                        <label for="email">Email</label>
                                        <input type="email" name="fmail" id="fmail" required/>
                                    </div>
                                    <div class="field">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="fadresse" id="fadresse" required/>
                                    </div>
                                    <div class="field">
                                        <label for="telephone">Téléphone</label>
                                        <input type="tel" name="ftel" id="ftel" required/>
                                    </div>
                                    <ul class="actions">
                                        <li><input type="submit" name="subReg" value="Valider" class="special" /></li>
                                        <li><input type="reset" value="Reset" /></li>
                                    </ul>
                                </form>
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
