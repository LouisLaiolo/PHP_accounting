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
            function connexion(){
                document.location.href="mainMenu.php";
            }
        </SCRIPT>
	</head>
	<body>

<?php //Connexion BDD
	
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

?>

<?php //Gestion de la connexion au compte utilisateur
    
    $email = null;
    $nom = "kek";
    $prenom = "kek";
    $password1 = null;
    $password2 = null;

    $alerteCo = null;
    $alerteRe = null;
    
    if (isset($_POST['password']))
        $password1 = htmlspecialchars($_POST["password"]);
    if (isset($_POST['email']))
         $email = htmlspecialchars($_POST["email"]);

    //Compare les identifiants du formulaire avec ceux de la base de données
    $sql = "SELECT * FROM utilisateur WHERE mail = '".$email."' AND password = '".$password1."'";
    $result = $conn->query($sql);
    
    //Identifiant valide ou invalide
    if(isset($_POST['submit']) AND $_POST['submit']=='Valider'){
        if ($result->num_rows == 0){ 
            $alerteCo = '<p>Mauvais identifiant ou mot de passe !</p>';
            $conn->close();
        }else{ 

        	$sqlNom = "SELECT nom FROM utilisateur WHERE mail = '".$email."' AND password = '".$password1."'";
    		$userNom = $conn->query($sqlNom);

    		while ($row = $userNom->fetch_assoc()) { $nom = $row['nom'];} //On recupere le nom de l'utilisateur

    		$sqlPrenom = "SELECT prenom FROM utilisateur WHERE mail = '".$email."' AND password = '".$password1."'";
    		$userPrenom = $conn->query($sqlPrenom);

    		while ($row = $userPrenom->fetch_assoc()) {$prenom = $row['prenom'];} //On recupere le prenom de l'utilisateur

            $_SESSION['mail'] = $email;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $conn->close();
            echo '<script>connexion();</script>';
        } 
    }
?>

<?php //Gestion de l'inscription d'un utilisateur

	if (isset($_POST['femail']))
            $email = htmlspecialchars($_POST["femail"]);
    
    if (isset($_POST['fpassword1']))
            $password1 = htmlspecialchars($_POST["fpassword1"]);
    
    if (isset($_POST['fpassword2']))
            $password2 = htmlspecialchars($_POST["fpassword2"]);

    if (isset($_POST['fnom']))
            $nom = htmlspecialchars($_POST["fnom"]);

    if (isset($_POST['fprenom']))
            $prenom = htmlspecialchars($_POST["fprenom"]);

    if(isset($_POST['subReg']) AND $_POST['subReg']=='Valider'){

	    if(!verify_password($password1,$password2)){
	    		$alerteRe = '<p>Veuillez retaper votre mot de passe !</p>';
	    }else{
	    		$alerteRe = '<p>Inscription réussie !</p>';
	        	$req = "INSERT INTO utilisateur(mail, nom, prenom, password, date_inscription)VALUES('$email', '$nom', '$prenom', '$password1', CURDATE());";
	        	$getReq = $conn->query($req);
	    }
	    	if ($getReq){
			 		echo "Inscription réussie";
			} else {
			  		echo "<br/>Error: " . $req . "<br>" . $conn->error;
			  		$conn->close();
		   	}
	}
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
       
function verify_password($password1, $password2){
    if($password1==$password2)
        return true;
    else
        return false;
}        
   
?>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-cog"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Comptabilité simplifiée</h1>
								<p>Par LAIOLO LOUIS et BOURGEAT KILLIAN</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#co">Connexion</a></li>
								<li><a href="#ins">Inscription</a></li>
								<!--<li><a href="#elements">Elements</a></li>-->
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- CONNEXION -->
							<article id="co">
								<h2 class="major">Connexion</h2>
								<?php echo $alerteCo; ?>
								<form method="post">
									<div class="field half first">
										<label for="mail">Email</label>
										<input type="email" name="email" id="userEmail" maxlength="45" required/>
									</div>
									<div class="field half">
										<label for="word">Mot de passe</label>
										<input type="password" name="password" id="userPassword" required/>
									</div>
			
									<ul class="actions">
										<li><input type="submit" name="submit" value="Valider" class ="special"/></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
								<!-- Bouton retour -->
								<form action="index.php" method="post">
                                <input type="submit" value="Retour accueil" name="return" id="return_submit" />
                                </form>
							</article>

						<!-- INSCRIPTION -->
							<article id="ins">
								<h2 class="major">Inscription</h2>
								<?php echo $alerteRe ?>
								<form method="post">
									<div class="field half first">
										<label for="password">Nom</label>
										<input type="text" name="fnom" id="nom" required/>
									</div>
									<div class="field half">
										<label for="confirm">Prenom</label>
										<input type="text" name="fprenom" id="prenom" required/>
									</div>
									<div class="field">
										<label for="email">Email</label>
										<input type="email" name="femail" id="registerEmail" maxlength="45" required/>
									</div>
									<div class="field half first">
										<label for="password">Mot de passe</label>
										<input type="password" name="fpassword1" id="password" required/>
									</div>
									<div class="field half">
										<label for="confirm">Confirmer mot de passe</label>
										<input type="password" name="fpassword2" id="cPassword" required/>
									</div>
									<ul class="actions">
										<li><input type="submit" name="subReg" value="Valider" class="special" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
								<form action="index.php" method="post">
                                <input type="submit" value="Retour accueil" name="return" id="return_submit" />
                                </form>
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
