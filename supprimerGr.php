<?php

include('connexion.php');
$code= $_GET['id_groupe'];
$req="delete from groupe where (id_groupe=$code)";
$res = $pdo->query($req);
require_once("supprimerGroupe.php");
?>
