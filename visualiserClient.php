<?php require_once('includes/header.php'); ?>

 <!-- VISUALISER CLIENT -->
 <article id="listeC">
     <h2 class="major">Liste de vos clients :</h2>
     <?php
         $sql = "SELECT * FROM client";
         $result = $conn->query($sql);
         if ($result == FALSE)
            echo "<br/>Error select: " . $conn->error;
         if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 echo " <strong>NOM</strong> : ".$row["nom"]."<br/><strong>ADRESSE</strong> : ".$row["adresse"]."<br/><strong>TELEPHONE</strong> : ".$row["tel"]." | <strong>MAIL</strong> : ".$row["mail"]."<br>";
                 $monId = $row["id"];
        ?>
                 <br/>
                 <div id="optionVisu">
                     <form method="get" action="modifierClient.php#McreerC">
                        <input type="submit" value="Modifier" name="modif"/>
                        <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                    </form>
                     <form method="get" action="suppressionClient.php#SuppC">
                        <input type="submit" value="Supprimer" name="supp"/>
                        <input type="hidden" name="id" value="<?php echo($monId);?>"/>
                    </form>
                 </div>
    <?php
                 }
        } else
            echo "<p> Vous ne disposez d'aucun client </p>";
        $conn->close();
    ?>
     <form action="mainMenu.php#clients" method="post">
        <input type="submit" value="Retour" name="return" id="return_submit" />
     </form>
 </article>

 <?php require_once('includes/footer.php'); ?>