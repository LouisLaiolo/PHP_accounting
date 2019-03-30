<?php //Suppression Fournisseur
    require_once('includes/header.php');

    $identifiant = null;
    if (isset($_GET["id"])) 
        $identifiant = $_GET["id"];
    else 
        echo "<p>Erreur récupération ID fournisseur</p>";
     //requête SQL:
     $sql = "DELETE FROM fournisseur WHERE id = ".$identifiant;
     $result = $conn->query($sql);
     
     if ($result == FALSE) 
        echo "<br/>Error delete: " . $conn->error;

     $conn->close();
?>
 <!-- SUPPRIMER FOURNISSEUR -->
 <article id="SuppF">
     <h3 class="major">Suppression effectuée !</h3>
     <form action="visualiserFournisseur.php#listeF" method="post">
     <input type="submit" value="Retour liste des fournisseurs" name="return" id="return_submit" />
     </form>
 </article>

<?php require_once('includes/footer.php'); ?>