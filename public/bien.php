<?php 

require_once '../views/Layout/header.php';
require_once '../Fonctions/pdo.php';

if (!isset($_GET['id'])) { ?>
    <div class="alert alert-danger" role="alert">
      Paramètre manquant : id
    </div>
    <?php
    exit ;
}

$id = $_GET['id'];
$pdo = getPdo();
$query = "SELECT * FROM announce where id = $id";

$stmt = $pdo->query($query);
$bien = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<h1><?php echo $bien['Titles'];?></h1>

<article id="bien">
<img style="width: 40%;height:40%" src="Image/<?php echo $bien['Pictures']; ?>">   
<section>
<h3>Description du bien</h3>
<br>
<br>
<p>Description : <?php echo $bien['Descriptions']; ?></p>
<p>Adresse : <?php echo $bien['Adresse'] ?></p>
<p>Prix à la nuit/personne : <?php echo $bien['Price'];?> €</p>
<p>Disponible du : <?php echo date($bien['StartDate']);?> au : <?php echo date($bien['EndDate']);?></p>
<br>
<a  style="margin-left: -10vw"><button>Louez moi</button></a>
</section>

</article>

<iframe 

  style="margin: 2vw 0 2vw 035vw"
    width="400" 
    height="300" 
    frameborder="0" 
    scrolling="no" 
    marginheight="0" 
    marginwidth="0" 
    src="<?php echo $bien['map'] ?>">
</iframe>


<?php
require_once '../views/Layout/footer.php';