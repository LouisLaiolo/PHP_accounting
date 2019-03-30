<?php require_once('includes/header.php'); ?>

 <!-- VISUALISER FACTURE FOURNISSEUR -->
 <article id="listeFF">
     <h2 class="major">Factures - fournisseurs :</h2>
<?php
         $sql2 = "SELECT * FROM facturefournisseur";
         $result2 = $conn->query($sql2);
         
         if ($result2 == FALSE)
            echo "<br/>Error select: " . $conn->error;
         
         if ($result2->num_rows > 0) {
             while($row = $result2->fetch_assoc()) {
                 echo "<strong>IDENTIFIANT FOURNISSEUR :</strong> ".$row["idFournisseur"]." <br/><strong>REFERENCE FACTURE :</strong> ".$row["ref"]."<br/><strong>DESCRIPTION :</strong> "
                 .$row["description"]."<br/><strong>DATE FACTURE :</strong> ".$row["dateFacture"]." | <strong>DATE DE RECOUVREMENT :</strong> ".$row["dateRecouvrement"].
                 "<br/><strong>TOTAL HT :</strong> ".$row["totalHT"]." | <strong>MONTANT TVA :</strong> ".$row["montantTVA"].
                 " | <strong>TOTAL TTC :</strong> ".$row["totalTTC"]."<br/><strong>FACTURE PAYEE :</strong> ".$row["paye"]."<br/>";
                 $monId = $row["id"];
?>
             <br/>
             <div id="optionVisu">
                 <form method="get" action="modifierFactureFournisseur.php#mFacF">
                    <input type="submit" value="Modifier" name="modif"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
                 <form method="get" action="suppressionFactureFournisseur.php#SuppFF">
                    <input type="submit" value="Supprimer" name="supp"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
             </div>
<?php
         }
     } else 
        echo "<p>Vous n'avez aucune facture pour fournisseur</p>";
     $conn->close();
?>
     <form action="mainMenu.php#fournisseurs" method="post">
        <input type="submit" value="Retour" name="return" id="return_submit" />
     </form>
 </article>

 <?php require_once('includes/footer.php'); ?>