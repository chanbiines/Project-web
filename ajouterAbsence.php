<?php 
$checkbox1=$_REQUEST['check1'];
$checkbox2=$_REQUEST['check2'];
$checkbox3=$_REQUEST['check3'];
$checkbox4=$_REQUEST['check4'];
$checkbox5=$_REQUEST['check5'];
$checkbox6=$_REQUEST['check6'];
$checkbox7=$_REQUEST['check7'];
$checkbox8=$_REQUEST['check8'];
$checkbox9=$_REQUEST['check9'];
$checkbox10=$_REQUEST['check10'];
$checkbox11=$_REQUEST['check11'];
$checkbox12=$_REQUEST['check12'];

include("connexion.php");
         $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         $sel->execute(array($cin));
         $tab=$sel->fetchAll();
        $req="insert into etudiant values ($cin,'$email',md5('$pwd'),md5('$cpwd'),'$nom','$prenom','$adresse','$classe')";
        $reponse = $pdo->exec($req) or die("error");
         ?>