<?php 
  session_start();
  if (!(isset($_SESSION["autoriser"]))) {
    header("location:SignInUp.php");
  }
?>


<?php

require_once('connexion.php');
$code= $_GET['cin'];
//echo( " confirmer la supprission ");               not yet the confirmation to delete 
$req="delete from etudiant where (cin=$code)";
$res = $pdo->query($req);


/* une autre manière de supprission  */
/* $res=$pdo ->prepare ("delete from etudiant where cin=?");
$para=array($code);
$res->execute($para); */


//header("location:afficherEtudiants.php")
require_once("supprimerEtudiant.php");
?>
