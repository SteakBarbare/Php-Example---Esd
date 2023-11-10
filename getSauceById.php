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

// Check if parameter "id" is set
if (isset($_GET["id"])) {
  // Map the parameters in variables
  $enemyId = $_GET["id"];
  // Prepare the request with a placeholder for the id
  $request = $pdo->prepare('SELECT * FROM enemies WHERE id = :enemyId');
  // Bind the id within the placeholder
  $request->bindParam(':enemyId', $enemyId, PDO::PARAM_STR);

  // Send the request to the database
  $enemy = $request->execute();
  $enemy = $request->fetch(PDO::FETCH_ASSOC);

} else {
  echo "C KC";
}

echo json_encode($enemy);
?>