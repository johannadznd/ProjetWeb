<?php

require_once '../views/Layout/header.php';
require_once '../Fonctions/bien.php';
$search = $_GET['search'] ?? null ;
$place = $_GET['place'] ?? null;
$StartDate = $_GET['StartDate'] ?? null ;
$EndDate = $_GET['EndDate'] ?? null ;
$biens = getAnnounce($search,$place,$StartDate,$EndDate);

?>
<main>
	 <figure>
	 	<img src="Image/montagne.jpg">
        <figcaption>
			<h1>Recherche</h1>
		<form action="recherche.php">
		<div > 
			<label>Ou voulez-vous partir : </label>
			<input type="text" id="search" name="search" placeholder="Lyon" >
		</div>
		<div id="date">
			<label>Date d'arrivé : </label>
			<input type="date" id="StartDate" name="StartDate" >
			<label>Date de départ : </label>
			<input type="date" id="EndDate" name="EndDate" >
		</div>
		<div id="nbrPers">
			<label>Nombre de personnes : </label>
			<input id="place" name="place" type="number" placeholder="2" >
		</div>
		
			<button>Recherche</button>
		</form>
        </figcaption>
	</figure>

	
	<h2>Destination les plus prisées</h2>
	<div id="Destination">
	<section>
		<img src="Image/paris.webp">
		<h3>Paris</h3>
		<p>Ville romantique par excellence, elle attire les touristes tout au long de l'année. La capitale française est si riche qu'il ne suffit pas de quelques heures pour la visiter.</p>
		<p>Entre monuments, musées, boutiques, parcs, gastronomie, les choix ne manquent pas ! Quelles que soient vos préférences, vous apprécierez cette ville aux mille visages.</p>
		<a href="Recherche.php?search=paris&StartDate=&EndDate=&place="><button>Voir +</button></a>
	</section>
	<section>
		<img src="Image/st-tropez.jpg">
		<h3>Saint-Tropez</h3>
		<p>Capitale touristique internationale, devenu un mythe, St Tropez a contribué à la renommée de la Côte d'Azur.</p>
		<p>A St Tropez tout y est célèbre et célébré :</p>
		<p>- La place des Lices où, sous les platanes, ont lieu des parties de pétanques mêlant vedettes du show business et locales portant les fameuses sandales de cuir, les "Tropéziennes" et sirotant le Pastis à l'apéritif.</p>
		<a href="Recherche.php?search=Saint_tropez&StartDate=&EndDate=&place="><button>Voir +</button></a>	
	</section>
	</div>

</main>
<?php 
require_once '../views/Layout/footer.php';
?>

