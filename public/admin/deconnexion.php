<?php
require_once '../../Fonctions/connection.php';
session_start();

$_SESSION = [];

redirect('/index.php');