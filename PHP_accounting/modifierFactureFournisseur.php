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


    <script type="text/javascript">
        
        function Radio(id){
            switch(id){
                case "non" :
                document.getElementById("non").checked = true;
                document.getElementById("oui").checked = false;
                break;
                case "oui" :
                document.getElementById("non").checked = false;
                document.getElementById("oui").checked = true;
                break;
            }
        }

</script>

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

<?php //Modifier facture fournisseur

$alerteRe="";
$identifiant = null;

if (isset($_GET["id"])) {
        $identifiant = $_GET["id"];
} else {

    echo "<p>Erreur récupération ID facture</p>";
}
 
    $sql = "SELECT * FROM facturefournisseur WHERE id = ".$identifiant;
    $result = $conn->query($sql);
    
	if ($result == FALSE) 
		echo "<br/>Error modif: " . $conn->error;
    
    $row = $result->fetch_assoc();
    
    if (isset($_POST['ref']))
            $ref = htmlspecialchars($_POST["ref"]);
    
    if (isset($_POST['description']))
            $description = htmlspecialchars($_POST["description"]);
    
    if (isset($_POST['dateFacture']))
            $dateFacture = htmlspecialchars($_POST["dateFacture"]);
    
    if (isset($_POST['dateRecouvrement']))
            $dateRecouvrement = htmlspecialchars($_POST["dateRecouvrement"]);
    
    if (isset($_POST['totalHT']))
            $totalHT = htmlspecialchars($_POST["totalHT"]);
    
    if (isset($_POST['montantTVA']))
            $montantTVA = htmlspecialchars($_POST["montantTVA"]);
    
    if (isset($_POST['totalTTC']))
            $totalTTC = htmlspecialchars($_POST["totalTTC"]);
    
    if (isset($_POST['paye']))
            $paye = htmlspecialchars($_POST["paye"]);

if(isset($_POST['enregistrer']) AND $_POST['enregistrer']=='Enregistrer'){
    $modif = "UPDATE facturefournisseur SET ref = '$ref', description = '$description', dateFacture = '$dateFacture', dateRecouvrement = '$dateRecouvrement', totalHT = '$totalHT', montantTVA = '$montantTVA', totalTTC = '$totalTTC', paye = '$paye' WHERE id = '$identifiant' ";

    if ($conn->query($modif) == TRUE) {
        $alerteRe = '<p>Modification enregistrée !</p>';
    }

}

?>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">

        <!-- MODIFIER FACTURE FOURNISSEUR -->
        <article id="mFacF">
            <h2 class="major">Modifier Facture Fournisseur</h2>
            <h3 class="major">Facture</h3>
            <?php echo $alerteRe ?>
            <form method="post">
                <div class="field half first">
                    <label for="idClient">Identifiant Fournisseur</label>
                    <input type="text" value="<?php echo($row["idFournisseur"]); ?>" readonly/>
                </div>
                <div class="field half">
                    <label for="email">Reference facture</label>
                    <input type="text" name="ref" id="ref" value="<?php echo($row["ref"]);?>" required/>
                </div>
                <div class="field half first">
                    <label for="adresse">Date d'émission</label>
                    <input type="date" name="dateFacture" id="dateFacture" value="<?php echo($row["dateFacture"]);?>" required/>
                </div>
                <div class="field half">
                    <label for="telephone">Date de recouvrement</label>
                    <input type="date" name="dateRecouvrement" id="dateRecouvrement" value="<?php echo($row["dateRecouvrement"]);?>" required/>
                </div>

                                <h3 class="major">Montant</h3>

                                <div class="field half first">
                                    <label for="HT">Total HT</label>
                                    <input type="text" name="totalHT" value="<?php echo($row["totalHT"]);?>" required/>
                                </div>
                                <div class="field half">
                                    <label for="TVA">Montant TVA</label>
                                    <input type="text" name="montantTVA" value="<?php echo($row["montantTVA"]);?>" required/>
                                </div>
                                <div class="field">
                                    <label for="TTC">Total TTC</label>
                                    <input type="text" name="totalTTC" value="<?php echo($row["totalTTC"]);?>" required/>
                                </div>
                                <div class="field">
                                    <label for="telephone">Facture payée</label>
                                    <input type="radio" name="paye" value="0" id="non" onclick="Radio(this.id);" checked/> <label for="non">Non</label>
                                    <input type="radio" name="paye" value="1" id="oui" onclick="Radio(this.id);" /> <label for="oui">Oui</label>
                                </div>
                                <ul class="actions">
                                    <li><input type="submit" name="enregistrer" value="Enregistrer" class ="special"/></li>
                                    <li><input type="reset" value="Reset"/></li>
                                </ul>
                            </form>
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
