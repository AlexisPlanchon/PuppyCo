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
        <div class="h2">Ajouter un client</div>
        Identifiant <input class="form-control" type="text" id="login" placeholder="Identifiant" name="login"><br>
        Adresse mail <input class="form-control" type="text" id="mail" placeholder="Adresse mail" name="mail"><br>
        <button class="btn btn-success" onClick="post_client()">Ajouter</button><br><br>
        <div class="h2">Liste des clients</div>
        <button onClick="delete_users()" class="btn btn-danger">Supprimer la sélection</button><br><br>
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
  <br>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; PuppyStore 2019</p>


    </div>
    <!-- /.container -->
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

  //Fonction qui va delete une categorie
  function delete_users() {
    $("input:checkbox[name=checkbox]:checked").each(function() {
      clicked_id = $(this).val();
      $.ajax({
        url: "http://127.0.0.1/puppyapi/clients/" + clicked_id + "",
        type: 'DELETE',
        success: function() {
          get_users();
        },
        error: function() {
          alert("Une erreur est survenue")
        },
      });
    });
  }

  //Fonction qui va put une categorie
  function put_users(clicked_id) {

    var id = clicked_id.replace("cate", "");
    var idmail = "mail" + id;
    var mail = document.getElementById(idmail).value;
    var idlogin = "login" + id;
    var login = document.getElementById(idlogin).value;
    $.ajax({
      url: "http://127.0.0.1/puppyapi/clients/",
      type: 'PUT',
      data: 'login=' + login + '&mail=' + mail + '&id=' + id,
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
      url: "http://127.0.0.1/puppyapi/clients",
      success: function(data) {
        console.log(data);
        list = '';
        for (var i = 0; i < data.response.length; i++) {
          list = '<li class="list-group-item" >' +
            'Identifiant : ' + data.response[i].login + ' | ' +
            'Adresse mail : ' + data.response[i].mail + '<br>' +
            '<input class="form-control" placeholder="Nouveau identifiant" type="text" id="login' + data.response[i].idusers + '">' +
            '<input class="form-control" placeholder="Nouveau mail" type="text" id="mail' + data.response[i].idusers + '">' + '<br>' +
            '<button id="cate' + data.response[i].idusers + '" onClick="put_users(this.id)" class="btn btn-warning">Mettre à jour</button>' + '<br><br>' +
            'Supprimer : <input type="checkbox" name="checkbox" value="' + data.response[i].idusers + '">' +
            '</li>' + list;
        }
        document.getElementById("list").innerHTML = list;
      }
    });
  }

  //Fonction qui ajoute une categorie 
  function post_client() {
    var login = document.getElementById("login").value;
    var mail = document.getElementById("mail").value;
    $.ajax({
      url: "http://127.0.0.1/puppyapi/clients/",
      type: 'POST',
      data: 'login=' + login + '&mail=' + mail,
      success: function() {
        get_users();
      },
      error: function() {
        alert("Une erreur est survenue")
      },
    });
  }
</script>