<?php 

require_once '../../Fonctions/bien.php';
require_once '../../views/Layout/header.php';

if (!isset($_GET['id'])) { ?>
    <div class="alert alert-danger" role="alert">
      Paramètre manquant : id
    </div>
    <?php
    exit;
}

$id = $_GET['id'];
  

if (isset($_POST['Titles']) && isset($_POST['Descriptions']) && isset($_POST['Pictures']) && isset($_POST['PlaceAvailable']) && isset($_POST['Adresse']) && isset($_POST['Price']) && isset($_POST['StartDate']) && isset($_POST['EndDate'])) {
   
    $Titles = $_POST['Titles'];
    $Descriptions = $_POST['Descriptions'];
    $Pictures = $_POST['Pictures'];
    $PlaceAvailable = $_POST['PlaceAvailable'];
    $Adresse = $_POST['Adresse'];
    $Price = $_POST['Price'];
    $StartDate = $_POST['StartDate'];
    $StartDate = $_POST['StartDate'];
    $EndDate =$_POST['EndDate'];

    $update = editBien(
      $Titles,
      $Descriptions,
      $Pictures,
      $PlaceAvailable,
      $Adresse,
      $Price,
      $StartDate,
      $EndDate,
      $id
    );
    
  }


  
$biens = getBien($id)
?>
  
<h1>Modifier le bien</h1>
  
<form method="POST" id="modifier">
  
    <div>
        <label>Modifier le titre</label>
        <input type="text" id="Titles" name="Titles" value="<?php echo $biens['Titles']; ?>" >
    </div>

    <div>
        <label>Modifier l'adresse</label>
        <input type="text" id="Adresse" name="Adresse" value="<?php echo $biens['Adresse']; ?>" >
    </div>
    
    <div> 
        <label>Changer la photo</label>
        <input type="file" id="Pictures" name="Pictures"  value="<?php echo $biens['Pictures']; ?>" >
    </div>
   
    <div id="editdescription">
        <label>Modifier la description</label>
        <textarea id="Descriptions" name="Descriptions"><?php echo $biens['Descriptions']; ?></textarea>
    </div>
  
    <div>
        <label>Modifier date de début</label>
        <input type="date" id="StartDate" name="StartDate" value="<?php echo $biens['StartDate']; ?>" >
        
    </div>

    <div>
        <label>Modifier date de fin</label>
        <input type="date" id="EndDate" name="EndDate" value="<?php echo $biens['EndDate']; ?>" >
    </div>
   
    <div>
        <label>Changer le prix</label>
        <input type="number" id="Price" name="Price" value="<?php echo $biens['Price']; ?>" >
    </div>
  
    <div>
        <label>Changer le nombre de place</label>
        <input type="number" id="PlaceAvailable" name="PlaceAvailable" value="<?php echo $biens['PlaceAvailable']; ?>" >
    </div>
    
    <button>Modifier</button>
</form>


<?php

require_once '../../views/Layout/footer.php';