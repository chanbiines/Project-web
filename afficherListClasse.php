<?php
session_start();
if (!(isset($_SESSION["autoriser"]))) {
   header("location:SignInUp.php");
   exit();
} else {
   include("connexion.php");
   $req = "SELECT distinct Classe FROM etudiant";
   $reponse = $pdo->query($req);
   if ($reponse->rowCount() > 0) {
      $outputs["Classe"] = array();

      while ($row = $reponse->fetch(PDO::FETCH_ASSOC)) {
         array_push($outputs["Classe"], $row["Classe"]);
      }
      // success
      $outputs["success"] = 1;
      echo json_encode($outputs);
   } else {
      $outputs["success"] = 0;
      $outputs["message"] = "Pas d'étudiants";
      // echo no users JSON
      echo json_encode($outputs);
   }
}

?>