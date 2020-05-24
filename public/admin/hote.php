<?php 

require_once '../../Fonctions/bien.php';
require_once '../../views/Layout/header.php';
require_once '../../Fonctions/connection.php';

if(isset($_SESSION['state']) && $_SESSION["state"] == "connected") {

} else {
  redirect('/admin/connexion.php');
}
?>

<figure>
	 	<img style="width: 100%" src="/Image/chambre1.jpg">
        <figcaption style="height: 55%">
			<h1>Devenir hôte</h1>
            <p style="text-align:center" >Pour devenir hôte nous devons récoltés des informations sur votre lieu</p>
            <p style="text-align:center" >Si vous cliquez sur le bouton, vous confirmez être majeur et avoir pris connaissance de toutes les conditons </p>
			<a href="/admin/insertbien.php?id=<?php echo $_SESSION['id'] ?>"><button id="hote">Devenir hôte</button></a>
        </figcaption>
    </figure>
    
<?php    
require_once '../../views/Layout/footer.php'
?>