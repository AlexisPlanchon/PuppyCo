<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<?php
$nbitem = 0;
foreach ($result as $row) {
  $arrayimage['idimage'][] = $row['idmvctable'];
  $arrayimage['name'][] = $row['name'];
  $arrayimage['prix'][] = $row['prix'];
  $arrayimage['description'][] = $row['description'];
  $nbitem++;
}

$nbcat = 0;
foreach ($result_cat as $rowcat) {
  $category[] = $rowcat['category'];
  $nbcat++;
}


?>

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
  <link href="<?php echo base_url(); ?>public/css/shop-homepage.css" rel="stylesheet">
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
          <?php 
		  if (isset($_SESSION['username'])) {
            echo '<li class="nav-item"><a class="nav-link"> Bienvenue ' . $_SESSION['username'] . ' !</a>  </li>';
			if($_SESSION['admin'] == 1){
			 echo '<li class="nav-item"> <a class="nav-link" href="' . site_url("C_admin") . '">Admin</a>  </li>';	
			}
            echo '<li class="nav-item"><a class="nav-link" href="' . site_url("C_Cart") . '/selectcard/' . $_SESSION['idclient'] . '"> Mon panier</a> </li>';
            echo '<li class="nav-item"> <a class="nav-link" href="' . site_url("C_login") . '/logout">Déconnexion</a>  </li>';
          } else {
            echo '<li class="nav-item"> <a class="nav-link" href="' . site_url("C_login") . '">Connexion</a>  </li>';
          }
          ?>
          <?php if (isset($_SESSION['username'])) { 

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
      <div class="col-lg-9">
        <div class="row">
          <?php
          for ($y = 0; $y <= $nbitem - 1; $y++) {
            if (isset($_SESSION['username'])) {
              $chemin = site_url("C_index") . '/addcart/' . $arrayimage['idimage'][$y];
            } else {
              $chemin = site_url("C_login");
            }
            echo ' <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="' . site_url("C_item") . '/item/' . $arrayimage['idimage'][$y] . '"><img class="card-img-top" src="' . base_url() . 'public/img/produit' . $arrayimage['idimage'][$y] . '.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a class="btn btn-light" href="' . site_url("C_item") . '/item/' . $arrayimage['idimage'][$y] . '">' . $arrayimage['name'][$y] . '</a>
                </h4>
                <h5>' . $arrayimage['prix'][$y] . '€</h5>
                <p class="card-text">' . $arrayimage['description'][$y] . '</p>
              </div>
              <div class="card-footer">
                <a href="' . $chemin . '" type="button" class="btn btn-success">Ajouter au panier</a>
              </div>
            </div>
          </div>';
          }
          ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->
      <!-- lateral menu -->
      <div class="col-lg-3">
        <h1 class="my-4">PuppyStore</h1>
        <div class="list-group">
          <div class="container">
            <div class="form-group">
              <div class="input-group">
                <input type="text" name="search_text" id="search_text" placeholder="Rechercher un article" class="form-control" />
              </div>
            </div>
            <br />
            <div id="result"></div>
          </div>
          <div style="clear:both"></div>
          <?php
          echo '
				<a class="list-group-item list-group-item-action" href="' . site_url("C_index") . '" class="list-group-item">Accueil</a>';
          for ($i = 0; $i <= $nbcat - 1; $i++) {
            echo '<a class="list-group-item list-group-item-action" href="' . site_url("C_index") . '/category/' . $category[$i] . '" class="list-group-item">' . $category[$i] . '</a>';
          }
          ?>
        </div>
        <!-- Search form -->
      </div>
    </div>
    <!-- /.row -->
  </div>
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
  $(document).ready(function() {
    load_data();

    function load_data(query) {
      $.ajax({
        url: "<?php echo site_url("C_index"); ?>/fetch",
        method: "POST",
        data: {
          query: query
        },
        success: function(data) {
          $('#result').html(data);
        }
      })
    }
    $('#search_text').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });
  });
</script>