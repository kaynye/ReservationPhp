<?php
 require('connect.php');
session_start();

 if(isset($_POST['id']) && isset($_POST['valider'])){
    $id=$_POST['id'];
     
 }else{
    if (isset($_SESSION["reservation"])){
        header("Location: confirmation.php");
     }else{
        header("Location: index.php");
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="style.css" rel="stylesheet">
</head>
<body>


<?php
    $insertion=$connexion->prepare('SELECT * from vehicule where id= :id');
    $insertion->bindValue(':id',$id);
    $insertion->execute();
    $result = $insertion->fetch();
?>

<div style="width:70%;margin-right:auto; margin-left:auto;margin-top: 60px;">
<h3 class="text-success text-center">Votre commande a bien eté prise en compte</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>
      <th scope="col">Votre commande</th>
      <th scope="col">Montant</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td> <img width="50px" height="50px" src="./images/photo/<?php echo $result['Photo'];?>"/></td>
      <td><?php echo $result["Marque"]." ".$result["Model"] ?> </td>
      <td><?php echo $result["Tarif"]?> </td>
    </tr>
  </tbody>
</table>
<a href="/" ><button class="btn btn-primary">Retourner à l'acceuil</button></a>

</div>


</body>
</html>
