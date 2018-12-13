<?php
    session_cache_limiter('private_no_expire, must-revalidate');
    session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>M314 - PROJET</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<SCRIPT LANGUAGE="JavaScript">
            function deconnexion(){
                document.location.href="index.php";
            }
        </SCRIPT>
	</head>
	<body>

	<?php
	
    $servername = "localhost";
    $username = "id4218719_root";
    $password = "code51";
    $dbname = "id4218719_projetcompta";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connexion échouée: " . $conn->connect_error);
	}

	$conn->close();

	?>

	<?php //Gérer les redirections

	if(isset($_POST['decoButton']) AND $_POST['decoButton']=='Se déconnecter'){ //Deconnexion de l'utilisateur
    	$_SESSION = array();
    	session_destroy();
    	echo '<script>deconnexion();</script>';
    }

    ?>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-bar-chart"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Comptabilité simplifiée</h1>

								<?php

								if(isset($_SESSION['nom']) AND isset($_SESSION['prenom'])){
									$nom = $_SESSION['nom'];
									$prenom = $_SESSION['prenom'];
									echo "<p>De $prenom $nom</p>";
								} else {
									echo"<p>Par LAIOLO LOUIS et BOURGEAT KILLIAN</p>";
								}

								?>

							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#clients">Clients</a></li>
								<li><a href="#fournisseurs">Marchands</a></li>
								<li><a href="#salaries">Salariés</a></li>
								<li><a href="#taxes">Taxes</a></li>
								<li><a href="#bilan">Bilan</a></li>
								<li><a href="#deco">Deconnexion</a></li>
								<!--<li><a href="#elements">Elements</a></li>-->
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- CLIENTS -->
							<article id="clients">
								<h3 class="major">Gérer vos clients</h3>
								<!-- Bouton ajouter client -->
								<form action="creerClient.php#creerC" method="post">
    							<input type="submit" value="Ajouter un nouveau client" name="subCreerCli" id="client_submit" />
								</form>
								<p> </p>
								<!-- Bouton consulter liste de clients -->
								<form action="visualiserClient.php#listeC" method="post">
    							<input type="submit" value="Consulter votre liste de clients" name="subConsulterCli" id="listeClient_submit" />
								</form>
								<h3 class="major">Gérer vos factures</h3>
								<!-- Bouton ajouter facture client -->
								<form action="genererFactureClient.php#facC" method="post">
    							<input type="submit" value="Ajouter une nouvelle facture" name="subCreerFacCli" id="factureC_submit" />
								</form>
								<p> </p>
								<!-- Bouton consulter liste facture de clients -->
								<form action="visualiserFactureClient.php#listeFC" method="post">
    							<input type="submit" value="Consulter vos factures" name="subFacCli" id="voirFacCli_submit" />
								</form>
								<!-- Bouton retour -->
								<form action="mainMenu.php" method="post">
                                <input type="submit" value="Retour menu principal" name="return" id="return_submit" class="special" />
                                </form>
							</article>

						<!-- FOURNISSEURS -->
							<article id="fournisseurs">
								<h3 class="major">Gérer vos fournisseurs</h3>
								<!-- Bouton ajouter fournisseur -->
								<form action="creerFournisseur.php#creerF" method="post">
    							<input type="submit" value="Ajouter un nouveau fournisseur" name="subCreerFour" id="fournisseur_submit" />
								</form>
								<p> </p>
								<!-- Bouton consulter liste fournisseur -->
								<form action="visualiserFournisseur.php#listeF" method="post">
    							<input type="submit" value="Consulter votre liste de fournisseurs" name="subConsulterFour" id="listeFournisseur_submit" />
								</form> 
								<h3 class="major">Gérer vos factures</h3>
								<!-- Bouton ajouter facture fournisseur -->
								<form action="genererFactureFournisseur.php#facF" method="post">
    							<input type="submit" value="Ajouter une nouvelle facture" name="subCreerFacFour" id="factureF_submit" />
								</form>
								<p> </p>
								<!-- Bouton consulter liste facture fournisseurs -->
								<form action="visualiserFactureFournisseur.php#listeFF" method="post">
    							<input type="submit" value="Consulter vos factures" name="subFacFour" id="voirFacFour_submit" />
								</form>
								<!-- Bouton retour -->
								<form action="mainMenu.php" method="post">
                                <input type="submit" value="Retour menu principal" name="return" id="return_submit" class="special" />
                                </form>
							</article>

						<!-- SALARIES -->
							<article id="salaries">
								<h3 class="major">Gérer vos salariés</h3>
								<!-- Bouton ajouter salarié -->
								<form action="creerSalarie.php#creerS" method="post">
    							<input type="submit" value="Ajouter un nouveau salarié" name="subCreerSal" id="salarié_submit" />
								</form>
								<p> </p>
								<!-- Bouton consulter liste de salarié -->
								<form action="visualiserSalarie.php#listeS" method="post">
    							<input type="submit" value="Consulter votre liste de salariés" name="subConsulterSal" id="listeSal_submit" />
								</form>
								<!-- Bouton retour -->
								<form action="mainMenu.php" method="post">
                                <input type="submit" value="Retour menu principal" name="return" id="return_submit" class="special" />
                                </form>
							</article>

						<!-- TAXES -->
							<article id="taxes">
								<h3 class="major">Gérer vos Taxes</h3>
								<!-- Bouton ajouter taxes -->
								<form action="creerTaxe.php#creerT" method="post">
    							<input type="submit" value="Ajouter une nouvelle taxe" name="subCreerTax" id="tax_submit" />
								</form>
								<p> </p>
								<!-- Bouton consulter liste de taxes -->
								<form action="visualiserTaxe.php#listeT" method="post">
    							<input type="submit" value="Consulter votre liste de taxes" name="subConsulterTax" id="listeTax_submit" />
								</form>
								<!-- Bouton retour -->
								<form action="mainMenu.php" method="post">
                                <input type="submit" value="Retour menu principal" name="return" id="return_submit" class="special" />
                                </form>
							</article>

						<!-- BILAN -->
							<article id="bilan">
								<h3 class="major">Gérer votre comptabilité</h3>
								<!-- Bouton consulter le bilan -->
								<form action="comptabilite.php#bilan" method="post">
    							<input type="submit" value="Consulter votre Bilan" name="subBil" id="bilan_submit" />
								</form>
								<!-- Bouton retour -->
								<form action="mainMenu.php" method="post">
                                <input type="submit" value="Retour menu principal" name="return" id="return_submit" class="special" />
                                </form>
							</article>

						<!-- DECONNEXION -->
							<article id="deco">
								<h2 class="major">Deconnexion</h2>
								<h3 class="major">A trés bientôt !</h3>
								<form method="post">
    							<input type="submit" value="Se déconnecter" name="decoButton" id="deco_submit" />
								</form>
								<!-- Bouton retour -->
								<form action="mainMenu.php" method="post">
                                <input type="submit" value="Retour menu principal" name="return" id="return_submit" class="special" />
                                </form>
							</article>

						<!-- Elements -->
							<article id="elements">
								<h2 class="major">Elements</h2>

								<section>
									<h3 class="major">Text</h3>
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<h5>Heading Level 5</h5>
									<h6>Heading Level 6</h6>
									<hr />
									<h4>Blockquote</h4>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h4>Preformatted</h4>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
    print 'Iteration ' + i;
    deck.shuffle();
    i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
								</section>

								<section>
									<h3 class="major">Lists</h3>

									<h4>Unordered</h4>
									<ul>
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Alternate</h4>
									<ul class="alt">
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Ordered</h4>
									<ol>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis viverra.</li>
										<li>Felis enim feugiat.</li>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis lorem.</li>
										<li>Felis enim et feugiat.</li>
									</ol>
									<h4>Icons</h4>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
									</ul>

									<h4>Actions</h4>
									<ul class="actions">
										<li><a href="#" class="button special">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions vertical">
										<li><a href="#" class="button special">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Table</h3>
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</section>

								<section>
									<h3 class="major">Buttons</h3>
									<ul class="actions">
										<li><a href="#" class="button special">Special</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button special icon fa-download">Icon</a></li>
										<li><a href="#" class="button icon fa-download">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button special disabled">Disabled</span></li>
										<li><span class="button disabled">Disabled</span></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Form</h3>
									<form method="post" action="#">
										<div class="field half first">
											<label for="demo-name">Name</label>
											<input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe" />
										</div>
										<div class="field half">
											<label for="demo-email">Email</label>
											<input type="email" name="demo-email" id="demo-email" value="" placeholder="jane@untitled.tld" />
										</div>
										<div class="field">
											<label for="demo-category">Category</label>
											<div class="select-wrapper">
												<select name="demo-category" id="demo-category">
													<option value="">-</option>
													<option value="1">Manufacturing</option>
													<option value="1">Shipping</option>
													<option value="1">Administration</option>
													<option value="1">Human Resources</option>
												</select>
											</div>
										</div>
										<div class="field half first">
											<input type="radio" id="demo-priority-low" name="demo-priority" checked>
											<label for="demo-priority-low">Low</label>
										</div>
										<div class="field half">
											<input type="radio" id="demo-priority-high" name="demo-priority">
											<label for="demo-priority-high">High</label>
										</div>
										<div class="field half first">
											<input type="checkbox" id="demo-copy" name="demo-copy">
											<label for="demo-copy">Email me a copy</label>
										</div>
										<div class="field half">
											<input type="checkbox" id="demo-human" name="demo-human" checked>
											<label for="demo-human">Not a robot</label>
										</div>
										<div class="field">
											<label for="demo-message">Message</label>
											<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Send Message" class="special" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</form>
								</section>

							</article>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; IUT Nice - M314 - 2018</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
