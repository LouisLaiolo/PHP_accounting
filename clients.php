<?php require_once('includes/header_alt.php'); ?>

<div class="logo">
	<span class="icon fa-users"></span>
</div>
<div class="content">
	<div class="inner">
		<h1>Vos clients</h1>
		<p>Liste et factures</p>
	</div>
</div>
<nav>
	<ul>
		<li><a href="creerClient.php#creerC">Nouveau</a></li>
		<li><a href="visualiserClient.php#listeC">Consulter</a></li>
		<li><a href="genererFactureClient.php#facC">Facturer</a></li>
		<li><a href="visualiserFactureClient.php#listeFC">Factures</a></li>
		<li><a href="mainMenu.php" class="quit">Retour</a></li>
	</ul>
</nav>

<?php require_once('includes/footer_alt.php'); ?>