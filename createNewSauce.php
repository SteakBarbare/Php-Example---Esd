<?php
$dbconfig = parse_ini_file("config.env");

$host = $dbconfig["DB_HOST"];
$dbname = $dbconfig["DB_NAME"];
$username = $dbconfig["DB_USERNAME"];
$password = $dbconfig["DB_PASSWORD"];

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

if (isset($_POST["name"])) {
  $newSauceName = $_POST["name"];
  $request = $pdo->prepare('INSERT INTO test (name) VALUES (:newSauceName)');
  $request->bindParam(':newSauceName', $newSauceName, PDO::PARAM_STR);
  $request->execute();

} else {
  echo "C KC";
}

?>