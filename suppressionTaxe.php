<?php //Suppression Taxe
     require_once('includes/header.php');
     $identifiant = null;

     if (isset($_GET["id"]))
        $identifiant = $_GET["id"];
     else 
        echo "<p>Erreur récupération ID Taxe</p>";

     $sql = "DELETE FROM taxe WHERE id = ".$identifiant;
     $result = $conn->query($sql);

     if ($result == FALSE) 
        echo "<br/>Error delete: " . $conn->error;

     $conn->close();
?>

 <!-- SUPPRIMER TAXE -->
 <article id="SuppT">
     <h3 class="major">Suppression effectuée !</h3>
     <form action="visualiserTaxe.php#listeT" method="post">
        <input type="submit" value="Retour liste des taxes" name="return" id="return_submit" />
     </form>
 </article>

 <?php require_once('includes/footer.php'); ?>