<?php

require_once '../../views/Layout/header.php';
require_once '../../Fonctions/bien.php';



?>


<h1>Inscription</h1>

<form method="POST">

<div class="inscription"> 
<label>Nom</label>
<input type="text" name="LastName" id="LastName" required>
</div>

<div class="inscription">
<label>Prénom</label>
<input type="text" name="FirstName" id="FirstName" required>    
</div>

<div class="inscription">
<label>Email</label>
<input style="width: 20vw" type="email" name="Email" id="Email" required>    
</div>

<div class="inscription">
<label>Nom d'utulisateur</label>
<input type="text" name="UserName" id="UserName" required>
</div>

<div class="inscription">
<label>Credit account</label>
<input type="number" name="CreditAccount" id="CreditAccount" >
</div>

<div class="inscription">
<label>Mot de passe</label>
<input type="password" name="Password" id="Password" required>   
</div>

<div class="inscription">
<label>Confirmation mot de passe</label>
<input type="password" name="Password2" id="Password2" required>    
</div>

<div class="inscription">
<label>Photo de profil</label>
<input type="file" name="ProfilPicture" id="ProfilPicture"> 
</div>
<button type="submit">Inscription</button>
</form>

<p style="margin-left:1vw ">Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a></p>

<?php



$insert = null;


if (!empty($_POST) && !empty($_POST['UserName']) && !empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['FirstName']) && !empty($_POST['LastName'] && $Password === $Password2) && !empty($_POST['CreditAccount']) && !empty ($_POST['ProfilPicture'])) {
  $UserName = $_POST['UserName'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $FirstName = $_POST['FirstName'];
  $LastName = $_POST['LastName'];
  $Password2 = $_POST['Password2'];
  $CreditAccount =$_POST['CreditAccount'];
  $ProfilPicture =$_POST['ProfilPicture'];
  $insert = insertUser($UserName,$Email,$Password,$FirstName,$LastName,$CreditAccount,$ProfilPicture);
}



require_once '../../views/Layout/footer.php';