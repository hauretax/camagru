<?php
function connect(){
    include_once "../private/source.php";

     try {
         $dbh = new PDO($acces, $u, $p);
     } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
?>