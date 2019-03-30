<?php require_once('includes/header.php'); ?>
 <!-- CONSULTER LE BILAN -->
 <article id="bilan">
     <h2 class="major">Votre bilan comptable</h2> 
     <h3>Sur la période de votre choix : </h3>
     <form method="post">
         <div class="field half first">
            <label>Date début</label>
            <input type="date" name="dateDebut" />
         </div>
         <div class="field half"> 
            <label>Date fin</label>
            <input type="date" name="dateFin" />
         </div>
         <input type="submit" name="submit" value="Calculer"/>
     </form>
<?php
     $totalClient = 0;
     $resteClient = 0;
     $totalFournisseur = 0;
     $resteFournisseur = 0;
     $totalSalaire = 0;
     $totalTaxe = 0;
     $totalTVAClient = 0;
     $totalTVAFour = 0;
     $totalHTClient = 0;
     $totalHTFour = 0;
     $bilan = 0;

     if (isset($_POST['dateDebut']))
        $dateDebut = htmlspecialchars($_POST["dateDebut"]);
     
     if (isset($_POST['dateFin']))
        $dateFin = htmlspecialchars($_POST["dateFin"]);
     
     if(isset($_POST['submit']) AND $_POST['submit'] == 'Calculer'){
         echo "<p><strong>DATE DE DEBUT :</strong> ".$dateDebut." | <strong>DATE DE FIN :</strong> ".$dateFin."<br/><br/></p>";
         $sql1 = 'SELECT * from factureclient where dateRecouvrement BETWEEN"'.$dateDebut.'"AND"'.$dateFin.'" OR dateEmission BETWEEN"'.$dateDebut.'"AND"'.$dateFin.'"';
         $result1 = $conn->query($sql1);

         if ($result1 == FALSE)
            echo "<br/>Error select: " . $conn->error;

         if ($result1->num_rows > 0) {
             while($row = $result1->fetch_assoc()) {
                 if($row["paye"]==1){
                     $totalClient = $totalClient+$row["totalTTC"];
                     $totalTVAClient = $totalTVAClient+$row["montantTVA"];
                     $totalHTClient = $totalHTClient+$row["totalHT"];
                 } else 
                     $resteClient = $resteClient+$row["totalTTC"];
             }
         }
         
         $sql2 = 'SELECT * from facturefournisseur where dateRecouvrement BETWEEN"'.$dateDebut.'"AND"'.$dateFin.'" OR dateFacture BETWEEN"'.$dateDebut.'"AND"'.$dateFin.'"';
         $result2 = $conn->query($sql2);
         
         if ($result2 == FALSE)
            echo "<br/>Error select: " . $conn->error;
         
         if ($result2->num_rows > 0) {
             while($row = $result2->fetch_assoc()) {
                 if($row["paye"] == 1){
                     $totalFournisseur = $totalFournisseur + $row["totalTTC"];
                     $totalTVAFour = $totalTVAFour + $row["montantTVA"];
                     $totalHTFour = $totalHTFour + $row["totalHT"];
                 } else 
                     $resteFournisseur = $resteFournisseur+$row["totalTTC"];
             }
         }
         
         $sql3 = 'SELECT * from salarie where datePaiement BETWEEN"'.$dateDebut.'"AND"'.$dateFin.'"';
         $result3 = $conn->query($sql3);
         
         if ($result3 == FALSE)
            echo "<br/>Error select: " . $conn->error;

         if ($result3->num_rows > 0) {
             while($row = $result3->fetch_assoc()) {
                $totalSalaire = $totalSalaire+$row["salaireBrut"];
             }
         }
         
         $sql4 = 'SELECT * from taxe where dateRecouvrement BETWEEN"'.$dateDebut.'"AND"'.$dateFin.'"';
         $result4 = $conn->query($sql4);
         
         if ($result4 == FALSE)
            echo "<br/>Error select: " . $conn->error;
         
         if ($result4->num_rows > 0) {
            while($row = $result4->fetch_assoc()) {
                $totalTaxe = $totalTaxe+$row["montant"];
            }
         }
     } //fin if ligne 24
     
     echo "<strong>Total HT Client :</strong> ".$totalHTClient."€<br/>";
     echo "<strong>Total TVA Client :</strong> ".$totalTVAClient."€<br/>";
     echo "<strong>Total Client :</strong> ".$totalClient."€ | Non payées (".$resteClient."€)<br/><br/>";
     echo "<strong>Total HT Fournisseur :</strong> ".$totalHTFour."€<br/>";
     echo "<strong>Total TVA Fournisseur :</strong> ".$totalTVAFour."€<br/>";
     echo "<strong>Total Fournisseur :</strong> ".$totalFournisseur."€ | Non payées (".$resteFournisseur."€)<br/><br/>"; //Solde = Facture pas encore payée 
     echo "<strong>Total Charge Salariale :</strong> ".$totalSalaire."€<br/>";
     echo "<strong>Total Taxe :</strong> ".$totalTaxe."€<br/><br/>";
     $bilan = $totalClient-$totalFournisseur-$totalSalaire-$totalTaxe;
     echo "<strong>BILAN :</strong> ".$bilan."€";

     $conn->close();
    
?>
     <form action="mainMenu.php" method="post">
         <br/>
         <input type="submit" value="Retour" name="return" id="return_submit" class="special"/>
     </form>
 </article>
 <?php require_once('includes/footer.php'); ?>