<?php 

require_once '../../Fonctions/bien.php';
require_once '../../views/Layout/header.php';
require_once '../../Fonctions/connection.php';
if(isset($_SESSION['state']) && $_SESSION["state"] == "connected") {
} else {
  redirect('/admin/connexion.php');
}

if (!isset($_GET['id'])) { ?>
    <div class="alert alert-danger" role="alert">
      Paramètre manquant : id
    </div>
    <?php
    exit;
}

$id = $_GET['id'];
  
?>
  
<h1>Devenir hôte</h1>
  
<form method="POST" id="hôte">
  
    <div>
        <label>Ajoutez un titre</label>
        <input type="text" id="Titles" name="Titles" placeholder="Titre" required>
    </div>

    <div>
        <label>Ajouter votre adresse</label>
        <input style="width: 30vw" type="text" id="Adresse" name="Adresse" placeholder="adresse" required>
    </div>
    
    <div> 
        <label>Ajoutez une photo</label>
        <input type="file" id="Pictures" name="Pictures" required>
    </div>
   
    <div>
        <label>Ajoutez une description</label>
        <textarea id="Descriptions" name="Descriptions" placeholder="Votre description" required></textarea>
    </div>
  
    <div>
        <label>Ajouter date de début</label>
        <input type="date" id="StartDate" name="StartDate"  placeholder="12/01/2021" required>
        
    </div>

    <div>
        <label>Ajouter date de fin</label>
        <input type="date" id="EndDate" name="EndDate" placeholder="12/01/2021" required>
    </div>
   
    <div>
        <label>Ajoutez votre prix</label>
        <input type="number" id="Price" name="Price" placeholder="150" required>
    </div>
  
    <div>
        <label>Ajouter votre nombre de place</label>
        <input type="number" id="PlaceAvailable" name="PlaceAvailable" placeholder="4" required>
    </div>

    <div>
        <label>Si vous avez le lien google map de l'adresse sous le format ci-dessous mettez le ici </label>
        <input style="width: 50vw" type="text" id="map" name="map" placeholder="https://www.google.com/maps/d/u/0/embed?mid=1OQdh6TafcUW6FE9yuituDCHVrCS_ASul" >
    </div>
    
    <button>Devenir hôte</button>
</form>


<?php

$insert = null;

if ( !empty($_POST) && !empty($_POST['Titles']) && !empty($_POST['Descriptions']) && !empty($_POST['PlaceAvailable']) && !empty($_POST['Adresse']) && !empty($_POST['Price']) && !empty($_POST['StartDate']) && !empty($_POST['EndDate']) && !empty($_POST['map']) ) {

    $Titles = $_POST['Titles'];
    $Descriptions = $_POST['Descriptions'];
    $Pictures = $_POST['Pictures'];
    $PlaceAvailable = $_POST['PlaceAvailable'];
    $Adresse = $_POST['Adresse'];
    $Price = $_POST['Price'];
    $StartDate =$_POST['StartDate'];
    $EndDate =$_POST['EndDate'];
    $map =$_POST['map'];
    $insert = insertbien($Titles,$Descriptions,$Pictures,$PlaceAvailable,$Adresse,$Price,$StartDate,$EndDate,$id,$map);
}

require_once '../../views/Layout/footer.php';