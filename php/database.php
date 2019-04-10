<?php
class database{
    private $_host = "mysql:host=localhost;dbname=camagru";
    private $_username = 'root';
    private $_password = "Azeqsd1597538462";
    private $_bdd;

    public function getHost (){
        return $this->_host;
    }

    public function getUsername(){
        return $this->_username;
    }

    public function getPassword(){
        return $this->_password;
    }
    
    public function getbdd(){
        return $this->_bdd;
    }

    public function setbdd($bdd){
        $this->_bdd = $bdd;
    }
    
    public function connexion(){
        try{
            $this->setBdd(new PDO($this->getHost(), $this->getUsername(), $this->getPassword()));
        }
        catch (Exception $e){
            die ('Erreur : ' . $e->getMessage());
        }
    }

    public function addMember(){
        return 'INSERT INTO user(login, password, mail) VALUES (:login, :password, :mail)';
    }
}


?>

