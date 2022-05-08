<?php

session_start();
if (!(isset($_SESSION["autoriser"]))) {
  header("location:SignInUp.php");
}
?>

<?php
/* not yet all  */

require_once("connexion.php");

if (isset($_SESSION['Classe'])) {
  $requser = $bdd->prepare("SELECT *  FROM etudiant WHERE Classe = ? ");
  $requser->execute(array($_SESSION['Classe']));
  $user = $requser->fetch();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mes Groupes</title>
  <link rel="stylesheet" href="groupe.css" />
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./assets/jumbotron.css" rel="stylesheet">
</head>

<body>
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">SCO-Enicar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="indexx.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
          </li>

        </ul>
        
      </div>
    </nav>
  </header>



  <div class="container">
    <div class="card">
      <div class="box">
        <div class="content">
          <h2>1</h2>
          <h3>ING INFO A</h3>
          <p>
            - le programme de cours pour ce groupe.
            HTML / CSS / PHP / AJAX / JS / BOOTSTRAP4
          </p>
          <a href="afficherEtudiantsParClasse.php">Voir les étudiants</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="box">
        <div class="content">
          <h2>2</h2>
          <h3>ING INFO B</h3>
          <p>
            - le programme de cours pour ce groupe 
            HTML / CSS / PHP / AJAX / JS / BOOTSTRAP4
          </p>
          <a href="afficherEtudiantsParClasse.php"   >Voir les étudiants</a>
          <!-- href="afficherEtudiantsParClasse.php?Classe=<?php echo ('INFO1-B') ?>" -->
        </div>
      </div>
    </div>
    <div class="card">
      <div class="box">
        <div class="content">
          <h2>3</h2>
          <h3>ING INFO C</h3>
          <p>
            - le programme de cours pour ce groupe
            HTML / CSS / PHP / AJAX / JS / BOOTSTRAP4

          </p>
          <a href="afficherEtudiantsParClasse.php">Voir les étudiants</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="box">
        <div class="content">
          <h2>4</h2>
          <h3>ING INFO D</h3>
          <p>
            - le programme de cours pour ce groupe
            HTML / CSS / PHP / AJAX / JS / BOOTSTRAP4

          </p>
          <a href="afficherEtudiantsParClasse.php">Voir les étudiants</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="box">
        <div class="content">
          <h2>5</h2>
          <h3>ING INFO E</h3>
          <p>
            - le programme de cours pour ce groupe
            HTML / CSS / PHP / AJAX / JS / BOOTSTRAP4

          </p>
          <a href="afficherEtudiantsParClasse.php">Voir les étudiants</a>
        </div>
      </div>
    </div>
  </div>

  <?php
  require "footer.php";
  ?>

</body>



</html>