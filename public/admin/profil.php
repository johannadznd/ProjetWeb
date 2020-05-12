<?php

require_once '../../views/Layout/header.php';
require_once '../../Fonctions/bien.php';

$id = $_SESSION['id'];
$users = getUser($id);
foreach ($users as $user);
?>

<h1>Profil</h1>
<article>
<section id="profil">
<p>User Name : <?php echo $user['UserName'] ?> </p>
<p>Prénom : <?php echo $user['FirstName'] ?> </p>
<p>Nom : <?php echo $user['LastName'] ?> </p>
<p>Email : <?php echo $user['Email'] ?> </p>
<a href="#"><button>Modifier</button></a>
</section>
<img style="margin: 0 0 0 40vw;width: 14vw;height: 15vw;" src="../Image/pers1.jpg"> 
</article>

<h2>Bien mis en location</h2>

<article class="mesBiens">

<?php foreach ($users as $user) {?>

 
 <section >
    <h3><?php echo $user['Titles']?></h3>
    <img src="../Image/villa1.jpg"> 
    <a href="/admin/editBien.php?id=<?php echo $user['id'] ?>">Modifider le bien</a> <br>
    <a href="#">Supprimer le bien</a><br>
    <a href="/bien.php?id=<?php echo $user['id'] ?>">Accéder au bien</a><br>

  </section>
<?php } ?>
 </article>  
<?php
require_once '../../views/Layout/footer.php';