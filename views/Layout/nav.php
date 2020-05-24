<nav>

	<?php  @session_start(); ?>
	<a id="logo" href="/index.php"><img src="/Image/logo.jpg"></a>
	<a href="/index.php">Accueil</a>
	<a href="/admin/hote.php">Devenir Hôte</a>
	<?php
      if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') { ?>
		  <a href="/admin/profil.php?id=<?php echo $_SESSION['id'] ?>">Profil</a>
	<?php } else{
			?>	<a href="/admin/inscription.php">S'inscrire</a>
			<?php
	} 
	?>
		<?php
      if (isset($_SESSION['state']) && $_SESSION['state'] == 'connected') { ?>
		  <a href="/admin/deconnexion.php">Déconnexion</a>
	<?php } else{
			?><a href="/admin/connexion.php">Se connecter</a><?php
	} 
	?>

	</nav>