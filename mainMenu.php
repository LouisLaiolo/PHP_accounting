<?php require_once('includes/header_alt.php'); ?>

				 <div class="logo">
				 	<span class="icon fa-pie-chart"></span>
				 </div>
				 <div class="content">
					 <div class="inner">
						 <h1>Comptabilité simplifiée</h1>
						 	<?php
								 if(isset($_SESSION['nom']) AND isset($_SESSION['prenom'])){
								 	$nom = $_SESSION['nom'];
								 	$prenom = $_SESSION['prenom'];
								 	echo "<p>De $prenom $nom</p>";
								 } else 
								 	echo"<p>Par LAIOLO LOUIS</p>";
						 	?>
					 </div>
				 </div>
				 <nav>
					 <ul>
						 <li><a href="clients.php">Clients</a></li>
						 <li><a href="fournisseurs.php">Marchands</a></li>
						 <li><a href="salaries.php">Salariés</a></li>
						 <li><a href="taxes.php">Taxes</a></li>
						 <li><a href="bilan.php#bilan">Bilan</a></li>
						 <li><a href="index.php" class="quit">Quitter</a></li>
					 </ul>
				 </nav>

<?php require_once('includes/footer_alt.php'); ?>