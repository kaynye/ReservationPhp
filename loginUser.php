<?php
    require('connect.php');

    if(isset($_POST['email']) && isset($_POST['password']) ){
        echo "je te log";
        echo md5($_POST['password']);
        $insertion=$connexion->prepare('SELECT id,nom,prenom from client where email= :MAIL  and password= :PASSWORD');
                    
        $insertion->bindValue(':MAIL',$_POST['email']);
        $insertion->bindValue(':PASSWORD', md5($_POST['password']));
        
        $insertion->execute();

        $result = $insertion->fetch();
        // $user = $result->fetch_assoc();
        // var_dump($result);
        print_r ($result);
        if ( $result){
            session_start();
            $_SESSION["id"]=$result['id'];
            $_SESSION["nom"]=$result['nom'];
            $_SESSION["prenom"]=$result['prenom'];
            if ($_SESSION['reservation']){
                header("Location: confirmation.php");
            }else{
                header("Location: maRecherche.php");
            }
           
        }else{
            header("Location: login.php?error=1");
        }
        // if($verif){
        //     header("Location: login.php");
        // }
         exit();

    }else{
       header("Location: index.php");
    }

?>
