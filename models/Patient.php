<?php

require_once (dirname(__FILE__).'/../utils/database.php'); // appelle le fichier database 




class patient {

    private string $_id; 
    private string $_firstname;
    private string $_lastname;
    private string $_birthdate;
    private string $_phone;
    private string $_email;
    



    private object $_pdo; //!!!!!





/**
 * Méthode magique qui est appelée à la création d'un nouveau patient. Elle sert a hydrater donc affecter chaque 
 * valeur a chaque attribut. 
 * on hydrate pas l'id car il est en autoincrément.
 * @param string $firstname
 * @param string $lastname
 * @param string $birthdate
 * @param string $phone
 * @param string $email
 */
public function __construct(string $firstname, string $lastname, string $birthdate, string $phone, string $email){
    $this-> setfirstname ($firstname);
    $this-> setlastname($lastname);
    $this-> setBirthdate($birthdate);
    $this-> setPhone($phone);
    $this-> setEmail($email);

    $this->_pdo= databaseConnect();


}


// --------------------  GETTERS ----- Ceci sont des méthodes: public devant veut dire qu'elle sont public, on va pouvoir y acceder
// depuis l'exterieur de la classe ( en haut ) 

public function getId():int {
    return $this->_id; 
}

public function getlastname():string { // retourne un string 
    return $this->_lastname; // récupère la valeur de l'attribut déclaré en haut ($_firstname)
}



public function getfirstname():string {
    return $this->_firstname; 
}

public function getBirthdate():string {
    return $this->_birthdate; 
}


public function getPhone():string {
    return $this->_phone; 
}

public function getEmail():string {
    return $this->_email; 
}


// ----------------- SETTERS --------------------

public function setlastname (string $lastname):void {
    $this->_lastname= $lastname;
}

public function setfirstname (string $firstname):void {
    $this->_firstname= $firstname;
}

public function setPhone (string $phone):void {
    $this->_phone= $phone;
}

public function setBirthdate (string $birthdate):void {
    $this->_birthdate= $birthdate;
}

public function setEmail (string $email):void {
    $this->_email= $email;
}
//fonction ajouter un patient 
public function add(){
        
        $sql= " INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) 
                VALUES (:lastname, :firstname, :birthdate, :phone, :email)";

        $sth = $this->_pdo->prepare($sql); //pdostatement;

        $sth->bindValue(':lastname', $this->getlastname(),PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->getfirstname(),PDO::PARAM_STR); 
        $sth->bindValue(':birthdate', $this->getBirthdate(),PDO::PARAM_STR); 
        $sth->bindValue(':phone', $this->getPhone(),PDO::PARAM_STR); 
        $sth->bindValue(':email', $this->getEmail(),PDO::PARAM_STR); 
        
        // query execute sans prépration
        // donc on fait prepare puis execute 

        $sth->execute();
    }

    public function emailUse() {
        
    }
}



