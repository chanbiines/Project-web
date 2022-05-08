<?php

session_start();
if (!(isset($_SESSION["autoriser"]))) {
  header("location:SignInUp.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="Walid SAAD" />
  <meta name="generator" content="Hugo 0.88.1" />
  <title>SCO-ENICAR</title>
  <!-- Bootstrap core CSS -->
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap core JS-JQUERY -->
  <script src="./assets/dist/js/jquery.min.js"></script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>



  <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/carousel/">
  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>
<!-- onLoad="document.fo.login.focus()" -->

<body>

  <?php
  require "header.php";
  ?>

  <style>

  </style>

  <main role="main">
    <!--the zone of carousel to walid saad  -->
    <section>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="/img/windowqs-lhDjusLtpP4-unsplash.jpg" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false">
              <title> </title>
              <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"> </text>
            </svg>
            <div class="container">
              <div class="carousel-caption text-left">
                <div class="overlay-image"></div>

                <h1>Bonjour, Mr SAAD !</h1>
                <p> Voila l'espace de Gestion de votre Etudiants de L'ENICarthage , bienvenue !!</p>
                <p><a class="btn btn-lg btn-primary" href="groupe.php">Mes groupes </a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false">
              <title> </title>
              <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"> </text>
            </svg>

            <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Some representative placeholder content for the second slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false">
              <title> </title>
              <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em"> </text>
            </svg>

            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Some representative placeholder content for the third slide of this carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>

    </section>

    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2>Heading</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2>Heading</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="/images/login.svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2>Heading</h2>
          <p>And lastly this, the third column of representative placeholder content.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- Main jumbotron for a primary marketing message or call to action -->
      <!-- <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Bonjour, Mr SAAD !</h1>
        <p>
          Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.
          Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo
          risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo
          cursus magna.
        </p>
        <p>
          <a class="btn btn-primary btn-lg" href="groupe.php" role="button">Mes Groupes &raquo;</a>
        </p>
      </div>
    </div> -->

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>INFO1</h2>
            <p>
              Donec sed odio dui. Etiam porta sem malesuada magna mollis
              euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.
              Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
              Praesent commodo cursus magna.
            </p>
            <p>
              <a class="btn btn-secondary" href="#" role="button">Voir les Groupes &raquo;</a>
            </p>
          </div>
          <div class="col-md-4">
            <h2>INFO2</h2>
            <p>
              Donec sed odio dui. Etiam porta sem malesuada magna mollis
              euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.
              Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
              Praesent commodo cursus magna.
            </p>
            <p>
              <a class="btn btn-secondary" href="#" role="button">Voir les Groupes &raquo;</a>
            </p>
          </div>
          <div class="col-md-4">
            <h2>INFO3</h2>
            <p>
              Donec sed odio dui. Etiam porta sem malesuada magna mollis
              euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.
              Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
              Praesent commodo cursus magna.
            </p>
            <p>
              <a class="btn btn-secondary" href="#" role="button">Voir les Groupes &raquo;</a>
            </p>
          </div>
        </div>

        <hr />
      </div>
      <!-- /container -->
  </main>
  </script>
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>



  <?php
  require "footer.php";
  ?>
</body>

</html>