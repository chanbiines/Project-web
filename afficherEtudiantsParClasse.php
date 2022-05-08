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
        <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
        <p>Cliquer sur la liste afin de choisir une classe!</p>
      </div>
    </div>

    <!-- SCRIPT PHP -->
    <script>
      function refresh() {
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/Projectweb/afficherListClasse.php";
        //Envoie de la requete

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        //Traiter la reponse
        xmlhttp.onreadystatechange = function() { //alert(this.readyState+" "+this.status);
          if (this.readyState == 4 && this.status == 200) {

            myFunction(this.responseText);
            alert(this.responseText);
            console.log(this.responseText);

          }
        }


        //Parse la reponse JSON
        function myFunction(response) {
          var obj = JSON.parse(response);
          console.log(obj);
          console.log(typeof obj);


          console.log(obj.success);

          if (obj.success == 1) {
            var arr = obj.Classe;
            var out = "<select name='but' id='select' class='custom-select custom-select-sm custom-select-lg' >";


            var i;
            for (i = 0; i < arr.length; i++) {
              out += "<option id=d value=" + arr[i] + ">" + arr[i] + "</option>"
            }
            out += "</select>";
            document.getElementById("demo1").innerHTML = out;
            console.log('it works ');

          } else document.getElementById("demo1").innerHTML = "Aucun Groupe!";
        }
      }
    </script>


    <div class="container">
      <div class="form-group">
        <label for="classe">Choisir une classe:</label>
        <div id="demo1"></div>
      </div>
    </div>

    <script>
      // SCRIPT POUR L'AFFICHAGE DES ETUDIANT PAR CLASSE

      function refresh2() {
        var e = document.getElementById("select");
        var but = e.value;
        var xmlhttp1 = new XMLHttpRequest();
        var url = "http://localhost/Projectweb/afficherParClasse.php?but=" + but;
        //Envoie de la requete

        xmlhttp1.open("GET", url, true);
        xmlhttp1.send();
        //Traiter la reponse
        xmlhttp1.onreadystatechange = function() {
          alert(this.readyState + " " + this.status);
          if (this.readyState == 4 && this.status == 200) {
            /* var s = this.responseText;
            // preserve newlines, etc - use valid JSON
            s = s.replace(/\\n/g, "\\n")
              .replace(/\\'/g, "\\'")
              .replace(/\\"/g, '\\"')
              .replace(/\\&/g, "\\&")
              .replace(/\\r/g, "\\r")
              .replace(/\\t/g, "\\t")
              .replace(/\\b/g, "\\b")
              .replace(/\\f/g, "\\f");
            // remove non-printable and other non-valid JSON chars
            s = s.replace(/[\u0000-\u0019]+/g, ""); */
            myFunction2(this.responseText);
          }
        }


        //Parse la reponse JSON
        function myFunction2(response) {
          var obj = JSON.parse(response);
          //alert(obj.success);

          if (obj.success == 1) {
            var arr = obj.etudiants;
            var i;
            var out = "<table class= table table-striped table-hover >" +
              "<tr>" +
              "<th>" +
              "CIN" +
              "</th>" +
              "<th>" +
              "Nom" +
              "</th>" +
              "<th>" +
              "Prénom" +
              "</th>" +
              "<th>" +
              "Email" +
              "</th>" +
              "<th>" +
              "Adresse" +
              "</th>" +
              "<th>" +
              "Classe" +
              "</th>" +
              "</tr>";
            for (i = 0; i < arr.length; i++) {
              out += "<tr><td>" +
                arr[i].cin +
                "</td><td>" +
                arr[i].nom +
                "</td><td>" +
                arr[i].prenom +
                "</td><td>" +
                arr[i].email +
                "</td><td>" +
                arr[i].adresse +
                "</td><td>" +
                arr[i].classe +
                "</td></tr>"


            }
            out += "</table>";
            document.getElementById("demo2").innerHTML = out;
            //alert(console.log(out));
          } else document.getElementById("demo2").innerHTML = "Aucune Inscriptions!";

        }
      }
    </script>

    <!-- 
    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <div id="demo1" class="table table-striped table-hover"></div>
        </div>
        sdf  
      </div>
    </div>
 -->



    <div class="container">
      <div class="row">
        <!-- LISTE DES ETUDIANT-->
        <div class="table-responsive">
          <div id="demo2" class="table table-striped table-hover"></div>
        </div>
        <!-- Bonton actualiser-->
        <button type="submit" class="btn btn-primary btn-block active" onclick=refresh2()>Actualiser</button>
      </div>
    </div>

  </main>

  <?php
  require_once('footer.php');
  ?>
</body>

</html>