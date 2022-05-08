<?php 
  session_start();
  if (!(isset($_SESSION["autoriser"]))) {
    header("location:SignInUp.php");
  }
?>

<?php
require_once("connexion.php");
$req = "SELECT * FROM  etudiant";
//$res=mysqli_query($req) or die(mysqli_error('not ok'));
$res = $pdo->prepare($req);
$res->execute();
require_once("afficherEtudiants.php");
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

  <!-- the zone of header  -->
  <?php
  require "header.php";
  ?>

  <!-- the begin of the page content  -->
  <main role="main" ondblclick="refresh()">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">Liste des étudiants</h1>
        <p>Cliquer sur le bouton afin d'actualiser la liste!</p><br>
        <div id="demo "></div>

      </div>
    </div>

    <!-- la partie javascript pour afficher le tableau des etudiants de la base de donnée actualiser-->
    <!-- not yet the actualisation button  -->
   <!--  <script>
      function refresh() {
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/Projectweb/afficher.php";

        //Envoie de la requete
        xmlhttp.open("GET", url, true);
        xmlhttp.send();


        //Traiter la reponse
        xmlhttp.onreadystatechange = function() { // alert(this.readyState+" "+this.status);
          if (this.readyState == 4 && this.status == 200) {

            myFunction(this.responseText);
            alert(this.responseText);
            console.log(this.responseText);
            //console.log(this.responseText);
          }
        }


        //Parse la reponse JSON
        function myFunction(response) {
          var obj = JSON.parse(response);
          //alert(obj.success);

          if (obj.success == 1) {
            var arr = obj.etudiants;
            var i;
            var out = "<table  border=1 >";
            for (i = 0; i < arr.length; i++) {
              out += "<tr><td>" +
                arr[i].cin +
                "</td><td>" +
                arr[i].nom +
                "</td><td>" +
                arr[i].prenom +
                "</td><td>" +
                arr[i].adresse +
                "</td><td>" +
                arr[i].email +
                "</td></tr>";
            }
            out += "</table>";
            document.getElementById("demo").innerHTML = out;
          } else document.getElementById("demo").innerHTML = "Aucune Inscriptions!";

        }
      }
    </script> -->

     <script>
          var reload = function() {
            document.location = document.location;
          }
        </script>

    <div class="container " >
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <!--Ligne Entete-->
            <tr>
              <th> CIN</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Adresse</th>
              <th>Classe</th>
            </tr>
            <!-- PDO::FETCH_ASSOC -->
            <?php while ($etu = $res->fetch()) { ?>
              <tr>
                <td><?php echo ($etu['cin']) ?></td>
                <td><?php echo ($etu['nom']) ?></td>
                <td><?php echo ($etu['prenom']) ?></td>
                <td><?php echo ($etu['email']) ?></td>
                <td><?php echo ($etu['adresse']) ?></td>
                <td><?php echo ($etu['Classe']) ?></td>
              </tr>

            <?php } ?>
          </table>

          <br>
        </div>
        <button type="button" ondblclick="reload()" class="btn btn-primary btn-block active">Actualiser</button>
        <!-- onclick="refresh()"   not yet executable -->
       


      </div>
    </div>

  </main>


  <?php
  require "footer.php";
  ?>

</body>




</body>


</html>