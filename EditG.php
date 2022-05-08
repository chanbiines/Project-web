<?php
session_start();
include('connexion.php');

if (isset($_POST['id_groupe'])) {
    $id = trim($_POST['id_groupe']);
    $name_groupe = trim($_POST['nom_groupe']);

    $req = "UPDATE groupe SET nom_groupe=? WHERE id_groupe=? ";
    $res = $pdo->prepare($req)->execute([$name_groupe, $id]);
    //$res=$pdo ->query("UPDATE groupe SET nom_groupe='$name_groupe' WHERE id_groupe ='$id' ");
    //$res -> execute(array($name_groupe,$id));
    //$res = $pdo->query($req) or die ($pdo->errorInfo());
    $_SESSION['message']=" Update has been completed ";
    $_SESSION['msg_type']="success";

    header("location:modifierGroupe.php");
}

?>