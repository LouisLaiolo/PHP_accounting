<?php //Générer facture client
    require_once('includes/header.php');

    $alerteRe="";
    $identifiant = null;

    if (isset($_GET["id"])) 
        $identifiant = $_GET["id"];
    else 
        echo "<p>Erreur récupération ID facture</p>";
    
     $sql = "SELECT * FROM factureclient WHERE id = ".$identifiant;
     $result = $conn->query($sql);
     
     if (!$result) 
        echo "<br/>Error modif : " . $conn->error;
     
     $row = $result->fetch_assoc();
     
     if (isset($_POST['ref']))
        $ref = htmlspecialchars($_POST["ref"]);
     
     if (isset($_POST['dateEmission']))
        $dateEmission = htmlspecialchars($_POST["dateEmission"]);
     
     if (isset($_POST['dateRecouvrement']))
        $dateRecouvrement = htmlspecialchars($_POST["dateRecouvrement"]);
     
     if (isset($_POST['tva']))
        $tva = htmlspecialchars($_POST["tva"]);
     
     if (isset($_POST['totalHT']))
        $totalHT = htmlspecialchars($_POST["totalHT"]);
     
     if (isset($_POST['montantTVA']))
        $montantTVA = htmlspecialchars($_POST["montantTVA"]);
     
     if (isset($_POST['totalTTC']))
        $totalTTC = htmlspecialchars($_POST["totalTTC"]);
     
     if (isset($_POST['paye']))
        $paye = htmlspecialchars($_POST["paye"]);

    if(isset($_POST['enregistrer']) AND $_POST['enregistrer'] == 'Enregistrer'){
     $modif = "UPDATE factureclient SET ref = '$ref', dateEmission = '$dateEmission', dateRecouvrement = '$dateRecouvrement', tauxTVA = '$tva', totalHT = '$totalHT', montantTVA = '$montantTVA', totalTTC = '$totalTTC', paye = '$paye'
     WHERE id = '$identifiant' ";
     if ($conn->query($modif) == TRUE) 
        $alerteRe = '<p>Modification enregistrée !</p>';
    }
?>

 <!-- MODIFIER FACTURE CLIENT -->
 <article id="mFacC">
     <h2 class="major">Modifier Facture Client</h2>
     <h3 class="major">Facture</h3>
     <?php echo $alerteRe ?>
     <form method="post">
         <div class="field half first">
            <label for="idClient">Identifiant Client</label>
            <input type="text" value="<?php echo($row["idClient"]); ?>" readonly/>
         </div>
         <div class="field half">
            <label for="email">Reference facture</label>
            <input type="text" name="ref" id="ref" value="<?php echo($row["ref"]);?>" required/>
         </div>
         <div class="field half first">
            <label for="adresse">Date d'émission</label>
            <input type="date" name="dateEmission" id="dateEmission" value="<?php echo($row["dateEmission"]);?>" required/>
         </div>
         <div class="field half">
            <label for="telephone">Date de recouvrement</label>
            <input type="date" name="dateRecouvrement" id="dateRecouvrement" value="<?php echo($row["dateRecouvrement"]);?>" required/>
         </div>
         <div class="field">
            <label for="idClient">Produit</label>
            <input type="text" value="<?php echo($row["produit"]); ?>" readonly/>
         </div>

         <h3 class="major">Montant</h3>
         <div class="field half first">
            <label>Taux TVA</label>
            <input type="text" name="tva" value="<?php echo($row["tauxTVA"]);?>" required/>
         </div>
         <div class="field half">
            <label for="HT">Total HT</label>
            <input type="text" name="totalHT" value="<?php echo($row["totalHT"]);?>" required/>
         </div>
         <div class="field half first">
            <label for="TVA">Montant TVA</label>
            <input type="text" name="montantTVA" value="<?php echo($row["montantTVA"]);?>" required/>
         </div>
         <div class="field half">
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
     <form action="visualiserFactureClient.php#listeFC" method="post">
        <input type="submit" value="Retour liste des factures" name="return" id="return_submit" />
     </form>
 </article>

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

<?php require_once('includes/footer.php'); ?>
