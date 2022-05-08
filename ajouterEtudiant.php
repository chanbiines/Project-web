<?php

session_start();
if (!(isset($_SESSION["autoriser"]))) {
  header("location:SignInUp.php");
}
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
  <script src="./assets/dist/js/jquery.min.js"></script>



</head>

<body>

  <!-- the header zone of every page  -->
  <?php
  require "header.php";
  ?>



  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Ajouter un étudiant</h1>
        <p>Remplir le formulaire ci-dessous afin d'ajouter un étudiant! <br>
        <div id="demo"></div>
        </p>

      </div>
    </div>


    <!-- the script to refrech the table of the students  -->
    <script>
      function ajouter() {
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/Projectweb/ajouter.php";

        //Envoie Req
        xmlhttp.open("POST", url, true);

        form = document.getElementById("myForm");
        formdata = new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);  /* comment */
            if (this.responseText == "OK") {
              document.getElementById("demo").innerHTML = "L'ajout de l'étudiant a été bien effectué";
              document.getElementById("demo").style.backgroundColor = "green";
            } else {
              document.getElementById("demo").innerHTML = "L'étudiant est déjà inscrit, merci de vérifier le CIN";
              document.getElementById("demo").style.backgroundColor = "#fba";
            }
          }
        }


      }
    </script>

    <!-- the form application to add a student of ENICarthage  -->
    <div class="container">
      <form id="myForm" method="POST" action="">
        <!-- action="ajouter.php" -->
        <!--
                          TODO: Add form inputs
                          Prenom - required string with autofocus
                          Nom - required string
                          Email - required email address
                          CIN - 8 chiffres
                          Password - required password string, au moins 8 letters et chiffres
                          ConfirmPassword
                          Classe - Commence par la chaine INFO, un chiffre de 1 a 3, un - et une lettre MAJ de A à E
                          Adresse - required string
                      -->
        <!--Nom-->
        <div class="form-group">
          <label for="nom">Nom:</label><br>
          <input type="text" id="nom" name="nom" class="form-control" required autofocus>
        </div>
        <!--Prénom-->
        <div class="form-group">
          <label for="prenom">Prénom:</label><br>
          <input type="text" id="prenom" name="prenom" class="form-control" required>
        </div>
        <!--Email-->
        <div class="form-group">
          <label for="email">Email:</label><br>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <!--CIN-->
        <div class="form-group">
          <label for="cin">CIN:</label><br>
          <input type="text" id="cin" name="cin" class="form-control" required pattern="[0-9]{8}" title="8 chiffres" />
        </div>
        <!--Password-->
        <div class="form-group">
          <label for="pwd">Mot de passe:</label><br>
          <input type="password" id="pwd" name="pwd" class="form-control" required />
        </div>
        <!--ConfirmPassword-->
        <div class="form-group">
          <label for="cpwd">Confirmer Mot de passe:</label><br>
          <input type="password" id="cpwd" name="cpwd" class="form-control" required />
          <!--  pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres"  -->
        </div>
        <!--Classe-->
        <div class="form-group">
          <label for="classe">Classe:</label><br>
          <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}" title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
        </div>
        <!--Adresse-->
        <div class="form-group">
          <label for="adresse">Adresse:</label><br>
          <textarea id="adresse" name="adresse" rows="10" cols="30" class="form-control" required>
             </textarea>
        </div>
        <!--Bouton Ajouter-->

        <button type="buttom" onclick="ajouter()" class="btn btn-info btn-block ">Ajouter</button>
        <input type="reset" class="btn btn-info btn-block" value="Reset ">



      </form>

    </div>
  </main>

  <!-- the footer zone of every page  -->
  <?php
  require "footer.php";
  ?>


  <script src="/assets/dist/js/inscrire.js"></script>
</body>

</html>