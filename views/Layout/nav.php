<nav>
	<a id="logo" href="/index.php"><img src="Image/logo.jpg"></a>
	<a href="/index.php">Accueil</a>
	<a href="#">Devenir Hôte</a>
	<?php
      @session_start();
      if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') { ?>
		  <a href="#">Profil</a>
	<?php } else{
			?>	<a href="/inscription.php">S'inscrire</a>
			<?php
	} 
	?>
		<?php
      @session_start();
      if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') { ?>
		  <a href="/deconnexion.php">Déconnexion</a>
	<?php } else{
			?><a href="/connexion.php">Se connecter</a><?php
	} 
	?>
	<a href="#">Aide</a>
	</nav>