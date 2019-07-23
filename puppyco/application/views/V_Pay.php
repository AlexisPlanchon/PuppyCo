<?php
$nbitems = 0;
$prixarticle = 0;
$prixtotal = 0;
foreach ($result_cart as $row_cart) {
  $arraycart['iditem'][] = $row_cart['iditem'];
  $arraycart['name'][] = $row_cart['name'];
  $arraycart['quantity'][] = $row_cart['quantity'];
  $arraycart['description'][] = $row_cart['description'];
  $arraycart['prix'][] = $row_cart['prix'];
  $prixarticle = $row_cart['quantity'] * $row_cart['prix'];
  $arraycart['prixarticle'][] = $prixarticle;
  $prixtotal = $prixarticle + $prixtotal;
  $nbitems++;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
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

  <div class="container border border-secondary" style="text-align:center; padding-top:5%">
    <form class="form-signin">
      <h2 class="form-signin-heading">Récapitulatif</h2>
      <hr>
      <?php
      for ($i = 0; $i <= $nbitems - 1; $i++) {
        echo '<p>' . $arraycart['name'][$i] . ' x ' . $arraycart['quantity'][$i] . ' = ' . $arraycart['prixarticle'][$i] . '€</p>';
      }
      ?>
      <hr>
      <p>Total : <?php echo $prixtotal; ?>€</p><br>
    </form>

    <div class="form">
      <form class="login-form" enctype="multipart/form-data">
        <h2 class="form-signin-heading">Procéder au paiement</h2>
        <input class="form-control" type="cart" placeholder="Numéro de Carte" /><br>
        <input class="form-control" type="adress" placeholder="Adresse de Livraison" /><br>
        <a class="btn btn-warning" href="<?php echo site_url("C_Cart"); ?>/selectcard/<?php echo $_SESSION['idclient']; ?>">Retourner au Panier</a>
        <?php echo '<a class="btn btn-success" href="' . site_url("C_Pay") . '/pay/' . $_SESSION['idclient'] . '">Payer</a>'; ?>
      </form>
    </div>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="<?php echo base_url(); ?>public/js/login_ajax.js"></script>

</body>

</html>