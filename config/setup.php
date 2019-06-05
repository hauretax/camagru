<?PHP
require_once "database.php";

$servername = "db";
$username = "root";
$password = "test";

// Create connection
try {
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD);
$sql = "CREATE DATABASE camagru";
$conn->query($sql) === TRUE ;
}
catch (Exception $e) {
    echo "Error creating database: " . $e;
}
$conn->close();
try {
$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$bdd->query("CREATE TABLE `user` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `cle` varchar(255) DEFAULT NULL,
  `actif` varchar(255) DEFAULT NULL
)");
$bdd->query("ALTER TABLE user CONVERT TO CHARACTER SET utf8;");
}
catch (Exception $e) {
    echo "Error creating database: " . $e;
}
try {
  $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  $bdd->query("CREATE TABLE `pictur` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `login` varchar(255) NOT NULL,
    `file` varchar(255) NOT NULL,
    `lik` int(11) DEFAULT NULL,
    `who_like` text NOT NULL,
    `comment` text
  )");
  $bdd->query("ALTER TABLE user CONVERT TO CHARACTER SET utf8;");
  }
  catch (Exception $e) {
      echo "Error creating database: " . $e;
  }
?>