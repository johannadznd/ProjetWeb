<?php

require_once '../views/Layout/header.php';
require_once '../Fonctions/bien.php';
$search = $_GET['search'] ?? null ;
$place = $_GET['place'] ?? null ;

$biens = getAnnounce($search,$place);
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
			<input type="date" >
			<label>Date de départ : </label>
			<input type="date" >
		</div>
		<div id="nbrPers">
			<label>Nombre de personnes : </label>
			<input id="place" name="place" type="number" placeholder="2" require>
		</div>
			<button>Recherche</button>
		</form>
        </figcaption>
	</figure>


	



	<h2>Les meilleurs avis</h2>

		<div id="Carousel">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
					<img src="/Image/villa1.jpg" class="d-block w-60">
					<div class="carousel-caption d-none d-md-block">
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
						<h3 style="color:black">Magnifique villa </h3>
					</div>
					</div>
					<div class="carousel-item">
					<img src="Image/villa2.jpg" class="d-block w-60">
					<div class="carousel-caption d-none d-md-block">
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
						<h3 style="color:black">Très bon emplacement</h3>
					</div>
					</div>
					<div class="carousel-item">
					<img src="Image/villa3.jpg" class="d-block w-60" >
					<div class="carousel-caption d-none d-md-block">
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
					<i class="fas fa-star" style="color: black"></i>
						<h3 style="color:black">Parfait pour des vacances</h3>
					</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Précédent</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Suivant</span>
				</a>
			</div>
	</div>
	<h2>Destination les plus prisées</h2>
	<div id="Destination">
	<section>
		<img src="Image/paris.webp">
		<h3>Paris</h3>
		<p>Ville romantique par excellence, elle attire les touristes tout au long de l'année. La capitale française est si riche qu'il ne suffit pas de quelques heures pour la visiter.</p>
		<p>Entre monuments, musées, boutiques, parcs, gastronomie, les choix ne manquent pas ! Quelles que soient vos préférences, vous apprécierez cette ville aux mille visages.</p>
		<a><button>Voir +</button></a>
	</section>
	<section>
		<img src="Image/st-tropez.jpg">
		<h3>Saint-Tropez</h3>
		<p>Capitale touristique internationale, devenu un mythe, St Tropez a contribué à la renommée de la Côte d'Azur.</p>
		<p>A St Tropez tout y est célèbre et célébré :</p>
		<p>- La place des Lices où, sous les platanes, ont lieu des parties de pétanques mêlant vedettes du show business et locales portant les fameuses sandales de cuir, les "Tropéziennes" et sirotant le Pastis à l'apéritif.</p>
		<a><button>Voir +</button></a>	</section>
	</div>

</main>
<?php 
require_once '../views/Layout/footer.php';
?>

