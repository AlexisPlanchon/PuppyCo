<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PuppyStore</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>public/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>public/css/item.css" rel="stylesheet">


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php site_url("C_index") ?>">PuppyStore</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <?php if (isset($_SESSION['username'])) {
            echo '<li class="nav-item"><a class="nav-link"> Bienvenue ' . $_SESSION['username'] . ' !</a></li>';
            echo '<li class="nav-item"> <a class="nav-link" href="' . site_url("C_login") . '/logout">Déconnexion</a>  </li>';
          } else {
            echo '<li class="nav-item"> <a class="nav-link" href="' . site_url("C_login") . '">Connexion</a>  </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <br>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- /.col-lg-3 -->
      <div class="col-lg-9 text-center">
        <div class="h2">Modifier le mot de passe</div><br>
        <ul class="list-group list-group-flush" id="list">
        </ul>
        Client<select class="form-control" id="select_users"></select><br>
        Nouveau mot de passe<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Nouveau mot de passe"><br><br>
        <button class="btn btn-warning" onClick="modif_mdp()">Mettre à jour</button>
      </div>
      <!-- /.col-lg-9 -->
      <!-- lateral menu -->

      <div class="col-lg-3">

        <h1 class="my-4">PuppyStore</h1>

        <div class="list-group">
          <?php
          echo '<a class="list-group-item list-group-item-action" href="' . site_url("C_index") . '" class="list-group-item">Accueil</a>';
          echo '<a class="list-group-item list-group-item-action" href="' . site_url("C_admin") . '/produit" class="list-group-item">Catalogue produit</a>';
          echo '<a class="list-group-item list-group-item-action" href="' . site_url("C_admin") . '/category" class="list-group-item">Catégories</a>';
          echo '<a class="list-group-item list-group-item-action" href="' . site_url("C_admin") . '/clients" class="list-group-item">Clients</a>';
          echo '<a class="list-group-item list-group-item-action" href="' . site_url("C_admin") . '/commands" class="list-group-item">Commandes</a>';
          echo '<a class="list-group-item list-group-item-action" href="' . site_url("C_admin") . '/mdp" class="list-group-item">Changement mot de passe</a>';
          ?>
        </div>
      </div>

    </div>
  </div>
  <br>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; PuppyStore 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>public/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<script>
  //Chargement au début de la page
  $(document).ready(function() {
    get_users();
  });


  //Fonction qui va put une categorie
  function modif_mdp() {
    var mdp = document.getElementById("mdp").value;
    var ecat = document.getElementById("select_users");
    var idusers = ecat.options[ecat.selectedIndex].value;
    $.ajax({
      url: "http://127.0.0.1/puppyapi/mdp",
      type: 'PUT',
      data: 'idusers=' + idusers + '&mdp=' + mdp,
      success: function() {
        get_users();

      }
    });
  }



  //Fonction qui va recupérer nos categories	
  function get_users() {
    $.ajax({
      type: "GET",
      data: {},
      url: "http://127.0.0.1/puppyapi/mdp",
      success: function(data) {
        select_users = '';
        for (var i = 0; i < data.response.length; i++) {
          select_users = '<option id="option' + data.response[i].idusers + '" value="' + data.response[i].idusers + '">' + data.response[i].idusers + " - " + data.response[i].login + '</option>' + select_users;
        }
        document.getElementById("select_users").innerHTML = select_users;
      }
    });
  }
</script>