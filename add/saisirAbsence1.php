 <?php

  session_start();
  if (!(isset($_SESSION["autoriser"]))) {
    header("location:SignInUp.php");
  }
  include("connexion.php");
  /* $week_start = new DateTime();
$week_start->setISODate($year,$week_no);
echo $week_start->format('d-M-Y'); */
  $res = 0;
  if (!empty($_POST['classe'])) {
    $groupe = $_POST['classe'];
    $req = "select count(*) from etudiant where Classe='$groupe' ";
    $res = $pdo->query($req);

    echo 'you select :' . $groupe;
  }


  ?>



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
   <link href="./assets/jumbotron.css" rel="stylesheet">

 </head>

 <body>
   <?php
    require "header.php";
    ?>

   <!--  <script>
      var semaine= document.getElementById('semaine').value;
      $date=date('d/m/y', strtotime('semaine'));
      alert (console.log($date));
    </script> -->

   <main role="main">
     <div class="jumbotron">
       <div class="container">
         <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
         <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
       </div>
     </div>

     <div class="container">
       <form method="POST " action="">
         <!-- not yet : ajouterAbsence.php -->
         <div class="form-group">
           <label for="semaine">Choisir une semaine:</label><br>
           <input id="semaine" type="week" name="debut" size="10" class="datepicker" />
         </div>
         <div class="form-group">
           <label for="classe">Choisir un groupe:</label><br>


           <select id="classe" name="classe" class="custom-select custom-select-sm custom-select-lg">
             <option value="INFO1-A" id="A1">1-INFOA</option>
             <option value="INFO1-B" id="B1">1-INFOB</option>
             <option value="INFO1-C" id="C1">1-INFOC</option>
             <option value="INFO1-D" id="D1">1-INFOD</option>
             <option value="INFO1-E" id="E1">1-INFOE</option>
           </select>
         </div>


         <div class="form-group">
           <label for="module">Choisir un module:</label><br>
           <select id="module" name="module" class="custom-select custom-select-sm custom-select-lg">
             <option value="tech" id="tech">Tech. Web</option>
             <option value="BD" id="BD">SGBD</option>
           </select>
         </div>

         <script>
           function get_monday_from_week() {
             $week = 52;
             $year = 2013;
             $time = strtotime("1 January $year", time());
             $day = date('w', $time);
             $time += ((7 * $week) + 1 - $day) * 24 * 3600;
             $return[0] = date('Y-n-j', $time);
             echo $return[0]; //2013-12-30

             if ((int) $week < 10) {
               $week = '0'.(string) $week;
             } else {
               $week = (string) $week;
             }
             echo date('Y-m-d', strtotime($year.
               "W".$week)); //2013-12-23

           }

           /* 
                  function recupValeurs() {
                     var cases = document.getElementsByName('date');
                    var resultat = ""; 

                    xhr.send('tab=' + document.getElementsByName('date').value);
                    print_r($_POST['tab']);

                    for (var i = 0; i < cases.length; i++) {
                      if (cases[i].checked) {
                        resultat += cases[i].value + ", ";
                      }
                    }
                    alert("Valeurs sélectionnées : " + resultat);
                  } */
           /*  for (i = 0; i <= document.getElementsByName('droit').length; i++ + )
              xhr.send('tab[]=' + document.getElementsByName('droit').value); */
         </script>


         <!-- make a modal like demo that take your answer  -->
         <div class="modal" id="deletModal">
           <div class="modal-dialog">
             <div class="modal-content">
               <!-- Modal header -->
               <div class="modal-header">
                 <h4 class="modal-title"> delete confirmation </h4>
                 <button type="button" class="close" data-disk_free_space="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                 <h3 style="position:relative"> are you sure you want to remove this ?</h3>
               </div>


               <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="button" name="ok_button" id="ok_button" class="btn btn-primary btn-sm">OK</button>
                 <button type="button" class="btn btn-danger btn-sm" data-disk_free_space="modal">close</button>
               </div>


             </div>
           </div>
         </div>

         <table rules="cols" frame="box">
           <tr>
             <th><?php echo ($res); ?></th>

             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Lundi</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Mardi</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Mercredi</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Jeudi</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Vendredi</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Samedi</th>
           </tr>
           <tr>
             <!-- not yet : partie dynamique qui va générer les dates de semaine choisie -->
             <td>&nbsp;</td> <!-- la date de la semaine actuelle  -->
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">07/03/2022</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">08/03/2022</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">09/03/2022</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">10/03/2022</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">11/03/2022</th>
             <th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">12/03/2022</th>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <th>AM</th>
             <th>PM</th>
             <th>AM</th>
             <th>PM</th>
             <th>AM</th>
             <th>PM</th>
             <th>AM</th>
             <th>PM</th>
             <th>AM</th>
             <th>PM</th>
             <th>AM</th>
             <th>PM</th>
           </tr>
           <tr class="row_3">
             <td><b>M. WALID SAAD</b></td>
             <td><input type="checkbox" name="date" value="LM"></td>
             <td><input type="checkbox" name="date" value="LS"></td>
             <td><input type="checkbox" name="date" value="MM"></td>
             <td><input type="checkbox" name="date" value="MS"></td>
             <td><input type="checkbox" name="date" value="MEM"></td>
             <td><input type="checkbox" name="date" value="MES"></td>
             <td><input type="checkbox" name="date" value="JM"></td>
             <td><input type="checkbox" name="date" value="JS"></td>
             <td><input type="checkbox" name="date" value="VM"></td>
             <td><input type="checkbox" name="date" value="VS"></td>
             <td><input type="checkbox" name="date" value="SM"></td>
           </tr>
           <button onclick="recupValeurs();">Envoyer</button>

         </table>
         <br>
         <!--Bouton Valider-->
         <button type="submit" id="valider" class="btn btn-primary btn-block" onclick="ajouter()">Valider</button>
       </form>
     </div>
   </main>

   <?php
    require "footer.php";
    ?>
 </body>

 </html>






 <!--           
<input list="classe">
<datalist id="classe" name="classe">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</datalist> -->


 <script>
   function affichertableau() {
     var debut = document.getElementById('semaine').value;
     var classe = document.getElementById('classe').value;
     var xhr = new XMLHttpRequest();
     xhr.open('GET', 'http://localhost/Projectweb/afficherAbsence.php?debut=' + debut + '&classe=' + classe, true);
     xhr.send();
     xhr.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         //var s = this.responseText;
         /*  s = s.replace(/\\n/g, "\\n")
            .replace(/\\'/g, "\\'")
            .replace(/\\"/g, '\\"')
            .replace(/\\&/g, "\\&")
            .replace(/\\r/g, "\\r")
            .replace(/\\t/g, "\\t")
            .replace(/\\b/g, "\\b")
            .replace(/\\f/g, "\\f");
          s = s.replace(/[\u0000-\u0019]+/g, ""); */
         myFunction(this.responseText);
         //console.log(this.responseText);
         console.log(this.responseText);

       }
     }

     function myFunction(response) {
       let arrname = [];
       for (let i = 0; i < 12; i++) {
         checkBoxName = `${i}`;
         arrname.push(checkBoxName);
       }
       var obj = JSON.parse(response);
       //alert(obj.success);
       if (obj.success == 1) {
         var arr = obj.etudiants;
         var i;
         var arr2 = obj.dates;
         var arr3 = obj.days;
         var out = '<table rules="cols" frame="box">' +
           '<tr><th>' + arr.length.toString() + '</th>';
         for (i = 0; i < 6; i++) {
           out += '<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">' + arr3[i] + '</th>';
         }
         out += '</tr><tr><td>&nbsp;</td>';
         for (i = 0; i < 6; i++) {
           out += '<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">' + arr2[i] + '</th>';
         }
         out += '</tr><tr><td>&nbsp;</td><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th></tr>';

         for (i = 0; i < arr.length; i++) {
           out += '<tr class="row_3"><td><b>' + arr[i].nom + '' + arr[i].prenom + '</b></td>';
           for (let j = 0; j < 12; j++) {
             out += '<td><input type="checkbox" name=' + arrname[j] > +'</td>'
           }
         }
         out += '</table><br>';
         document.getElementById("tab").innerHTML = out;
       } else {
         document.getElementById("tab").innerHTML = "Not found!";
       }
     }
   }
   /*function ajouter(e){
     e.preventDefault();
         var xmlhttp = new XMLHttpRequest();
         var url="http://localhost/mini-projet-info1/ajouterAbsence.php";
         
         //Envoie Req
         xmlhttp.open("POST",url,true);

         form=document.getElementById("PostForm");
         formdata=new FormData(form);

         xmlhttp.send(formdata);

         //Traiter Res

         xmlhttp.onreadystatechange=function()
             {   
                 if(this.readyState==4 && this.status==200){
                 // alert(this.responseText);
                     if(this.responseText=="OK")
                     {
                         document.getElementById("demo").innerHTML="Done with success";
                         document.getElementById("demo").style.backgroundColor="green";
                     }
                     else
                     {
                         document.getElementById("demo").innerHTML="L'étudiant est déjà inscrit, merci de vérifier le CIN";
                         document.getElementById("demo").style.backgroundColor="#fba";
                     }
                 }
             }
         
         
     }*/
 </script>