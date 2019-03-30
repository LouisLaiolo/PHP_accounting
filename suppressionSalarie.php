<?php 
     require_once('includes/header.php');
     $identifiant = null;

     if (isset($_GET["id"])) 
        $identifiant = $_GET["id"];
     else
        echo "<p>Erreur récupération ID salarié</p>";
     
     $sql = "DELETE FROM salarie WHERE id = ".$identifiant;
     $result = $conn->query($sql);

     if ($result == FALSE) 
        echo "<br/>Error delete: " . $conn->error;

     $conn->close(); 
?>
 <!-- SUPPRIMER SALARIE -->
 <article id="SuppS">
     <h3 class="major">Suppression effectuée !</h3>
     <form action="visualiserSalarie.php#listeS" method="post">
        <input type="submit" value="Retour liste des salariés" name="return" id="return_submit" />
     </form>
 </article>

 <?php require_once('includes/footer.php'); ?>