<?php
session_start();                      //partie inscription 
@$nom = $_POST["nom"];
@$prenom = $_POST["prenom"];
@$login = $_POST["mail"];
@$pass = $_POST["pass"];      /* md5 */
@$repass = $_POST["repass"];
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
  if (empty($nom)) $erreur = "Nom laissé vide!";
  elseif (empty($prenom)) $erreur = "Prénom laissé vide!";
  elseif (empty($prenom)) $erreur = "Prénom laissé vide!";
  elseif (empty($login)) $erreur = "Login laissé vide!";
  elseif (empty($pass)) $erreur = "Mot de passe laissé vide!";
  elseif ($pass != $repass) $erreur = "Mots de passe non identiques!";
  else {
    include("connexion.php");
    $sel = $pdo->prepare("select id from enseignant where login=? limit 1");
    $sel->execute(array($login));
    $tab = $sel->fetchAll();
    if (count($tab) > 0)
      $erreur2 = "Login existe déjà!";
    else {
      $ins = $pdo->prepare("insert into enseignant(nom,prenom,login,pass) values(?,?,?,?)");
      if ($ins->execute(array($nom, $prenom, $login, md5($pass))))
        header("location:SignInUp.php");
    }
  }
}
?>


<?php                 //partie login 
@$login = $_POST["inputEmail"];
@$pass = md5($_POST["inputPassword"]);
@$valider = $_POST["signin"];
$erreur1 = "";
@$error_email = '';
@$error_password = '';


//mysqli_select_db("gestion_etudiant", )
if (isset($valider)) {
  include("connexion.php");
  $sel = $pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
  $sel->execute(array($login, $pass));
  $tab = $sel->fetchAll();
  if ($tab) {
    session_start();
    $_SESSION["autoriser"] = $tab;
    $_SESSION["prenomNom"] = ucfirst(strtolower($tab[0]["prenom"])) .
      " " . strtoupper($tab[0]["nom"]);
    header("location:indexx.php");
  } else {
    if (empty($_POST['inputEmail'])) {
      $error_email = "Email invalide";  /* not yet  */
    }
    if (empty($_POST['inputPassword'])) {
      $error_password = " Password invalide";
    }
    $erreur1 = "Mauvais login ou mot de passe!";
  }
}

/* 
  
  if (count($tab) > 0) {
    $_SESSION["prenomNom"] = ucfirst(strtolower($tab[0]["prenom"])) .
      " " . strtoupper($tab[0]["nom"]);
    $_SESSION["autoriser"] = "oui";
    header("location:indexx.php");
  } else
    $erreur1 = "Mauvais login ou mot de passe!"; */




// mysqli_query( $_REQUEST) or die((mysqli_error()));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <link rel="shortcut icon" type="image" href="img/icon.svg">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styleSignIn.css" />
  <title>Sign in & Sign up Form</title>
</head>


<body>

  <body onLoad="document.fo.login.focus()">
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <!-- the login form -->
          <form name="fo" method="POST" action="" class="sign-in-form">
            <h2 class="title">Sign in</h2><br>
            <div class="erreur"><?php echo $erreur1 ?></div>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="inputEmail" name="inputEmail" placeholder="Email adress" required autofocus />
              <span id="error_email" class="text-danger"><?php echo ($error_email) ?></span> <!-- to add the error msg under the email label  : not yet  -->
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="inputPassword" placeholder="Password" required />
              <span id="error_password" class="text-danger"><?php echo ($error_password) ?></span> <!-- to add the error msg under the password label : not yet -->

            </div>
            <input type="submit" name="signin" value="login" class="btn solid" />
            <!-- <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>    // to sign in with social email and password 
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> -->

            <!-- Footer independent for all the subpages to do !!!!!! -->
            <!--             <p class="mt-5 mb-3 text-muted">&copy; Copyright Enicar 2021-2022</p>-->

            <?php
            require "footer.php";
            ?>
          </form>



          <!-- the insription form -->
          <form name="fo" method="POST" action="" class="sign-up-form">

            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nom" placeholder="Nom" required />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="prenom" placeholder="Prenom" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="mail" placeholder="Votre Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass" placeholder="Mot de passe" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="repass" placeholder="Confirmer Mot de Passe" required />
            </div>
            <input type="submit" value="s'inscrire" href="connexion.php" name="valider" class="btn" value="S'inscrire" />


            <!-- <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> -->
            <!-- Footer independent for all the subpages to do !!!!!! -->
            <!--             <p class="mt-5 mb-3 text-muted">&copy; Copyright Enicar 2021-2022</p>-->

            <?php
            require "footer.php";
            ?>
          </form>
        </div>
      </div>

      <!-- the inscription panel -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Not one of Teachers ?</h3>
            <p>
              You will be able to manage your Students of ENICarthage.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of teachers ?</h3>
            <p>
              You can <strong>NOW</strong> manage your Students of ENICarthage
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>

    <!-- partie ajax de verifification de login -->
    <!-- <script>
        $(document).ready(function()){
          $('#fo').on('submit', function(event)){
            event.preventDefault();
            $.ajax({
              url: "check_login.php",
              method: "POST",
              data: (this).serialize(),
              dataType : "json",
              beforeSend: function(){
                $('#signin').val('validate...');
                $('#signin').attr('disabled', 'disabled');

              },
              success:function(data){
                if (data.console.error()){
                  $('#signin').val('login');
                  $('#signin').attr('disabled',false);
                  if (data.error_email !='')
                  {
                    $('#error_email').text(data.error_email);
                  }else{
                    $('#error_email').text('');
                  }
                  if (data.error_password !='')
                  {
                    $('#error_password').text(data.error_password);

                  }else{
                        $('#error_password').text('');
                  }
                }
              }

            });
          });
        });
      
    </script> -->


  </body>

</html>