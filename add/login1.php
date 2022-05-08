<?php
session_start();
@$login = $_POST["inputEmail"];
@$pass = md5($_POST["inputPassword"]);
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
  include("connexion.php");
  $sel = $pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
  $sel->execute(array($login, $pass));
  $tab = $sel->fetchAll();
  if (count($tab) > 0) {
    $_SESSION["prenomNom"] = ucfirst(strtolower($tab[0]["prenom"])) .
      " " . strtoupper($tab[0]["nom"]);
    $_SESSION["autoriser"] = "oui";
    header("location:indexx.php");
  } else
    $erreur = "Mauvais login ou mot de passe!";
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>SCO-ENICAR Se Connecter</title>
  <link rel="shortcut icon" type="image" href="./images/teacher.svg">

  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">



  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>



  <!-- Custom styles for this template -->
  <link href="./assets/dist/css/signin.css" rel="stylesheet">
</head>

<body onLoad="document.fo.login.focus()" class="text-center">

  <!-- ./assets/brand/user-login.svg-->

  <form name="fo" class="form-signin" method="post" action="">
    <img class="mb-4" src="./images/login.svg" alt="" width="150" height="150">
    <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
    <div class="erreur"><?php echo $erreur ?></div>
    <label for="inputEmail" class="sr-only">Email </label>
    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Mot de Passe</label>
    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" name="valider" type="submit">Se Connecter</button>
    <br><a href="inscription1.php"> Créer un Compte</a>

    <!-- Footer independent for all the subpages to do !!!!!! -->
    <p class="mt-5 mb-3 text-muted">&copy; Copyright Enicar 2021-2022</p>
  </form>
  </script>
</body>




</html>