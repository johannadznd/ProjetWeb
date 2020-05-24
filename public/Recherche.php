<?php

require_once '../views/Layout/header.php';
require_once '../Fonctions/bien.php';
$search = $_GET['search'] ?? null ;
$place = $_GET['place'] ?? null;
$StartDate = $_GET['StartDate'] ?? null ;
$EndDate = $_GET['EndDate'] ?? null ;
$biens = getAnnounce($search,$place,$StartDate,$EndDate);
?>
<h1>Votre recherche</h1>

<div id="recherche">
  <form action="Recherche.php">
      <div id="search"> 
        <label>Ville : </label>
        <input id="search" name="search" value="<?php echo $search; ?>">
      </div>
      <div id="date">
        <label>Date d'arrivé : </label>
        <input type="date" id="StartDate" name="StartDate" value="<?php echo $StartDate; ?>">
        <label>Date de départ : </label>
        <input type="date" id="EndDate" name="EndDate" value="<?php echo $EndDate; ?>">
      </div>
      <div id="nbrPers">
        <label>Nombre de personnes : </label>
        <input id="place" name="place"  type="number" placeholder="2" value="<?php echo $place; ?>">
      </div>
        <button>Modifier</button>
  </form>
</div>

<h2>Ces résultats correspondent à votre recherche</h2>
<?php
foreach ($biens as $bien) {
  require '../views/page/recherche.php';
}


if (empty($biens)) { ?>
  <div class="alert alert-danger col-12" role="alert">
    Aucun résultat n'a été trouvé !
  </div>
<?php }
require_once '../views/Layout/footer.php';
?>

