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

<article>
<img style="width: 40vw" src="Image/villa1.jpg">   

<section>
<h3>Description</h3>
<br>
<br>
<p><?php echo $bien['Descriptions']; ?></p>
<p>Prix : <?php echo $bien['Price'];?> €</p>
<p>Disponible du <?php echo date($bien['StartDate']);?> au <?php echo date($bien['EndDate']);?></p>
<br>
<a style="margin-left: -10vw"><button>Louez moi</button></a>
</section>

</article>


<?php
require_once '../views/Layout/footer.php';