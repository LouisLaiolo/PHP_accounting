<?php require_once('includes/header.php'); ?>
 <!-- VISUALISER  FOURNISSEUR -->
 <article id="listeF">
     <h2 class="major">Liste de vos fournisseurs :</h2>
<?php
     $sql = "SELECT * FROM fournisseur";
     $result = $conn->query($sql);
     if ($result == FALSE)
        echo "<br/>Error select: " . $conn->error;
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
             echo " <strong>NOM</strong> : ".$row["nom"]."<br/><strong>ADRESSE</strong> : ".$row["adresse"]."<br/><strong>TELEPHONE</strong> : ".$row["tel"]." <br/><strong>MAIL</strong> : ".$row["mail"]."<br/>";
             $monId = $row["id"];
?>
             <br/>
             <div id="optionVisu">
                 <form method="get" action="modifierFournisseur.php#McreerF">
                    <input type="submit" value="Modifier" name="modif"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
                 <form method="get" action="suppressionFournisseur.php#SuppF">
                    <input type="submit" value="Supprimer" name="supp"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
             </div>
<?php
             }
     } else 
        echo "<p>Vous ne disposez d'aucun fournisseur</p>";
    $conn->close();
?>
     <form action="mainMenu.php#fournisseurs" method="post">
        <input type="submit" value="Retour" name="return" id="return_submit" />
     </form>
 </article>

<?php require_once('includes/footer.php'); ?>