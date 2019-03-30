
<?php //Gestion de la création d'un salarié
     require_once('includes/header.php');

     $type = $montant = $dateEmission = $dateRecouvrement = null;
     $alerteRe = null;

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
         $req = "INSERT INTO taxe(type, montant, dateEmission, dateRecouvrement) VALUES('$type','$montant','$dateEmission','$dateRecouvrement');";
         $getReq = $conn->query($req);
         if ($getReq)
            $alerteRe = '<p> Cette taxe a été ajoutée à votre liste !</p>';
         else
            $alerteRe = "<p><br/>Error: $req <br> $conn->error</p>";
         $conn->close();
     }
?>

 <!-- CREER TAXE -->
 <article id="creerT">
     <h2 class="major">Ajouter une taxe</h2>
     <?php echo $alerteRe ?>
     <form method="post">
         <div class="field half first">
            <label for="adresse">Date d'emission</label>
            <input type="date" name="dateEmission" required>
         </div>
         <div class="field half">
            <label for="telephone">Date de recouvrement</label>
            <input type="date" name="dateRecouvrement" required>
         </div>
         <div class="field half first">
            <label for="nom">Type</label>
            <input type="text" name="type" required>
         </div>
         <div class="field half">
            <label for="email">Montant</label>
            <input type="text" name="montant" required>
         </div>
         <ul class="actions">
            <li><input type="submit" name="subReg" value="Valider" class="special" /></li>
            <li><input type="reset" value="Reset" /></li>
         </ul>
     </form>
     <form action="mainMenu.php#taxes" method="post">
        <input type="submit" value="Retour" name="return" id="return_submit" />
     </form>
 </article>

<?php require_once('includes/footer.php'); ?>