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

function connection(?string $UserName=null,?string $Password=null){

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
      $_SESSION['id'] = $row['id'];
      redirect('/admin/inscription.php');
    } else {
      $error = true;
    }
  } 
}



function getUser(string $id):array{

  $pdo =getPdo();
  $query = "SELECT user.id ,UserName , Email, FirstName, LastName, Titles, Adresse FROM user INNER JOIN announce ON user.id = announce.UserId WHERE user.id = :id
  ";

  $stmt = $pdo->prepare($query);
  $stmt->execute([
    'id' => $id
  ]);

  $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $row;
 
}