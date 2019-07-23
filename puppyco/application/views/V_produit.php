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
        <div class="h2">Ajouter un article</div>
        Identifiant (Ignoré si création) <select class="form-control" id="select"></select><br>
        Nom<input class="form-control" type="text" id="name" name="name" placeholder="Nom"><br>
        Prix<input class="form-control" type="text" id="prix" name="prix" placeholder="Prix"><br>
        Description<input class="form-control" type="text" id="description" name="description" placeholder="Description"><br>
        Catégorie<select class="form-control" id="select_category"></select><br>
        Stock<input class="form-control" type="text" id="stock" name="stock" placeholder="Stock"><br>
        <button class="btn btn-success" onClick="ajout_produit()">Ajouter</button>
        <button class="btn btn-warning" onClick="modif_produit()">Mettre à jour</button><br><br>
        <div class="h2">Liste des articles</div>
        <button onClick="delete_produit()" class="btn btn-danger">Supprimer la sélection</button><br><br>
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
    get_produit();
    get_category();
  });

  //Fonction qui va delete une categorie
  function delete_produit() {
    $("input:checkbox[name=checkbox]:checked").each(function() {
      clicked_id = $(this).val();
      $.ajax({
        url: "http://127.0.0.1/puppyapi/produit/" + clicked_id + "",
        type: 'DELETE',
        success: function() {
          get_produit();
        },
        error: function() {
          alert("Une erreur est survenue")
        },
      });
    });
  }

  //Fonction qui va put une categorie
  function modif_produit() {
    var name = document.getElementById("name").value;
    var prix = document.getElementById("prix").value;
    var description = document.getElementById("description").value;
    var stock = document.getElementById("stock").value;
    var e = document.getElementById("select");
    var id = e.options[e.selectedIndex].value;
    var ecat = document.getElementById("select_category");
    var select_cat = ecat.options[ecat.selectedIndex].value;
    $.ajax({
      url: "http://127.0.0.1/puppyapi/produit/",
      type: 'PUT',
      data: 'name=' + name + '&prix=' + prix + '&description=' + description + '&stock=' + stock + '&id=' + id + '&select_cat=' + select_cat,
      success: function() {
        get_produit();
      }
    });
  }

  //Fonction qui va recupérer nos categories	
  function get_category() {
    $.ajax({
      type: "GET",
      data: {},
      url: "http://127.0.0.1/puppyapi/category",
      success: function(data) {
        console.log(data);
        select_cate = '';
        for (var i = 0; i < data.response.length; i++) {
          select_cate = '<option id="option' + data.response[i].idcategory + " - " + data.response[i].idcategory + '" value="' + data.response[i].idcategory + '">' + data.response[i].idcategory + " - " + data.response[i].category + '</option>' + select_cate;
        }
        document.getElementById("select_category").innerHTML = select_cate;
      }
    });
  }


  //Fonction qui va recupérer nos categories	
  function get_produit() {
    $.ajax({
      type: "GET",
      data: {},
      url: "http://127.0.0.1/puppyapi/produit",
      success: function(data) {
        console.log(data);
        list = '';
        select = '';
        for (var i = 0; i < data.response.length; i++) {
          list = '<li class="list-group-item" >' +
            'Name : ' + data.response[i].name + '<br>' +
            'Identifiant : ' + data.response[i].idmvctable + '<br>' +
            "Prix : " + data.response[i].prix + '€ ' + '<br>' +
            'Description : ' + data.response[i].description + '<br>' +
            'Categorie : ' + data.response[i].category + '<br><br>' +
            'Supprimer : <input type="checkbox" name="checkbox" value="' + data.response[i].idmvctable + '"></li>' +
            list;
          select = '<option id="option' + data.response[i].idmvctable + '" value="' + data.response[i].idmvctable + '">' + data.response[i].idmvctable + ' - ' + data.response[i].name + '</option>' + select;
        }
        document.getElementById("list").innerHTML = list;
        document.getElementById("select").innerHTML = select;
      }
    });
  }

  //Fonction qui ajoute une categorie 
  function ajout_produit() {
    var name = document.getElementById("name").value;
    var prix = document.getElementById("prix").value;
    var description = document.getElementById("description").value;
    var stock = document.getElementById("stock").value;
    var ecat = document.getElementById("select_category");
    var select_cat = ecat.options[ecat.selectedIndex].value;
    $.ajax({
      url: "http://127.0.0.1/puppyapi/produit/",
      type: 'POST',
      data: 'name=' + name + '&prix=' + prix + '&description=' + description + '&stock=' + stock + '&select_cat=' + select_cat,
      success: function() {
        get_produit();
      },
      error: function() {
        alert("Une erreur est survenue")
      },
    });
  }
</script>