<?php //Function Mail
     require_once('includes/header.php');

     $identifiant = null;
     $alerteRe = null;

     if (isset($_GET["id"]))
        $identifiant = $_GET["id"];
     else 
        echo "<p>Erreur récupération ID</p>";
     
     $sql = "SELECT * FROM factureclient WHERE id = ".$identifiant;
     $result = $conn->query($sql);
     
     if ($result == FALSE) 
        echo "Error modif : " . $conn->error;
     
     $row = $result->fetch_assoc();
     
     if($row["paye"]==0){
         mailRappel();
         $alerteRe = "Mail de rappel envoyé !";
         $conn->close();
     } else if ($row["paye"] != 0) {
         $alerteRe = "Cette facture déjà payée";
         $conn->close();
     } else {
         echo "<p>Un problème est survenu, veuillez contacter l'administrateur du site</p>";
         $conn->close();
     }

     function mailRappel(){
         $to = $_SESSION['mail'];
         $headers = 'From: comptaSimple@hotmail.com';
         $subject = "Comptabilité - Mail de rappel";
         $day = date('d/m/Y');
         $hour = date('H:i:s');
         $txt = "[$day à $hour] - Test - Mail de rappel pour paiement";
         mail($to, $subject, $txt, $headers);
    }
?> 
 
 <!-- ENVOYER MAIL -->
 <article id="Mail">
     <?php echo "<h3 class='major'>$alerteRe</h3>"; ?>
     <form action="visualiserFactureClient.php#listeFC" method="post">
        <input type="submit" value="Retour liste des factures" name="return" id="return_submit" />
     </form>
 </article>

 <?php require_once('includes/footer.php'); ?>