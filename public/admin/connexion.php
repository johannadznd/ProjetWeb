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
    <input type="text" name="UserName" id="UserName">
</div>
<div class="connexion"> 
    <label>Mot de passe</label>
    <input type="password" name="Password" id="Password"> 
</div>
<button style="margin-bottom: 12.1vw !important" type="submit">Connexion</button>
</form>

<?php
require_once '../../views/Layout/footer.php';

