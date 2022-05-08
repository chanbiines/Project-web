<?php
include("connexion.php");

session_start();

if (!(isset($_SESSION["autoriser"]))) {
  header("location:SignInUp.php");
}
$req = "select * from groupe";
//$res=mysqli_query($req) or die(mysqli_error('not ok'));
$res = $pdo->query($req);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SCO-ENICAR Etudiants Par CLasse</title>
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>

<body onload="refresh()">

  <?php
  require_once('header.php');

  ?>



  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Supprimer les groupes</h1>
        <p>Cliquer sur le bouton afin d'actualiser la liste!</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <!--Ligne Entete-->
            <tr>
              <th>ID</th>
              <th>Nom_Groupe</th>
              <th>Supprimer</th>
            </tr>
            <?php while ($gru = $res->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>

                <td><?php echo ($gru['id_groupe']) ?></td>
                <td><?php echo ($gru['nom_groupe']) ?></td>
                <td><a onclick="return confirm('Are you sure to delete ?');" href="supprimerGr.php?id_groupe=<?php echo ($gru['id_groupe']) ?>" class="btn btn-danger btn-sm">Supprimer</a></td>
              </tr>

            <?php } ?>
          </table>

          <br>
        </div>
      </div>
    </div>

  </main>

  <?php
  require_once('footer.php');

  ?>


  
</body>

</html>