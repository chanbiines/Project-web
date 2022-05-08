<?php 
  session_start();
  if (!(isset($_SESSION["autoriser"]))) {
    header("location:SignInUp.php");
  }
?>



<?php

/* if ($_SESSION["autoriser"] != "oui") {
   header("location:SignInuP.php");
   exit(); */
if (!(isset($_SESSION["autoriser"]))) {
   header("location:SignInUp.php");
   exit();
} else {
   $cin = $_REQUEST["cin"];
   $nom = $_REQUEST["nom"];
   $prenom = $_REQUEST["prenom"];
   $email = $_REQUEST["emai"];
   $adresse = $_REQUEST["adresse"];
   $pwd = $_REQUEST["pwd"];
   $cpwd = $_REQUEST["cpwd"];

   $classe = $_REQUEST["classe"];

   /* $fichier=$_FILES['image']['image_name'];
   move_uploaded_file($fichier,'./images/'.$nomPhoto);      to upload an image and store it in the directory
    */
   include("connexion.php");
   $sel = $pdo->prepare("select cin from etudiant where cin=? limit 1");
   $sel->execute(array($cin));
   $tab = $sel->fetchAll();
   if (count($tab) > 0)
   {
      $erreur = "NOT OK"; // Etudiant existe déja
      echo "<script>alert ('Etudiant existe déja ')</script>";
   }
   else {
      $req = "insert into etudiant values ($cin,'$email',md5('$pwd'),md5('$cpwd'),'$nom','$prenom','$adresse','$classe')";
      $reponse = $pdo->exec($req) or die("error");
      echo "<script>alert ('Successfully Add !')</script>";
      $erreur = "OK";
   }
   echo $erreur;
}
?>

<!--  exite another way to do the add of each students on the SGBD !!!!!!!!!!!!!!! -->