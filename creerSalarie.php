<?php //Gestion de la création d'un salarié
     require_once('includes/header.php');

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
         if ($getReq)
            $alerteRe = '<p> Ce salarié a été ajouté à votre liste !</p>';
        else 
            $alerteRe = "<p><br/>Error: $req <br> $conn->error</p>";
        $conn->close();
     }
?>

 <!-- CREER SALARIE -->
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

<?php require_once('includes/footer.php'); ?>
