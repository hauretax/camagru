<?php
class database{
    private $_host = "mysql:host=localhost;dbname=camagru";
    private $_username = 'camagru';
    private $_password = "Qsc123";
    private $_bdd;

    public function getHost (){
        return $this->_host;
    }
    
    public function getbdd(){
        return $this->_bdd;
    }

    public function setbdd($bdd){
        $this->_bdd = $bdd;
    }
    
    public function connexion(){
        try{
            $this->setBdd(new PDO($this->_host, $this->_username, $this->_password));
        }
        catch (Exception $e){
            die ('Erreur : ' . $e->getMessage());
        }
    }

    public function addMember(){
        return 'INSERT INTO user(login, password, mail, cle) VALUES (:login, :password, :mail, :cle)';
    }

}
?>