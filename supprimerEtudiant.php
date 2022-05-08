<?php 
  
  session_start();
  if (!(isset($_SESSION["autoriser"]))) {
    header("location:SignInUp.php");
  }
?>

<?php
require_once("connexion.php");
$req = "select * from etudiant";
//$res=mysqli_query($req) or die(mysqli_error('not ok'));
$res = $pdo->query($req);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
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


    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Supprimer L'Etudiant </h1>
                <p>Cliquer sur le bouton de Supprimer devant chaque Etudiant que vous Souhaite le supprimer immidiatement!</p><br>


            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <!--Ligne Entete-->
                        <tr>
                            <th> CIN</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Classe</th>
                        </tr>
                        <?php while ($etu = $res->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo ($etu['cin']) ?></td>
                                <td><?php echo ($etu['nom']) ?></td>
                                <td><?php echo ($etu['prenom']) ?></td>
                                <td><?php echo ($etu['email']) ?></td>
                                <td><?php echo ($etu['adresse']) ?></td>
                                <td><?php echo ($etu['Classe']) ?></td>
                                <td><a onclick="return confirm('Are you sure to delete ?');" href="supprimerEtu.php?cin=<?php echo ($etu['cin']) ?>" class="btn btn-danger btn-sm">Supprimer</a></td>

                                <!-- href="javascript:confirm(' Are you sure to delete ?');"  : to make a little confirmation after the delete  -->
                            </tr>

                        <?php } ?>
                    </table>

                    <br>
                </div>



            </div>
        </div>

    </main>

    <?php
    require "footer.php";
    ?>
</body>


</html>