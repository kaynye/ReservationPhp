<?php
 require('connect.php');

 session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat de votre recherche</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="style.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand text-white" href="/">Reservation</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <?php 
        if (!isset($_SESSION["id"])){
            echo '<li class="nav-item"> <a class="nav-link text-white" href="/login.php">Se connecter/ S\'inscrire</a> </li>';
        }
      
      ?>

      </ul>
    </div>
  </div>
</nav>

<div class="box">
    <div class="container">
        <h2>Resultat de votre recherche : </h2>
        <br>
        <br>
     	<div class="row">
			<div class="col-4">
            <h4>Marque disponible</h4>
                <div class="col">
                    <form action="" method="get">
                    <label class='btn btn-info'>
                        <input type='radio' class='form-switch radio_1set' onclick='this.form.submit();' name='marque' value='All' data-id='a'> Tout
                    </label>
                        <?php
                            $sql =  'SELECT DISTINCT Marque FROM `vehicule`';
                            foreach  ($connexion->query($sql) as $row) {
                                echo "
                                <label class='btn btn-info'>
                                    <input type='radio' class='form-switch radio_1set' onclick='this.form.submit();' name='marque' value='$row[Marque]' data-id='a'> $row[Marque]
                                </label>
                            ";
                            }
                        ?>
                    </form>

                    
                </div>
            </div>
            <div class="col-8 row">
                <?php
                    $sql =  'SELECT * FROM vehicule';
                    if (isset($_GET['marque'])){
                    if ($_GET['marque'] != "All"){
                        $sql =  'SELECT * FROM vehicule where Marque="'.$_GET['marque'].'"';
                    }
                    }
                    foreach  ($connexion->query($sql) as $row) {
                        echo "
                        <div class='col-lg-4 col-12 text-center'>
                            <div class='box-column'>
                                <div class='box-top' style='background-image : url(./images/photo/$row[Photo]); background-size: 100% auto;'>
                                </div>
                                <div class='box-bottom'>
                                    <div class='box-title instagram-title'>
                                    $row[Marque] $row[Model] 
                                    </div>
                                    <div class='box-text'>
                                        $row[Tarif] €
                                        <br>
                                        <form action='validation.php' method='post'>
                                            <input type='hidden' name='id' value='$row[id]'>
                                            <button type='submit' name='ok' class='btn btn-secondary'>Reserver</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    ";
                    }
                    ?>
                </div>
                
        
<!-- 		    
	 
		</div>		
    </div>
</div> -->
    
</body>
</html>
