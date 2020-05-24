<?php

require_once '../../views/Layout/header.php';
require_once '../../Fonctions/bien.php';

$id = $_SESSION['id'];
$users = getUser($id);
$info =getUsers($id)
?>

<h1>Profil</h1>
<article>
<section id="profil">
<p>User Name : <?php echo $info['UserName'] ?> </p>
<p>Prénom : <?php echo $info['FirstName'] ?> </p>
<p>Nom : <?php echo $info['LastName'] ?> </p>
<p>Email : <?php echo $info['Email'] ?> </p>
<p>Credit account : <?php echo $info['CreditAccount'] ?></p>
<a href="/admin/editUser.php?id=<?php echo $_SESSION['id'] ?>"><button>Modifier</button></a>
</section>
<img style="margin: 0 0 0 35vw;width: 15%;height: 15%;" src="../Image/<?php echo $info['ProfilPicture']; ?>"> 
</article>

<h2>Bien mis en location</h2>

<article class="mesBiens">

<?php foreach ($users as $user) {?>

 
 <section >
    <h3><?php echo $user['Titles']?></h3>
    <img src="../Image/<?php echo $user['Pictures']; ?>"> 
    <a href="/admin/editBien.php?id=<?php echo $user['id'] ?>">Modifider le bien</a> <br>
    <a href="/admin/supprime.php?id=<?php echo $user['id'] ?>">Supprimer le bien</a><br>
    <a href="/bien.php?id=<?php echo $user['id'] ?>">Accéder au bien</a><br>
  </section>
<?php } ?>
 </article>  
<?php
require_once '../../views/Layout/footer.php';