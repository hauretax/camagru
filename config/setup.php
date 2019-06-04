<?PHP
require 'database.php';
function setup($dbh,$dbname)
{
    $sql  = "CREATE DATABASE IF NOT EXISTS".$dbname;
    $result = $dbh->exec($sql);

    $sql ="USE ".$dbname;
    $resulte = $dbh->exec($sql);

    $sql  = "CREATE TABLE `user` (
        `id` int(11) NOT NULL,
        `login` varchar(32) NOT NULL,
        `password` varchar(128) NOT NULL,
        `mail` varchar(255) DEFAULT NULL,
        `cle` varchar(255) DEFAULT NULL,
        `actif` varchar(255) DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $resulte = $dbh->exec($sql);

    $sql = "CREATE TABLE `pictur` (
        `id` int(11) NOT NULL,
        `login` varchar(255) NOT NULL,
        `file` varchar(255) NOT NULL,
        `lik` int(11) DEFAULT NULL,
        `who_like` text NOT NULL,
        `comment` text
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    $resulte = $dbh->exec($sql);
}
$dsn = "mysql:host=". DB_HOST;
$db = new PDO ($dsn, $DB_USER, $DB_PASSWORD);
//$db->setAttribute(PDO:: ATTR_ERRMODE, PDO::EERMODE_EXCEPTION);
setup($db, $DB_NAME);
echo 'setup completed'.PHP_EOL;
/*
$bdd = new database();
$bdd->connexion();
setup($bdd, 'camagru');
echo 'setup completed'.PHP_EOL;*/
?>