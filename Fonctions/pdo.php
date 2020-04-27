<?php

function getPdo(): PDO
{
  try {
    $pdo = new PDO(
      "mysql:host=localhost;dbname=airbnb",
      "airbnb",
      "6Q4v3n2QRHPuZivc"
    );
    return $pdo;
  } catch(PDOException $ex) {
    exit("Erreur lors de la connexion à la base de données");
  }
}
