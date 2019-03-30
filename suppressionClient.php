<?php //Suppression Client
    require_once('includes/header.php');
    $identifiant = null;

    if (isset($_GET["id"])) 
        $identifiant = $_GET["id"];
    else 
        echo "<p>Erreur récupération ID Client</p>";
    
     //requête SQL:
     $sql = "DELETE FROM client WHERE id = ".$identifiant;
     $result = $conn->query($sql);
     
     if ($result == FALSE) 
        echo "<br/>Error delete: " . $conn->error;
     $conn->close();
?>
 <!-- SUPPRIMER CLIENT -->
 <article id="SuppC">
     <h3 class="major">Suppression effectuée !</h3>
     <form action="visualiserClient.php#listeC" method="post">
        <input type="submit" value="Retour liste des clients" name="return" id="return_submit" />
     </form>
 </article>

<?php require_once('includes/footer.php'); ?>