<?php

session_start();
if (!(isset($_SESSION["autoriser"]))) {
  header("location:SignInUp.php");
}
?>

<?php
require_once("connexion.php");
$mcin = "NULL";
$mnom = "NULL";
$mprenom = "NULL";
if ((isset($_POST['cin'])) && (isset($_POST['nom'])) && (isset($_POST['prenom']))) {

  $mcin = $_POST['cin'];
  $mnom = $_POST['nom'];
  $mprenom = $_POST['prenom'];
}

$req = "SELECT * FROM  etudiant WHERE cin=$mcin AND nom like '%$mnom%' AND prenom like '%$mprenom%' ";
//$res=mysqli_query($req) or die(mysqli_error('not ok'));
$res = $pdo->query($req);
//require_once("afficherEtudiants.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SCO-ENICAR Afficher Etudiants</title>
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./assets/jumbotron.css" rel="stylesheet">


</head>

<body>

  <?php
  require "header.php";
  ?>


  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Les informations de L'Etudiant </h1>
        <p>Citez le NOM et PRENOM et CIN de l'Etudiant souhaitez</p><br>

      </div>
    </div>


    <!-- le formulaire de l'etudiant à chercher -->
    <div class="container" style="color: blue;">

      <!--  le CIN de L'Etudiant : <input type="text" id="cin" name="cin" value="<?php echo ($mcin) ?>" required />
        le Nom de L'Etudiant :<input type="text" id="nom" name="nom" value="<?php echo ($mnom) ?>" required />
        le Prenom de L'Etudiant : <input type="text" id="prenom" name="prenom" value="<?php echo ($mprenom) ?>" required /> -->

      <form method="POST" action="chercherEtudiant.php">

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Person</span>
          </div>
          <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required>
          <input type="text" class="form-control" placeholder="Prenom" id="prenom" name="prenom" required>
          <input type="text" class="form-control" placeholder="CIN" id="cin" name="cin" required>
        </div>

        <input type="submit" class="btn btn-primary btn-block" value="Chercher"><br>
        <input type="reset" class="btn btn-primary btn-block" value="Reset "><br>


      </form>


      <!-- pattern="[0-9]{8}" title="8 chiffres" : for the cin addition  -->

    </div>


    <!-- the table of all informations in the DB  -->
    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <!--  Ligne Entete -->
            <tr>
              <th> CIN</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Adresse</th>
              <th>Classe</th>
            </tr>
            <!-- partie php d'affichage des informations de l'etudiant choisie   -->
            <?php while ($etu = $res->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
                <td><?php echo ($etu['cin']) ?></td>
                <td><?php echo ($etu['nom']) ?></td>
                <td><?php echo ($etu['prenom']) ?></td>
                <td><?php echo ($etu['email']) ?></td>
                <td><?php echo ($etu['adresse']) ?></td>
                <td><?php echo ($etu['Classe']) ?></td>
              </tr>

            <?php } ?>
            <!-- not yet : the detail of showing the table full of the wanted student !!!!! -->


          </table>
          <br>
        </div>


      </div>
    </div>

  </main>

  <!-- the footer zone -->
  <?php
  require "footer.php";
  ?>




</body>

</html>