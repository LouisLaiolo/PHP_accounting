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

<?php //Suppression Facture Fournisseur

$identifiant = null;

if (isset($_GET["id"])) {
        $identifiant = $_GET["id"];

} else {

    echo "<p>Erreur récupération ID facture</p>";
}

    //requête SQL:
    $sql = "DELETE FROM facturefournisseur WHERE id = ".$identifiant;
    $result = $conn->query($sql);
    
	if ($result == FALSE) 
		echo "<br/>Error delete: " . $conn->error;
    
    $conn->close();

?>
        <!-- Wrapper -->
            <div id="wrapper">

                    <!-- Main -->
                    <div id="main">

                        <!-- SUPPRIMER FACTURE FOURNISSEUR -->
                            <article id="SuppFF">
                                <h3 class="major">Suppression effectuée !</h3>
                              
                                <form action="visualiserFactureFournisseur.php#listeFF" method="post">
                                <input type="submit" value="Retour liste des factures" name="return" id="return_submit" />
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
