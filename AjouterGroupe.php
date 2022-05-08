<?php
require_once("connexion.php");

session_start();
if (!(isset($_SESSION["autoriser"]))) {
  header("location:SignInUp.php");
  exit();
}
/* if (date("H") < 18)
  $bienvenue = "Bonjour et bienvenue " .
    $_SESSION["prenomNom"] .
    " dans votre espace personnel";
else
  $bienvenue = "Bonsoir et bienvenue " .
    $_SESSION["prenomNom"] .
    " dans votre espace personnel"; */
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SCO-ENICAR Ajouter Etudiant</title>
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>

  <?php
  require "header.php";
  ?>

  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Ajouter un groupe</h1>
        <p>Remplir le formulaire ci-dessous afin d'ajouter un groupe!</p>
      </div>
    </div>


    <div class="container">
      <?php
      $erreur = "";
      if (!(isset($_SESSION["autoriser"]))) {
        header("location:SignInUp.php");
      } else {
        if (isset($_POST['ajouter'])) {
          $nom = trim($_POST['nom_groupe']);
          $req = $pdo->prepare("select nom_groupe from groupe where nom_groupe=?");
          $req->execute(array($nom));
          $tab = $req->fetchAll();
          if (count($tab) > 0)
            echo '<font color="limegreen"> Groupe existant</font>';
          // Etudiant existe déja
          else {
            $sql = "INSERT INTO groupe (nom_groupe) values (:name)";
            $stm = $pdo->prepare($sql);
            $stm->execute([
              ':name' => $nom,
            ]);
            echo '<font color="limegreen">groupe ajouté</font>';
          }
        }
      }
      ?>

      <form id="myform" method="POST" action="AjouterGroupe.php">
        <!--Nom-->
        <!-- <div class="alert alert-primary" role="alert">
        
        </div> -->
        <div class="form-group">
          <label for="nom">Nom de Groupe:</label><br>
          <input type="text" id="nom" name="nom_groupe" class="form-control" required autofocus>
        </div>
        <div class="erreur"><?php echo $erreur ?></div>
        <!--Bouton Ajouter-->
        <button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block">Ajouter</button>
      </form>

    </div>
  </main>



  <?php
  require "footer.php";
  ?>


</body>

</html>