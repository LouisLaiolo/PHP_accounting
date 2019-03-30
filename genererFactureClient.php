
<?php //Générer facture client
	require_once('includes/header.php');

	$idClient=$ref=$dateEmission=$dateRecouvrement=$produit=$tva=$totalHT=$montantTVA=$totalTTC=$paye=$alerteRe="";

	if (isset($_POST['idClient']))
		$idClient = htmlspecialchars($_POST["idClient"]);

	if (isset($_POST['ref']))
		$ref = htmlspecialchars($_POST["ref"]);

	if (isset($_POST['dateEmission']))
		$dateEmission = htmlspecialchars($_POST["dateEmission"]);

	if (isset($_POST['dateRecouvrement']))
		$dateRecouvrement = htmlspecialchars($_POST["dateRecouvrement"]);

	if (isset($_POST['produit']))
		$produit = htmlspecialchars($_POST["produit"]);

	if (isset($_POST['tva']))
		$tva = htmlspecialchars($_POST["tva"]);

	if (isset($_POST['totalHT']))
		$totalHT = htmlspecialchars($_POST["totalHT"]);

	if (isset($_POST['montantTVA']))
		$montantTVA = htmlspecialchars($_POST["montantTVA"]);

	if (isset($_POST['totalTTC']))
		$totalTTC = htmlspecialchars($_POST["totalTTC"]);

	if (isset($_POST['paye']))
		$paye = htmlspecialchars($_POST["paye"]);

	if(isset($_POST['enregistrer']) AND $_POST['enregistrer'] == 'Enregistrer'){
		$req = "INSERT INTO factureclient(idClient, ref, dateEmission, dateRecouvrement, produit, tauxTVA, totalHT, montantTVA, totalTTC, paye)
		VALUES('$idClient','$ref','$dateEmission','$dateRecouvrement','$produit','$tva','$totalHT','$montantTVA','$totalTTC','$paye');";
		if ($conn->query($req) == TRUE) {
			$alerteRe = '<p>Facture enregistrée !</p>';
		}
	}
?>
<!-- CREER FACTURE CLIENT -->
<article id="facC">
	<h2 class="major">Facture Client</h2>
	<h3 class="major">Facture</h3>
	<?php echo $alerteRe ?>
	<form method="post">
		<div class="field">
			<label for="telephone">Service</label>
			<select name="service" required>
				<?php
					if(isset($_POST['valider1']) AND $_POST['valider1'] == 'Valider service'){ // Garder la valeur du select après la validation
						if(isset($_POST['service'])){
							$sql8 = 'SELECT * FROM service where id="'.$_POST["service"].'"';
							$result8 = $conn->query($sql8);
							$row = $result8->fetch_assoc();
							if ($result8 == FALSE)
								echo "<br/>Error select: " . $conn->error;
							 else 
								echo '<option selected>'.$row["nom"].'</option>';
						}
					} else {
						$sql2 = "SELECT * FROM service";
						$result2 = $conn->query($sql2);
						if ($result2 == FALSE)
							echo "<br/>Error select: " . $conn->error;
						if ($result2->num_rows > 0) {
							while($row = $result2->fetch_assoc()) {
				?>
								<option value="<?php echo $row["id"]; ?>"><?php echo $row["nom"]; ?></option>
				<?php 
							}
						} else 
							echo "<br/> Aucun resultat...";
					}
				?>
			</select>
		</div>
		<div class="field">
			<input type="submit" name="valider1" value="Valider service" class="special" />
		</div>
		<div class="field">
			<label for="produits">Produit</label>
			<select name="produit">
				<?php
					if(isset($_POST['valider2']) AND $_POST['valider2'] == 'Valider produit'){ // Garder la valeur de input après validation
						if(isset($_POST['produit'])){
							$sql7 = 'SELECT * FROM produit where id="'.$_POST["produit"].'"';
							$result7 = $conn->query($sql7);
							$row = $result7->fetch_assoc();
							if ($result7 == FALSE)
								echo "<br/>Error select: " . $conn->error;
							else 
								echo '<option selected>'.$row["appellation"].'</option>';
						}
					} else {
						if(isset($_POST['valider1']) AND $_POST['valider1']=='Valider service'){
							$sql3 = 'SELECT * FROM produit where idService="'.$_POST["service"].'"';
							$result3 = $conn->query($sql3);
							if ($result3 == FALSE)
								echo "<br/>Error select: " . $conn->error;
							if ($result3->num_rows > 0) {
								while($row = $result3->fetch_assoc()) {
				?>
								<option value="<?php echo $row["id"]; ?>"><?php echo $row["appellation"]; ?></option>
				<?php 
								}
							} else 
								echo "<br/> Aucun resultat...";
						} 
					}
				?>
			</select>
		<?php 
			if(isset($_POST['valider1']) AND $_POST['valider1'] == 'Valider service')
				echo '<br><div class="field"><input type="submit" name="valider2" value="Valider produit" class="special" /></div>';
		?>
		</div>
		<div class="field half first">
			<label for="idClient">Identifiant Client</label>
			<select name="idClient">
				<?php
					$sql = "SELECT id FROM client";
					$result = $conn->query($sql);
					if ($result == FALSE)
						echo "<br/>Error select: " . $conn->error;
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
				?>
							<option><?php echo $row["id"]; ?></option>
				<?php 
						}
					} else 
						echo "<br/> Aucun resultat...";
				?>
			</select>
		</div>
		<div class="field half">
			<label for="email">Reference facture</label>
			<input type="text" name="ref" id="ref" />
		</div>
		<div class="field half first">
			<label for="adresse">Date d'émission</label>
			<input type="date" name="dateEmission" id="dateEmission" />
		</div>
		<div class="field half">
			<label for="telephone">Date de recouvrement</label>
			<input type="date" name="dateRecouvrement" id="dateRecouvrement" />
		</div>

		<h3 class="major">Montant</h3>
		<div class="field half first">
			<label>Taux TVA</label>
			<input type="text" name="tva" value="
				<?php
					$sql4 = "SELECT * FROM tva";
					$result4 = $conn->query($sql4);
					$row = $result4->fetch_assoc();
					if ($result4 == FALSE)
						echo "<br/>Error select: " . $conn->error;
					else 
						echo $row["montant"]."%";
				?>" />
		</div>
		<div class="field half">
			<label for="HT">Total HT</label>
			<input type="text" name="totalHT" value="
				<?php 
					if(isset($_POST['valider2']) AND $_POST['valider2'] == 'Valider produit'){
						$sql5 = 'SELECT * FROM produit where id="'.$_POST["produit"].'"';
						$result5 = $conn->query($sql5);
						$row = $result5->fetch_assoc();
						if ($result5 == FALSE)
							echo "<br/>Error select: " . $conn->error;
						else 
							echo $row["montantHT"];
					}
				?>"/>
		</div>
		<div class="field half first">
			<label for="TVA">Montant TVA</label>
			<input type="text" name="montantTVA" value="
				<?php
					if(isset($_POST['valider2']) AND $_POST['valider2'] == 'Valider produit'){
						$totalHT = $row["montantHT"];
						$sql6 = "SELECT * FROM tva";
						$result6 = $conn->query($sql6);
						$row = $result6->fetch_assoc();
						if ($result6 == FALSE)
							echo "<br/>Error select: " . $conn->error;
						else 
							$tauxTVA = $row["montant"];
						$montantTVA = $totalHT*$tauxTVA/100;
						echo $montantTVA;
					}
				?>"/>
		</div>
		<div class="field half">
			<label for="TTC">Total TTC</label>
			<input type="text" name="totalTTC" value="
				<?php
					if(isset($_POST['valider2']) AND $_POST['valider2'] == 'Valider produit')
						echo $montantTVA+$totalHT;
				?>"/>
		</div>
		<div class="field">
			<label for="telephone">Facture payée</label>
			<input type="radio" name="paye" value="0" id="non" onclick="Radio(this.id);" checked/> <label for="non">Non</label>
			<input type="radio" name="paye" value="1" id="oui" onclick="Radio(this.id);" /> <label for="oui">Oui</label>
		</div>
		<ul class="actions">
			<li><input type="submit" name="enregistrer" value="Enregistrer" class ="special"/></li>
			<li><input type="reset" value="Reset"/></li>
		</ul>
	</form>
	 <form action="mainMenu.php#clients" method="post">
	 	<input type="submit" value="Retour" name="return" id="return_submit" />
	 </form>
</article>

<script type="text/javascript">

function Radio(id){
	switch(id){
		case "non" :
			document.getElementById("non").checked = true;
			document.getElementById("oui").checked = false;
		break;
		case "oui" :
			document.getElementById("non").checked = false;
			document.getElementById("oui").checked = true;
		break;
	}
}

</script>

<?php require_once('includes/footer.php'); ?>