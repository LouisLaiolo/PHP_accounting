<?php //Suppression Facture Client
    require_once('includes/header.php');
    $identifiant = null;

    if (isset($_GET["id"])) 
        $identifiant = $_GET["id"];
    else 
        echo "<p>Erreur récupération ID facture</p>";

     //requête SQL:
     $sql = "DELETE FROM factureclient WHERE id = ".$identifiant;
     $result = $conn->query($sql);
     
     if (!$result) 
        echo "<br/>Error delete: " . $conn->error;
     
     $conn->close();
?>
 <!-- SUPPRIMER FACTURE CLIENT -->
 <article id="SuppFC">
     <h3 class="major">Suppression effectuée !</h3>
     <form action="visualiserFactureClient.php#listeFC" method="post">
        <input type="submit" value="Retour liste des factures" name="return" id="return_submit" />
     </form>
 </article>

<?php require_once('includes/footer.php'); ?>