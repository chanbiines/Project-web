<?php
session_start();
require_once("connexion.php");
$id = $_GET['id_groupe'];
$req = "select * from groupe where id_groupe=$id ";
$res= $pdo ->query ($req);
//$res = $pdo->prepare($req);
//$res->execute(array($id));
$gru = $res->fetch();

//echo ($gru['nom_groupe']);

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
    require_once('header.php');
    ?>


    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Modifier les Informations de group !</h1>
                <p>Remplir le formulaire ci-dessous afin de modifier le nom de group <br>

                </p>

            </div>
        </div>

        <div class="container">

            <form id="myForm" method="POST" action="EditG.php">

                <!-- ID groupe-->
                <div class="form-group">
                    <label for="id_groupe">Id groupe: <?php echo ($gru["id_groupe"]); ?></label><br>
                    <input type="hidden" id="id_groupe" name="id_groupe" value="<?php echo ($etu["id_groupe"]); ?>" class="form-control" required />
                </div>
                <!-- name group-->
                <div class="form-group">
                    <label for="nom_groupe">Groupe:</label><br>
                    <input type="text" id="nom_groupe" name="nom_groupe" value="<?php echo ($gru["nom_groupe"]); ?>" class="form-control" required pattern="INFO[1-3]{1}-[A-Z]{1}" title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">

                </div>

                <!--Bouton Ajouter-->
                <button type="submit" href="EditG.php" class="btn btn-primary btn-block">Enregistrer Modification</button>



            </form>

        </div>
    </main>


    <?php
    require_once('footer.php');
    ?>

       


</body>

</html>