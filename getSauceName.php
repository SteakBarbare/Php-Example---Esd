<?php
$host = 'localhost';
$dbname = 'saucisse';
$username = 'root';
$password = '';

try {

  $pdo = new PDO(
    'mysql:host=' . $host . ';dbname=' . $dbname,
    $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
  );

} catch (PDOException $e) {

  die("Can't connect to $dbname :" . $e->getMessage());
}

$request = $pdo->query('SELECT name FROM sauce WHERE id = 1');
$sauce = $request->fetch(PDO::FETCH_ASSOC);

echo json_encode($sauce['name']);
?>