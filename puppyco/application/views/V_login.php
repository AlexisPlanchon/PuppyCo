

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>PuppyStore Login</title>
  
  
  

      <link href="<?php echo base_url(); ?>public/css/bootstrap.css" rel="stylesheet">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php site_url("C_index") ?>">PuppyStore</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <br>
  <div class="container border border-secondary" style="text-align:center; padding-top:5%">
    <form class="form-signin" enctype="multipart/form-data" method="post" action="<?php echo site_url("C_login")?>/create" style="display: none;"">
    <h2 class="form-signin-heading">Création d'un compte</h2>
      <input class="form-control" type="text"  name="usernamecreate" placeholder="Identifiant"/><br>
      <input class="form-control" type="password"  name="passwordcreate" placeholder="Mot de passe"/><br>
      <input class="form-control" type="text" name="emailcreate" placeholder="Adresse mail"/><br>
      <button class="btn btn-lg btn-success btn-block" id="create_button" type="submit" >Création du compte</button><br>
      <a type="button" class="btn btn-danger" onClick="window.location.reload();">Annuler</a><br><br>
    </form>
    <form class="form-signin" enctype="multipart/form-data" method="post" action="<?php echo site_url("C_login")?>/connect" style="display: block;">
    <h2 class="form-signin-heading">Connexion</h2>
      <input class="form-control" type="text" name="username" placeholder="Identifiant"/><br>
      <input class="form-control" type="password" name="password"  placeholder="Mot de passe"/><br>
      <button class="btn btn-lg btn-success btn-block" type="submit" name='login_button' value="Login"/>Connexion</button>
	   <?php echo'<label>'.$this->session->flashdata("error").'</label>';?>
      <p class="message"><a href="#">Pas de compte ? Création d'un compte !</a></p>
	  <br>
    </form>
  <?php echo'<a type="button" class="btn btn-primary" href="'.site_url("C_index").'">Accueil</a>';?><br><br>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="<?php echo base_url(); ?>public/js/login.js"></script>

</body>
</html>