<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SCO-ENICAR Saisir Absence</title>
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>

<body>

  <?php
  require_once('header.php');
  ?>


  <main role="main">
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-4">État des absences pour un groupe</h1>
        <p>Pour afficher l'état des absences, choisissez d'abord le groupe et la periode concernée!</p>
      </div>
    </div>

    <div class="container">
      <form id="Postform" method="POST">
        <div class="form-group">
          <label for="semaine">Choisir une semaine:</label><br>
          <input id="semaine" type="week" name="debut" size="10" class="datepicker" />

        </div>
        <div class="form-group">
          <label for="classe">Choisir un groupe:</label><br>

          <select id="classe" name="classe" class="custom-select custom-select-sm custom-select-lg">
            <option value="INFO1-A">1-INFOA</option>
            <option value="INFO1-B">1-INFOB</option>
            <option value="INFO1-C">1-INFOC</option>
            <option value="INFO1-D">1-INFOD</option>
            <option value="INFO1-E">1-INFOE</option>
          </select>
        </div>

        <div class="form-group">
          <label for="matiere">Choisir un module:</label><br>
          <select id="matiere" name="matiere" class="custom-select custom-select-sm custom-select-lg">
            <option value="TECHWEB">Tech. Web</option>
            <option value="SGBD">SGBD</option>
          </select>
        </div>
        <div id="tab"></div>
        <!--Bouton Valider-->
        <button id="button" type="submit" onclick="ajouter()" class="btn btn-primary btn-block">Valider</button>
      </form>
    </div>
    <script>
      document.getElementById('matiere').addEventListener('change', affichertableau);

      function affichertableau() {
        var debut = document.getElementById('semaine').value;
        var classe = document.getElementById('classe').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://localhost/Projectweb/afficherAbsence.php?debut=' + debut + '&classe=' + classe, true);
        xhr.send();
        xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var s = this.responseText;
            s = s.replace(/\\n/g, "\\n")
              .replace(/\\'/g, "\\'")
              .replace(/\\"/g, '\\"')
              .replace(/\\&/g, "\\&")
              .replace(/\\r/g, "\\r")
              .replace(/\\t/g, "\\t")
              .replace(/\\b/g, "\\b")
              .replace(/\\f/g, "\\f");
            s = s.replace(/[\u0000-\u0019]+/g, "");
            myFunction(s);
            console.log(s);
            //console.log(typeof this.responseText);
            //console.log(typeof this.responseText);


          }
        }

        function myFunction(response) {
          let arrname = [];
          for (let i = 0; i < 12; i++) {
            checkBoxName = `${i}`;
            arrname.push(checkBoxName);
          }

          console.log(arrname);

          console.log("la reponse");
          console.log(response);

          var obj = JSON.parse(response);
          console.log(obj);
          console.log(typeof obj);
          console.log(obj.success, typeof obj.success);
          console.log("l'etudiant");
          console.log(obj.etudiants, typeof obj.etudiants);
          alert(obj.success);



          if (obj.success == 1) {
            var arr = obj.etudiants;
            console.log("l'objet etudiant");
            console.log(arr);

            var i;
            var arr2 = obj.dates;
            console.log("date");
            console.log(arr2);

            var arr3 = obj.days;
            console.log("days");
            console.log(arr3);

            var out = '<table rules="cols" frame="box">' +
              '<tr><th>' + arr.length.toString() + '</th>'
            for (i = 0; i < 6; i++) {
              out += '<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">' + arr3[i] + '</th>'
            }
            out += '</tr><tr><td>&nbsp;</td>'
            for (i = 0; i < 6; i++) {
              out += '<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">' + arr2[i] + '</th>'
            }
            out += '</tr><tr><td>&nbsp;</td><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th>'

            for (i = 0; i < arr.length; i++) {
              out += '</tr><tr class="row_3"><td><b>' + arr[i].nom + '-' + arr[i].prenom + '</b></td>'
              for (let j = 0; j < 12; j++) {
                out += '<td><input type="checkbox" name=' + arrname[j] + '></td>'
              }
            }
            out += '</table><br>';
            document.getElementById("tab").innerHTML = out;
          } else {
            document.getElementById("tab").innerHTML = "Not found!";
          }
        }
      }

      function ajouter(e) {
        e.preventDefault();
        var xmlhttp = new XMLHttpRequest();
        var url = "http://localhost/mini-projet-info1/ajouterAbsence.php";

        //Envoie Req
        xmlhttp.open("POST", url, true);

        form = document.getElementById("PostForm");
        formdata = new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText);
            if (this.responseText == "OK") {
              document.getElementById("demo").innerHTML = "Done with success";
              document.getElementById("demo").style.backgroundColor = "green";
            } else {
              document.getElementById("demo").innerHTML = "L'étudiant est déjà inscrit, merci de vérifier le CIN";
              document.getElementById("demo").style.backgroundColor = "#fba";
            }
          }
        }


      }
    </script>



    <?php
    require_once('footer.php');
    ?>


  </main>
</body>

</html>