<?php require_once('includes/header.php'); ?>
<!-- VISUALISER TAXE -->
 <article id="listeT">
     <h2 class="major">Liste de vos taxes :</h2>
<?php
         $sql = "SELECT * FROM taxe";
         $result = $conn->query($sql);
         
         if ($result == FALSE)
            echo "<br/>Error select: " . $conn->error;
         
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 echo "<strong>IDENTIFIANT TAXE :</strong> ".$row["id"]."<br/><strong>TYPE :</strong> ".$row["type"].
                      "<br/><strong>MONTANT :</strong> ".$row["montant"]."<br/><strong>DATE D'EMISSION :</strong> ".$row["dateEmission"].
                      " | <strong>DATE DE RECOUVREMENT :</strong> ".$row["dateRecouvrement"]."<br/>";
                 $monId = $row["id"];
?>
                 <br/>
                 <div id="optionVisu">
                     <form method="get" action="modifierTaxe.php#McreerT">
                        <input type="submit" value="Modifier" name="modif"/>
                        <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                    </form>
                     <form method="get" action="suppressionTaxe.php#SuppT">
                        <input type="submit" value="Supprimer" name="supp"/>
                        <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                    </form>
                 </div>
<?php
             }
         } else 
            echo "<p>Aucune taxe disponible</p>";
         $conn->close();
?>
        <form action="mainMenu.php#taxes" method="post">
            <input type="submit" value="Retour" name="return" id="return_submit" />
        </form>
    </article>

<?php require_once('includes/footer.php'); ?>
