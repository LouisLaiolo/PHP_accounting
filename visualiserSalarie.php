<?php require_once('includes/header.php'); ?>
 <!-- VISUALISER SALARIE -->
 <article id="listeS">
     <h2 class="major">Liste de vos salariés :</h2>
<?php
         $sql = "SELECT * FROM salarie";
         $result = $conn->query($sql);
         if (!$result)
            echo "<br/>Error select: " . $conn->error;
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                 echo "<strong>NOM : </strong>".$row["nom"]."<br><strong>ADRESSE : </strong>".$row["adresse"]."<br><strong>TELEPHONE : </strong>".$row["tel"]." | <strong>MAIL : </strong>".$row["mail"]."<br><strong>FONCTION : </strong>".$row["fonction"]."<br><strong>SALAIRE BRUT : </strong>".$row["salaireBrut"]." | <strong>SALAIRE NET : </strong>".$row["salaireNet"]."<br><strong>DATE DE PAIEMENT : </strong>".$row["datePaiement"]."<br/>";
                 $monId = $row["id"];
?>
             <br/>
             <div id="optionVisu">
                 <form method="get" action="modifierSalarie.php#McreerS">
                    <input type="submit" value="Modifier" name="modif"/>
                    <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
                 <form method="get" action="suppressionSalarie.php#SuppS">
                    <input type="submit" value="Supprimer" name="supp"/><input type="hidden" name="id" value="<?php echo($monId);?>"/>
                </form>
             </div>
<?php
             }
        } else 
            echo "<p>Vous ne disposez d'aucun salarié.</p>";
        $conn->close();
?>
     <form action="mainMenu.php#salaries" method="post">
        <input type="submit" value="Retour" name="return" id="return_submit" />
     </form>
 </article>

<?php require_once('includes/footer.php'); ?>