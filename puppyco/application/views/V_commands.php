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
            echo '<li class="nav-item"><a class="nav-link"> Bienvenue ' . $_SESSION['username'] . ' !</a>  </li>';
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
        <div class="h2">Ajouter une commande</div>
        Client<select class="form-control" id="select_users"></select><br>
        <button class="btn btn-success" onClick="ajout_commands()">Ajouter</button><br><br>
        <div class="h2">Modifier une commande</div>
        Numéro de commande<select class="form-control" id="select_commands"></select><br>
        Client<select class="form-control" id="select_users2"></select><br>
        Date<input class="form-control" type="date" name="date" id="date"><br>
        <button class="btn btn-warning" onClick="modif_commands()">Mettre à jour</button><br><br>
		 <button onClick="delete_commands()" class="btn btn-danger">Supprimer la sélection</button><br><br>
        <div class="h2">Liste des commandes</div>
        <ul class="list-group list-group-flush" id="list">
        </ul>
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
    get_commands();
    get_users();
  });

  //Fonction qui va delete une categorie
  function delete_commands() {
	$("input:checkbox[name=checkbox]:checked").each(function() {
    clicked_id = $(this).val();  
    $.ajax({
      url: "http://127.0.0.1/puppyapi/commands/" + clicked_id + "",
      type: 'DELETE',
      success: function() {
        get_commands();
      },
      error: function() {
        alert("Une erreur est survenue")
      },
    });
   });
  }

  //Fonction qui va put une categorie
  function modif_commands() {
    var ecat = document.getElementById("select_commands");
    var idcommands = ecat.options[ecat.selectedIndex].value;
    var ecat = document.getElementById("select_users2");
    var idusers = ecat.options[ecat.selectedIndex].value;
    var date = document.getElementById("date").value;
    $.ajax({
      url: "http://127.0.0.1/puppyapi/commands",
      type: 'PUT',
      data: 'idusers=' + idusers + '&idcommands=' + idcommands + '&date=' + date,
      success: function() {
        get_commands();
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
        select_users2 = ''
        for (var i = 0; i < data.response.length; i++) {
          select_users = '<option id="option' + data.response[i].idusers + '" value="' + data.response[i].idusers + '">' + data.response[i].idusers + " - " + data.response[i].login + '</option>' + select_users;
          select_users2 = '<option id="option' + data.response[i].idusers + '" value="' + data.response[i].idusers + '">' + data.response[i].login + '</option>' + select_users2;
        }
        document.getElementById("select_users").innerHTML = select_users;
        document.getElementById("select_users2").innerHTML = select_users2;
      }
    });
  }


  //Fonction qui va recupérer nos categories	
  function get_commands() {
    $.ajax({
      type: "GET",
      data: {},
      url: "http://127.0.0.1/puppyapi/commands",
      success: function(data) {
        console.log(data);
        list = '';
        select_commands = '';
        for (var i = 0; i < data.response.length; i++) {
          list = '<li class="list-group-item" >' +
            'Commande N°' +
            data.response[i].idcommands +
            " Pour le client : " +
            data.response[i].login + '<br>' +
               'Supprimer : <input type="checkbox" name="checkbox" value="' + data.response[i].idcommands + '"></li>' + list;
          select_commands = '<option id="option' + data.response[i].idcommands + '" value="' + data.response[i].idcommands + '">' + data.response[i].idcommands + '</option>' + select_commands;
        }
        document.getElementById("list").innerHTML = list;
        document.getElementById("select_commands").innerHTML = select_commands;
        document.getElementById("select_users2").innerHTML = select_users;
      }
    });
  }


  //Fonction qui ajoute une categorie 
  function ajout_commands() {
    var ecat = document.getElementById("select_users");
    var idusers = ecat.options[ecat.selectedIndex].value;
    $.ajax({
      url: "http://127.0.0.1/puppyapi/commands",
      type: 'POST',
      data: 'idusers=' + idusers,
      success: function() {
        get_commands();
      },
      error: function() {
        alert("Une erreur est survenue")
      },
    });
  }
</script>