<?php
session_start();
require_once("connexion.php");
$cin = $_GET['cin'];

$req = "select * from etudiant where cin=?";
/* $res = $pdo->query($req);
$etu = $res->fetch(PDO::FETCH_ASSOC); */

$res = $pdo->prepare($req);
$para = array($cin);
$res->execute($para);
$etu = $res->fetch();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Ajouter Etudiant</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
    <script src="./assets/dist/js/jquery.min.js"></script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->


</head>

<body>

    <?php
    require "header.php";
    ?>


    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Modifier les Informations de L'Etudiant !</h1>
                <p>Remplir le formulaire ci-dessous afin de modifier les informations de cet étudiant! <br>

                </p>

            </div>
        </div>


        <div class="container">

            <form id="myForm" method="POST" action="Edit.php">
                <!-- action="ajouter.php" -->
                <!--
                          TODO: Add form inputs
                          Prenom - required string with autofocus
                          Nom - required string
                          Email - required email address
                          CIN - 8 chiffres
                          Password - required password string, au moins 8 letters et chiffres
                          ConfirmPassword
                          Classe - Commence par la chaine INFO, un chiffre de 1 a 3, un - et une lettre MAJ de A à E
                          Adresse - required string
                      -->
                <!--CIN-->
                <div class="form-group">
                    <label for="cin">CIN: <?php echo ($etu['cin']); ?></label><br>
                    <input type="hidden" id="cin" name="cin" value="<?php echo ($etu['cin']); ?>" class="form-control" required />
                </div>
                <!--Nom-->
                <div class="form-group">
                    <label for="nom">Nom:</label><br>
                    <input type="text" id="nom" name="nom" value="<?php echo ($etu['nom']); ?>" class="form-control" required autofocus>
                </div>
                <!--Prénom-->
                <div class="form-group">
                    <label for="prenom">Prénom:</label><br>
                    <input type="text" id="prenom" name="prenom" value="<?php echo ($etu['prenom']); ?>" class="form-control" required>
                </div>
                <!--Email-->
                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" value="<?php echo ($etu['email']); ?>" class="form-control" required>
                </div>


                <!--  Password           : no need 
                <div class="form-group">
                    <label for="pwd">Mot de passe:</label><br>
                    <input type="password" id="pwd" name="pwd" class="form-control" required pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres" />
                </div>
                ConfirmPassword          :no need 
                <div class="form-group">
                    <label for="cpwd">Confirmer Mot de passe:</label><br>
                    <input type="password" id="cpwd" name="cpwd" class="form-control" required pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres" />
                </div> -->

                <!--Classe-->
                <div class="form-group">
                    <label for="classe">Classe:</label><br>
                    <input type="text" id="classe" name="classe" value="<?php echo ($etu['Classe']); ?>" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}" title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
                </div>
                <!--Adresse-->
                <div class="form-group">
                    <label for="adresse">Adresse:</label><br>
                    <textarea id="adresse" name="adresse" rows="10" cols="20" class="form-control" required>
                    <?php echo $etu['adresse']; ?>
                </textarea>

                </div>
                <!--Bouton Ajouter-->
                <button type="submit" href="Edit.php" class="btn btn-primary btn-block">Enregistrer Modification</button>


            </form>

        </div>
    </main>

    <?php
    require "footer.php";
    ?>
    <script src="/assets/dist/js/inscrire.js"></script>
</body>

</html>