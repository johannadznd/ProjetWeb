<?php
require_once'../Fonctions/pdo.php';
require_once '../Fonctions/connection.php';


$pdo = getPdo();
$UserName = "";
$error = false;

if (!empty($_POST['UserName']) && !empty($_POST['Password'])) {
  session_start();
  $UserName = $_POST['UserName']; 
  $Password = $_POST['Password'];

  $query = "SELECT * FROM user WHERE UserName = :UserName";
  $stmt = $pdo->prepare($query);
  $stmt->execute([
    'UserName' => $UserName
  ]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);


  if ($row && Password_verify($Password, $row['Password'])) {
    $_SESSION['state'] = 'connected';
    $_SESSION['id'] = $row['ID'];
    redirect('/inscription.php');
  } else {
    $error = true;
  }
} 
require_once '../views/Layout/header.php';
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
require_once '../views/Layout/footer.php';

