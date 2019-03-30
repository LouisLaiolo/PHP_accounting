
<?php //Connexion BDD
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "id4218719_projetcompta";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
        die("Connexion échouée: " . $conn->connect_error);
?>