<?php //Gestion de la création d'un fournisseur
     require_once('includes/header.php');

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
         if ($getReq)
            $alerteRe = '<p> Ce fournisseur a été ajouté à votre liste !</p>';
          else 
            $alerteRe = "<p><br/>Error: $req <br> $conn->error</p>";
        $conn->close();
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

 <!-- CREER FOURNISSEUR -->
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

 <?php require_once('includes/footer.php'); ?>