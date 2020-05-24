<?php 

require_once '../../Fonctions/pdo.php';
require_once '../../Fonctions/connection.php';


if (!isset($_GET['id'])) { ?>
    <div class="alert alert-danger" role="alert">
      Paramètre manquant : id
    </div>
    <?php
    exit;
}

$id = $_GET['id'];

$pdo = getPdo();

$query = "DELETE FROM announce WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $id]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

redirect('/admin/profil.php');
