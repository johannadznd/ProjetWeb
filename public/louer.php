<?php /*
require_once '../Fonctions/bien.php';
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
$query1 = "SELECT * FROM announce where id = $id";

$stmt1 = $pdo->query($query1);
$bien = $stmt1->fetch(PDO::FETCH_ASSOC);

$idUser=$_SESSION['id'];

$query2 = "SELECT * FROM user where id = $idUser";
$stmt2 = $pdo->query($query2);
$User = $stmt2->fetch(PDO::FETCH_ASSOC);

$StartDate = $bien['StartDate'];
$EndDate = $bien['EndDate'];

$query3 ="SELECT DATEDIFF (DAY, :StartDate,:EndDate)";
$stmt3 = $pdo->prepare($query3);
  $insert = $stmt3->execute([

    'StartDate' => $StartDate,
    'EndDate' => $EndDate
  
    ]);
$jour = $stmt3->fetch(PDO::FETCH_ASSOC);


$NumberOfPersons = 4;


$PricePerNight = $bien['Price'];
$TotalAmount = ($PricePerNight*$NumberOfPersons)*$jour;
$Louer = insertLouer($StartDate,$EndDate,$PricePerNight,$NumberOfPersons,$TotalAmount,$id,$idUser,1);


require_once '../views/Layout/footer.php';
?>