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
  

if (!empty($_POST) && isset($_POST['UserName']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['ProfilPicture']) && isset($_POST['CreditAccount']) ) {
   
    $UserName = $_POST['UserName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $ProfilPicture = $_POST['ProfilPicture'];
    $CreditAccount = $_POST['CreditAccount'];
   

    $update = edituser(
      $UserName,
      $Email,
      $Password,
      $FirstName,
      $LastName,
      $ProfilPicture,
      $CreditAccount,
      $id
    );
    
  }


  
$user = getUsers($id)
?>
  
<h1>Modifier le bien</h1>
  
<form method="POST" id="modifier">
  
    <div>
        <label>Modifier le pseudo</label>
        <input type="text" id="UserName" name="UserName" value="<?php echo $user['UserName']; ?>" >
    </div>

    <div>
        <label>Modifier votre prénom</label>
        <input type="text" id="FirstName" name="FirstName" value="<?php echo $user['FirstName']; ?>" >
    </div>
    
    <div> 
        <label>Modifier votre nom</label>
        <input type="text" id="LastName" name="LastName"  value="<?php echo $user['LastName']; ?>" >
    </div>
   
    <div>
        <label>Modifier votre email</label>
        <input style="width: 20vw" type="text" id="Email" name="Email" value="<?php echo $user['Email']; ?>" >
        
    </div>

    <div>
        <label>Modifier votre mot de passe </label>
        <input type="password" id="Password" name="Password" >
    </div>
   
    <div>
        <label>Changer la photo de profil</label>
        <input type="file" id="ProfilPicture" name="ProfilPicture" value="<?php echo $user['ProfilPicture']; ?>" >
    </div>
  
    <div>
        <label>Changer votre credit account</label>
        <input type="number" id="CreditAccount" name="CreditAccount" value="<?php echo $user['CreditAccount']; ?>" >
    </div>
    
    <button>Modifier</button>
</form>


<?php

require_once '../../views/Layout/footer.php';