<?php //Gestion de la création d'un client
    require_once('includes/header.php');

    $alerteRe = null;
    $identifiant = null;

    if (isset($_GET["id"])) 
        $identifiant = $_GET["id"];
     else 
        echo "<p>Erreur récupération ID Client</p>";

     $sql = "SELECT * FROM client WHERE id = ".$identifiant;
     $result = $conn->query($sql);
     
     if (!$result) 
        echo "<br/>Error modif : " . $conn->error;
     
     $row = $result->fetch_assoc();
     
     if (isset($_POST['fnom']))
        $nom = htmlspecialchars($_POST["fnom"]);
     
     if (isset($_POST['fadresse']))
        $adresse = htmlspecialchars($_POST["fadresse"]);
     
     if (isset($_POST['ftel']))
        $tel = htmlspecialchars($_POST["ftel"]);
     
     if (isset($_POST['fmail']))
        $mail = htmlspecialchars($_POST["fmail"]);

     if(isset($_POST['subReg']) AND $_POST['subReg'] == 'Valider'){
         $alerteRe = '';
         $modif = "UPDATE client SET nom = '$nom', adresse = '$adresse', tel = '$tel', mail = '$mail' WHERE id = '$identifiant' ";
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
 <!-- MODIFIER CLIENT -->
 <article id="McreerC">
     <h2 class="major">Modifier un client</h2>
     <?php echo $alerteRe ?>
     <form method="post">
         <div class="field">
            <label for="nom">Nom</label>
            <input type="text" name="fnom" id="fnom" value="<?php echo($row["nom"]);?>" required/>
         </div>
         <div class="field">
            <label for="email">Email</label>
            <input type="email" name="fmail" id="fmail" value="<?php echo($row["mail"]);?>" required/>
         </div>
         <div class="field">
            <label for="adresse">Adresse</label>
            <input type="text" name="fadresse" id="fadresse" value="<?php echo($row["adresse"]);?>" required/>
         </div>
         <div class="field">
            <label for="telephone">Téléphone</label>
            <input type="tel" name="ftel" id="ftel" value="<?php echo($row["tel"]);?>" required/>
         </div>
         <ul class="actions">
            <li><input type="submit" name="subReg" value="Valider" class="special"/></li>
            <li><input type="reset" value="Reset"/></li>
         </ul>
     </form>
     <form action="visualiserClient.php#listeC" method="post">
        <input type="submit" value="Retour liste des clients" name="return" id="return_submit" />
     </form>
 </article>

 <?php require_once('includes/footer.php'); ?>