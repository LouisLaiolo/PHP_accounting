<?php require_once('includes/header.php'); ?>

 <!-- VISUALISER FACTURE CLIENT -->
 <article id="listeFC">
     <h2 class="major">Factures - clients :</h2>
<?php
         $sql1 = "SELECT * FROM factureclient";
         $result1 = $conn->query($sql1);
         
         if ($result1 == FALSE)
            echo "<br/>Error select : " . $conn->error;
         
         if ($result1->num_rows > 0) {
             while($row = $result1->fetch_assoc()) {
                 echo "<strong>IDENTIFIANT CLIENT :</strong> ".$row["idClient"]." <br/><strong>REFERENCE FACTURE :</strong> ".$row["ref"].
                 "<br/><strong>DATE D'EMISSION :</strong> ".$row["dateEmission"]." | <strong>DATE DE RECOUVREMENT :</strong> ".$row["dateRecouvrement"]."<br><strong>PRODUIT :</strong> ".$row["produit"].
                 "<br/><strong>TAUX TVA :</strong> ".$row["tauxTVA"]." | <strong>TOTAL HT :</strong> ".$row["totalHT"]." | <strong>MONTANT TVA :</strong> ".$row["montantTVA"].
                 " | <strong>TOTAL TTC :</strong> ".$row["totalTTC"]."<br/><strong>FACTURE PAYEE :</strong> ".$row["paye"]."<br/>";
                 $monId = $row["id"];
?>
             <br/>
             <div id="optionVisu">
                 <form method="get" action="modifierFactureClient.php#mFacC">
                    <input type="submit" value="Modifier" name="modif"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
                 <form method="get" action="suppressionFactureClient.php#SuppFC">
                    <input type="submit" value="Supprimer" name="supp"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
                 <form method="get" action="envoyerMail.php#Mail">
                    <input type="submit" value="Mail de rappel" name="mail"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
             </div>
<?php
         }
     } else 
        echo "<p>Aucune facture n'est disponible</p>";
     $conn->close();
?>
     <form action="mainMenu.php#clients" method="post">
        <input type="submit" value="Retour" name="return" id="return_submit" />
     </form>
 </article>
<?php require_once('includes/footer.php'); ?>