<?php

require_once 'pdo.php';

function getAnnounce(?string $search = null,?string $place = null):array{
    $pdo = getPdo();
    $query = "SELECT * FROM announce";
  
     if ($search !== null || $place !== null) {
      $query = $query . " WHERE Adresse LIKE :search AND PlaceAvailable LIKE :place";
      $stmt = $pdo->prepare($query);
      $stmt->execute([
        'search' => "%$search%",
        'place' => "%$place%"
      ]);
    } else {
      $stmt = $pdo->query($query);
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function insertUser(string $UserName,string $Email,string $Password,string $FirstName,string $LastName){
  $pdo =getPdo();
  $query = 'INSERT INTO user (UserName,Email,Password,FirstName,LastName) VALUES (:UserName,:Email,:Password,:FirstName,:LastName)';

  $stmt = $pdo->prepare($query);

  $insert = $stmt->execute([
    'UserName' => $UserName,
    'Email' => $Email,
    'Password' => password_hash($Password, PASSWORD_BCRYPT, ['cost' => 12]),
    'FirstName' => $FirstName,
    'LastName' => $LastName
  ]);

}
