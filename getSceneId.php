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
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $request = $pdo->prepare('SELECT * FROM scene WHERE id=:id');
    $request->bindParam(':id', $id, PDO::PARAM_STR);
    $scene = $request->execute();
    $scene = $request->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Param not found";
}
echo json_encode($scene['sprite']);
?>