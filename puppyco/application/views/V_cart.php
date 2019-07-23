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


<!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>public/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>public/css/item.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<div class="container">

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

    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Panier
            <?php
            echo ' <a href="' . site_url("C_index") . '" class="btn btn-light btn-sm pull-right">Continuer vos achats</a>';
            ?>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCT -->
            <form id='articles'>
                <?php for ($i = 0; $i <= $nbitems - 1; $i++) {
                    echo ' <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="' . base_url() . 'public/img/produit' . $arraycart['iditem'][$i] . '.jpg" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>' . $arraycart['name'][$i] . '</strong></h4>
                            <h4>
                                <small>' . $arraycart['description'][$i] . '</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>' . $arraycart['prix'][$i] . '€ <span class="text-muted">x </span><strong>' . $arraycart['quantity'][$i] . ' <span class="text-muted"></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <h6></span></strong></h6>
                                </div>
                            </div>
                            
                            <div class="row">
                            <a href="' . site_url('C_cart') . '/removecart/' . $arraycart['iditem'][$i] . '">
                                 <button type="button" class="btn btn-danger btn-xs" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                </a>
                                <br>
							<a href="' . site_url("C_cart") . '/addcart/' . $arraycart['iditem'][$i] . '">
                                 <button type="button" class="btn btn-success" >
                                    <i class="fa" aria-hidden="true">+</i>
                                </button>
							</a>
                            </div>
							
							
                        </div>
                    </div>
	<hr>';
                } ?>
                <!-- END PRODUCT -->

                <div class="pull-right">


            </form>
        </div>
    </div>
    <div class="card-footer">
        <div class="pull-right" style="margin: 10px">
            <?php echo '<a href="' . site_url("C_Pay") . '/selectcard/' . $_SESSION['idclient'] . '" class="btn btn-success pull-right">Payer</a>'; ?>
            <div class="pull-right" style="margin: 5px">
                Prix Total: <b><?php echo $prixtotal; ?>€</b>
            </div>
        </div>
    </div>
</div>
</div>
<br>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; PuppyStore 2019</p>
    </div>
    <!-- /.container -->
</footer>

<script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>public/js/cart.js"></script>