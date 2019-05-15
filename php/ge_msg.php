<?php
session_start ();
require_once 'database.php';

function new_message(){
    if($_POST['id'] !== "" && $_POST['submit'] === "OK" && $_POST['text'] !== "")
    {
        $bdd = new database();
        $bdd->connexion();
        $stmt = $bdd->getBdd()->prepare("SELECT * FROM pictur WHERE id like :id ");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        $data = $stmt->fetch();
     
        $text = "<p>".$_SESSION['a_user']." : ".$_POST['text']."</p>";
        if($data['comment'] !== NULL)
            $stm = $bdd->getBdd()->prepare("UPDATE pictur SET comment=CONCAT(comment, :text) WHERE id like :id");
        else
            $stm = $bdd->getBdd()->prepare("UPDATE pictur SET comment= :text WHERE id like :id");
        $stm->bindParam(':id', $_POST['id']);
        $stm->bindParam(':text', $text);
        $stm->execute();
        
        echo $_POST['id'];
        
    }
}

new_message();
header('Location: ../web_page/welcome.php');
?>