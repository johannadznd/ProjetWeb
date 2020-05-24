<?php

require_once 'pdo.php';

function getAnnounce(?string $search = null,?string $place = null,?string $StartDate = null,?string $EndDate = null):array{
    $pdo = getPdo();
    $query = "SELECT * FROM announce";
  
     if ($search !== null || $place !== null || $StartDate !==null ||$EndDate!==null) {
      $query = $query . " WHERE Adresse LIKE :search AND PlaceAvailable LIKE :place AND StartDate LIKE :StartDate AND EndDate LIKE :EndDate";
      $stmt = $pdo->prepare($query);
      $stmt->execute([
        'search' => "%$search%",
        'place' => "%$place%",
        'StartDate'  =>"%$StartDate",
        'EndDate' => "%$EndDate",
      ]);
    } else {
      $stmt = $pdo->query($query);
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}


function getBien(int $id):array
{
  $pdo = getPdo();
  $query = "SELECT * FROM announce WHERE id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    return null;
  }

  return $row;
}

function insertUser(string $UserName,string $Email,string $Password,string $FirstName,string $LastName,string $CreditAccount,string $ProfilPicture){
  $pdo =getPdo();
  $query = 'INSERT INTO user (UserName,Email,Password,FirstName,LastName,CreditAccount,ProfilPicture) VALUES (:UserName,:Email,:Password,:FirstName,:LastName,:CreditAccount,:ProfilPicture)';

  $stmt = $pdo->prepare($query);

  $insert = $stmt->execute([
    'UserName' => $UserName,
    'Email' => $Email,
    'Password' => password_hash($Password, PASSWORD_BCRYPT, ['cost' => 12]),
    'FirstName' => $FirstName,
    'LastName' => $LastName,
    'CreditAccount' => $CreditAccount,
    'ProfilPicture' => $ProfilPicture
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
      redirect('/admin/profil.php');
    } else {
      $error = true;
    }
  } 
}

function getUsers(int $id): ?array
{
  $pdo = getPdo();
  $query = "SELECT * FROM user WHERE id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    return null;
  }

  return $row;
}

function getUser(string $id):array{

  $pdo =getPdo();
  $query = "SELECT user.id ,UserName , Email, FirstName, LastName, Titles, Adresse, CreditAccount,Pictures, announce.id FROM user INNER JOIN announce ON user.id = announce.UserId WHERE user.id = :id";

  $stmt = $pdo->prepare($query);
  $stmt->execute([
    'id' => $id
  ]);

  $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $row;
 
}




function editBien(string $Titles,string $Descriptions,string $Pictures,string $PlaceAvailable, string $Adresse,string $Price, string $StartDate, string $EndDate,string $id,string $map):bool{

  $pdo = getPdo();

  $query = "UPDATE announce SET Titles = :Titles, Descriptions = :Descriptions, Pictures= :Pictures, PlaceAvailable= :PlaceAvailable, Adresse= :Adresse, Price= :Price, StartDate= :StartDate, EndDate=:EndDate, map= :map WHERE id=:id";
  $stmt = $pdo->prepare($query);
  return $stmt->execute(array(
    ':Titles' => $Titles,
    ':Descriptions' => $Descriptions,
    ':Pictures' => $Pictures,
    ':PlaceAvailable' => $PlaceAvailable,
    ':Adresse' => $Adresse,
    ':Price' => $Price,
    ':StartDate' => $StartDate,
    ':EndDate' => $EndDate,
    ':id' => $id,
    ':map'=> $map)
  );
}


function edituser(string $UserName ,string $Email, string $Password,string $FirstName, string $LastName,string $ProfilPicture, string $CreditAccount,string $id):bool{

  $pdo = getPdo();

  $query = "UPDATE user SET UserName = :UserName, Email = :Email, Password= :Password, FirstName= :FirstName, LastName= :LastName, ProfilPicture= :ProfilPicture, CreditAccount= :CreditAccount WHERE id=:id";
  $stmt = $pdo->prepare($query);
  return $stmt->execute(array(
    ':UserName' => $UserName,
    ':Email' => $Email,
    ':Password' => password_hash($Password, PASSWORD_BCRYPT, ['cost' => 12]),
    ':FirstName' => $FirstName,
    ':LastName' => $LastName,
    ':ProfilPicture' => $ProfilPicture,
    ':CreditAccount' => $CreditAccount,
    ':id' =>$id)
  );
}


function insertbien(string $Titles,string $Descriptions,string $Pictures,string $PlaceAvailable,string $Adresse,string $Price, string $StartDate, string $EndDate,string $UserId,string $map){

  $pdo =getPdo();
  $query = 'INSERT INTO announce (Titles,Descriptions,Pictures,PlaceAvailable,Adresse,Price,StartDate,EndDate,UserId,map) VALUES (:Titles,:Descriptions,:Pictures,:PlaceAvailable,:Adresse,:Price,:StartDate,:EndDate,:UserId,:map)';

  $stmt = $pdo->prepare($query);

  $insert = $stmt->execute([
    'Titles' => $Titles,
    'Descriptions' => $Descriptions,
    'Pictures' => $Pictures,
    'PlaceAvailable' => $PlaceAvailable,
    'Adresse' => $Adresse,
    'Price' => $Price,
    'StartDate' => $StartDate,
    'EndDate' => $EndDate,
    'UserId' => $UserId,
    'map' => $map

  ]);

}