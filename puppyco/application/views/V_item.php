<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<?php
foreach ($result_item as $row_item) {
  $idimage = $row_item['idmvctable'];
  $name = $row_item['name'];
  $prix = $row_item['prix'];
  $description = $row_item['description'];
  $stock = $row_item['stock'];
}

$nbcat = 0;
foreach ($result_cat as $rowcat) {
  $category[] = $rowcat['category'];
  $nbcat++;
}

$nbreviews = 0;
foreach ($result_reviews as $row_reviews) {
  $arrayreviews['reviews'][] = $row_reviews['reviews'];
  $arrayreviews['author'][] = $row_reviews['author'];
  $nbreviews++;
}

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
            echo '<li class="nav-item"><a class="nav-link" href="' . site_url("C_Cart") . '/selectcard/' . $_SESSION['idclient'] . '"> Mon panier</a> </li>';
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

      <div class="col-lg-9">

        <div class="card mt-4">
          <?php echo '<img class="card-img-top img-fluid" src="' . base_url() . 'public/img/produit' . $idimage . '.jpg" alt="">'; ?>
          <div class="card-body">
            <h3 class="card-title"><?php echo $name; ?></h3>
            <h4><?php echo $prix; ?>€</h4>
            <p class="card-text">Stock : <?php echo $stock; ?></p>
            <p class="card-text"><?php echo $description; ?></p>
            <?php
            echo '
                <a class="btn btn-success" href="' . site_url("C_index") . '/addcart/' . $idimage . '">Ajoutez au panier</a>';
            ?>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Avis clients
          </div>
          <div class="card-body">
            <?php
            for ($i = 0; $i <= $nbreviews - 1; $i++) {
              echo "<p>" . $arrayreviews['reviews'][$i] . "</p>";
              echo '<small class="text-muted">Poste par ' . $arrayreviews['author'][$i] . '.</small>
            <hr>';
            } ?>
            <a href="#" class="btn btn-success">Retouner en haut</a>
          </div>
        </div>
        <!-- /.card -->

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
    </div>
  </div>
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