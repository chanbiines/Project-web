<?php
include('connexion.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SCO-ENICAR Saisir Absence</title>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SCO-ENICAR Afficher group</title>
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>

  <?php

  require_once('header.php');
  ?>



  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Signaler l'absence pour un etudiant </h1>
        <p>Pour signaler, annuler ou justifier une absence,!</p>
      </div>
    </div>

    <div class="container">
      <?php

      if (!(isset($_SESSION["autoriser"]))) {
        header("location:SignInUp.php");
      } else {
        if (isset($_POST['ajouter'])) {
          $date = trim($_POST['deb']);
          $classe = trim($_POST['classe']);
          $module = trim($_POST['module']);
          $desc = trim($_POST['desc']);
          $nom = trim($_POST['nom']);
          $sql = "INSERT INTO absence (nom, classe, module, date, description) values (:nom, :classe, :module, :date, :description)";
          $abs = $pdo->prepare($sql);
          $abs->execute([
            ':date' => $date,
            ':classe' => $classe,
            ':module' => $module,
            ':description' => $desc,
            ':nom' => $nom,
          ]);
          $erreur = "Ajout effectué";
        }
      }
      ?>

      <div class="container">
        <form action="SaisieAb.php" method="POST" id="myForm">
          <div class="form-group">
            <label for="deb">Choisir une date:</label><br>
            <input type="date" id="deb" name="deb" value="2022-05-08" min="1980-01-01" max="2025-12-31">
          </div>
          <div class="form-group">

            <label for="classe">Select Classe:</label>
            <select name="classe" id="classe" class="custom-select custom-select-sm custom-select-lg">
              <?php
              $sql0 = "SELECT * FROM groupe";
              $abs0 = $pdo->prepare($sql0);
              $abs0->execute();
              while ($cats = $abs0->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $cats['nom_groupe']; ?>">
                  <?php echo $cats['nom_groupe']; ?>
                </option>
              <?php }
              ?>
            </select>
            <label for="module">Ecrire un module:</label><br>
            <input id="module" name="module" class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="Module">

            <label for="nom">Choisir le nom de l'étudiant:</label><br>
            <select id="nom" name="nom" class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="Nom de l'étudiant">
              <?php
              $sql1 = "SELECT * FROM etudiant";
              $abs1 = $pdo->prepare($sql1);
              $abs1->execute();
              while ($cat = $abs1->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $cat['nom']; ?>">
                  <?php echo $cat['nom']; ?>
                </option>
              <?php }
              ?>
            </select>


            <label for="desc">Donner une description :</label><br>
            <input id="desc" name="desc" class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="Description">
          </div>
          <button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block">Valider</button>
        </form>
      </div>
    </div>
  </main>



  <?php
  require_once('footer.php');
  ?>

</body>

</html>