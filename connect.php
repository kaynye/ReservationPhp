<?php
    $serveur="localhost";
    $login="root";
    $pass="";
    
    try{
        $connexion = new PDO("mysql:host=$serveur;dbname=reservation", $login, $pass);
        // $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Echec de connexion : " ;$e->getMessage();
    }

?>
