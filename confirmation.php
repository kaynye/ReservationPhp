<?php
 require('connect.php');
session_start();

 if(isset($_POST['id']) && isset($_POST['ok'])){
    if (!isset($_SESSION["id"])){
        $_SESSION['reservation']=$_POST['id'];
        header("Location: login.php");
     }
     $id = $_POST["id"];
     
 }else{
    if (!isset($_SESSION["reservation"])){
        header("Location: index.php");
     }else{
        $id = $_SESSION["reservation"];
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulitif de ommande </title>
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
<form action="validation.php" method="POST">
  <input type='hidden' name='id' value='<?php echo $id;?>'>
  <button type='submit' name='valider' class="btn btn-info float-right"> Valider la commande</button>
</form>

</div>


</body>
</html>
