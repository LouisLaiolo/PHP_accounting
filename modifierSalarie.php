<?php //Gestion de la modification d'un salarié
require_once('includes/header.php');
$alerteRe = "";
$identifiant = null;

if (isset($_GET["id"])) 
    $identifiant = $_GET["id"];
else 
    echo "<p>Erreur récupération ID salarié</p>";

 $sql = "SELECT * FROM salarie WHERE id = ".$identifiant;
 $result = $conn->query($sql);
 
 if ($result == FALSE) 
    echo "<br/>Error modif: " . $conn->error;
 
 $row = $result->fetch_assoc();
 
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
     $modif = "UPDATE salarie SET nom = '$nom', adresse = '$adresse', tel = '$tel', mail = '$mail', fonction = '$fonction', salaireNet = '$salaireNet', salaireBrut = '$salaireBrut', datePaiement = '$datePaiement' WHERE id = '$identifiant' ";
     $getReq = $conn->query($modif);
     if ($getReq)
        $alerteRe = '<p> Modification enregistrée !</p>';
      else 
        $alerteRe = "<p><br/>Error: $req <br> $conn->error</p>";
     $conn->close();
 }
?>
 <!-- MODIFIER SALARIE -->
 <article id="McreerS">
     <h2 class="major">Modifier un salarié</h2>
     <?php echo $alerteRe ?>
     <form method="post">
         <div class="field">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="fnom" value="<?php echo($row["nom"]);?>" required/>
         </div>
         <div class="field">
            <label for="email">Email</label>
            <input type="email" name="mail" id="fmail" value="<?php echo($row["mail"]);?>" required/>
         </div>
         <div class="field">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="fadresse" value="<?php echo($row["adresse"]);?>" required/>
         </div>
         <div class="field">
            <label for="telephone">Téléphone</label>
            <input type="tel" name="tel" id="ftel" value="<?php echo($row["tel"]);?>" required/>
         </div>
         <div class="field">
            <label for="fonction">Fonction</label>
            <input type="text" name="fonction" id="fonc" value="<?php echo($row["fonction"]);?>" required/>
         </div>
         <div class="field">
            <label for="fonction">Date de paiement</label>
            <input type="date" name="datePaiement" value="<?php echo($row["datePaiement"]);?>" required/>
         </div>
         <div class="field half first">
            <label for="fonction">Salaire Brut</label>
            <input type="text" name="salaireBrut" id="sb" value="<?php echo($row["salaireBrut"]);?>" required/>
         </div>
         <div class="field half">
            <label for="fonction">Salaire Net</label>
            <input type="text" name="salaireNet" id="sb" value="<?php echo($row["salaireNet"]);?>" required/>
         </div>
         <ul class="actions">
            <li><input type="submit" name="subReg" value="Valider" class="special" /></li>
            <li><input type="reset" value="Reset" /></li>
         </ul>
     </form>
     <form action="visualiserSalarie.php#listeS" method="post">
        <input type="submit" value="Retour liste des salariés" name="return" id="return_submit" />
     </form>
 </article>

<?php require_once('includes/footer.php'); ?>