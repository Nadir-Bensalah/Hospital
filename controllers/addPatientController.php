<?php


require_once(dirname(__FILE__).'/../config/regex.php');
require_once(dirname(__FILE__).'/../models/Patient.php');


// Fonction Age :

function age($birthdate) {
    $age = date('Y') - date('Y', strtotime($birthdate));
        if (date('md') < date('md', strtotime($birthdate))) {
        return $age - 1;
        }
    return $age;
}

$error=[]; // Tableau d'erreurs 

//-----------------------------------------------------------------------------------------------------------------------------------------------  
    /********************************** // DEBUT DU TRAITEMENT PHP  **************************************/
    if (($_SERVER["REQUEST_METHOD"] == "POST")) {


    // VERIFICATION DU PRENOM / 
      
    $firstname = trim(filter_input(INPUT_POST, 'firstname' , FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($firstname)) {
        $check_firstname = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));
        if ($check_firstname === false) {
            $error['firstname']= 'veuillez saisir un prénom valide';
        }
    } else {
        $error['firstname'] = 'Veuillez renseigner votre prénom' ;
    }


//-----------------------------------------------------------------------------------------------------------------------------------------------  
    // VERIFICATION DU NOM DE FAMILLE / 
    
    $lastname = trim(filter_input(INPUT_POST, 'lastname' , FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($lastname)) {
        $check_lastname = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_NAME.'/')));
        if ($check_lastname === false) {
            $error['lastname'] = '<span class="error">veuillez saisir un nom valide</span>';
        }
    } else {
        $error['lastname'] = 'Veuillez renseigner votre nom' ;
    }

//-----------------------------------------------------------------------------------------------------------------------------------------------
    // VERIFICATION DE L'ADRESSE MAIL /

    $email = trim(filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_EMAIL));
    if (!empty($email)) {
        $check_email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($check_email === false) {
                $error['email'] = 'veuillez saisir une adresse mail valide';
            }
        } else {
        $error['email'] = 'Veuillez renseigner votre adresse mail' ;
    }


//-----------------------------------------------------------------------------------------------------------------------------------------------  
// VERIFICATION DE LA DEUXIEME SAISIE D'ADRESSE MAIL /

    $emailVerif = filter_input(INPUT_POST, 'emailVerif' , FILTER_SANITIZE_EMAIL);
    if (!empty($emailVerif)) {
        if ($emailVerif != $email) {
            $error['emailVerif']= 'Veuillez renseigner une adresse mail identique ! ' ;
            
        } else {
            $email = $emailVerif;
        }
    } else {
        $error['emailVerif']= 'Veuillez confirmer votre adresse mail ! ' ;
    }



//-----------------------------------------------------------------------------------------------------------------------------------------------  
    // VERIFICATION DE L'AGE /

    $birthdate = filter_input(INPUT_POST, 'birthdate' , FILTER_SANITIZE_SPECIAL_CHARS);
    $age= age($birthdate); // appelle la fonction age 
        if ($age >= 10 && $age <= 120) {
            $check_date_of_birth = filter_var($birthdate, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEX_DATE_OF_BIRTH.'/')));
            
    } else {
        $error['birthdate'] = 'Votre date de naissance n\'est pas valide' ;
    }

   
    

//-----------------------------------------------------------------------------------------------------------------------------------------------  
    // VERIFICATION DU NUMERO DE TELEPHONE /


    $phone= filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS); 
    if(!empty($phone)){
       
        $checkPhone= filter_var ($phone, FILTER_VALIDATE_REGEXP,
            array("options" =>array("regexp" =>'/'.REGEX_PHONE.'/')));
            if ($checkPhone === false){
                $error['phone']= 'Veuillez saisir un numéro de téléphone valide.';
            }
    } else {
        $error['phone']= 'Veuillez saisir votre numéro de téléphone.';
    }
    
   
//-----------------------------------------------------------------------------------------------------------------------------------------------  

    if (empty($error)) {
        $patient=new patient($lastname, $firstname, $birthdate, $phone, $email);

        $patient->add();
    }

    
}



include(dirname(__FILE__).'/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)){
    include(dirname(__FILE__) .'/../index.php');
} else {
    include(dirname(__FILE__) .'/../views/addPatient.php');
}





include(dirname(__FILE__).'/../views/templates/footer.php');
















 



