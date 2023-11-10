<?php
$dbconfig = parse_ini_file("config.env");

$host = $dbconfig["DB_HOST"];
$dbname = $dbconfig["DB_NAME"];
$username = $dbconfig["DB_USERNAME"];
$password = $dbconfig["DB_PASSWORD"];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    // echo "Connexion to $dbname on $host successful";

} catch (PDOException $e) {
    die('Connexion failed: ' . $e->getMessage());
}
$request = $pdo->query('SELECT * FROM test');
$sauce = $request->fetch(PDO::FETCH_ASSOC);

echo json_encode($sauce);

?>