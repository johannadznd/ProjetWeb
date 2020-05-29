<?php
require_once '../../Fonctions/pdo.php';
require_once '../../Fonctions/connection.php';
require_once '../../Fonctions/bien.php';

$Username = $_GET['UserName']?? null ;
$password = $_GET['password']?? null ;

$connection = connection($Username,$password);

require_once '../../views/Layout/header.php';

?>
<h1>Connexion</h1>

<form method="POST">

<div class="connexion">
    <label>Nom d'utilisateur</label>
    <input type="text" name="UserName" id="UserName" required>
</div>
<div class="connexion"> 
    <label>Mot de passe</label>
    <input type="password" name="Password" id="Password" required> 
</div>
<button style="margin-bottom: 12.1vw !important" type="submit">Connexion</button>
</form>
<p style="margin-left:1vw ">Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a></p>

<?php


require_once '../../views/Layout/footer.php';
