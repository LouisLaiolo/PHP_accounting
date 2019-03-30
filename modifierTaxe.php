<?php //Gestion de la modification d'un salarié
     require_once('includes/header.php');

     $alerteRe = "";
     $identifiant = null;

     if (isset($_GET["id"]))
        $identifiant = $_GET["id"];
     else
        echo "<p>Erreur récupération ID Taxe</p>";
     
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
         if ($getReq)
            $alerteRe = '<p> Modification enregistrée !</p>';
         else 
            $alerteRe = "<p><br/>Error: $req <br> $conn->error</p>";
         $conn->close();
     }
?>
 
 <!-- MODIFIER TAXE -->
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

<?php require_once('includes/footer.php'); ?>