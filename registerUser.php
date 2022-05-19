<?php
    require('connect.php');

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['adresse'])  ){
        $insertion=$connexion->prepare('INSERT INTO client ( `nom`, `prenom` ,`email`, `adresse`, `password`) VALUES(:NOM, :PRENOM, :MAIL, :ADRESSE, :PASSWORD)');
                    
        $insertion->bindValue(':NOM',$_POST['nom']);
        $insertion->bindValue(':PRENOM',$_POST['prenom']);
        $insertion->bindValue(':MAIL',$_POST['email']);
        $insertion->bindValue(':ADRESSE',$_POST['adresse']);
        $insertion->bindValue(':PASSWORD', md5($_POST['password']));

        $verif=$insertion->execute();
        echo ($verif);
        if($verif){
            header("Location: login.php");
        }
         exit();

    }else{
       header("Location: index.php");
    }

?>
