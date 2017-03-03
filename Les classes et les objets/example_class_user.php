<?php
/**
* Ma class User
*/
 class User {
     /** Attribut
     * @var String $name */
     private $name; 
     /** @var String $lastName */
     private $lastName; 
     /** @var String $dateN */
     private $dateN;
      /** @var String $username */
     private $username = null;
      /** @var String $username */
     private $mpass;
     
     
      /** * Exemple 1 */
     public function __construct( ){
        
     } 
     
     
     /** Exemple 2   
     public function __construct($name,$lastName,$dateN,$username,$mpass){
        $this->setName($name);
        $this->setLastName($lastName); 
        $this->setDateN($dateN);
        $this->setUsername($username);
        $this->setPassword($mpass);
     } */
      
     /**
     * Method to GET Name user
     * Afficher
     */
     public function  getName(){
         return $this->name;
     }
     
     /**
     * Method to SET Name user
     * Enregistrer
     */
     public function  setName($name){
          $this->name = $name;
     }
     
     public function  getLastName(){
         return $this->lastName;
     }
       public function  setLastName($lastName){
          $this->lastName = $lastName ;
     }
     
     public function  setDateN($dateN){
           $this->dateN = $dateN ;
     }
     
     public function  getDateN(){
          return $this->dateN;
     }
     
     public function concat (){
         return  $this->name.$this->lastName.$this->dateN; 
     }
     
     public function setUsername($username){
        if ($username == null){
       $newUsername  = $this->createUsername($this->getName(),$this->getLastName());
           $this->username = strtolower( $newUsername); 
        } else {
               $this->username =  $username; 
        }
     }
     
     public function createUsername($name,$lastname){
        return substr($name,0,1).".".$lastname;
     }
     
     
     public function getUsername(){
         return  $this->username ; 
     }
     
     /**
      * Une methode qui genere un mot de passe aliatoire à partir un prenom 
      * et d'une date de naissance   
      */
     public function geratePasword(){
        
        $datenaissance = $this->getDateN(); 
        $rejex_struct = "/[\/]+/";
        $str_to_remplace = ""; 
        // retourne la date sans les "/"
        $get_date = preg_replace($rejex_struct,$str_to_remplace,$datenaissance);
        $str_to_convert =  $this->getLastName().$get_date;
        return  str_shuffle($str_to_convert);
     }
     
     public function getPassword(){
        return $this->mpass; 
     }
     
     public function setPassword($mpass){
         if ($mpass == null){
             $this->mpass =  $this->geratePasword();
         } else {
             $this->mpass =$mpass;
         }
     }
     
     
     
     
 }
 
 
 
 
 /**
  * Exemple 1: 
 */
 $test =  new  User();
 $test->setName('Dhaouadi');
 $test->setLastName('Amir');
 $test->setDateN('24061988');
 $test->setUsername(null);
 $test->setPassword(null); // si vous voulez ajouter votre propore mot de passe ajouter le à la place de la valeur null
 
 
 echo  'Name : '.$test->getName()."\n ";
 echo  'LastName : '.$test->getLastName()."\n";
 echo  'Date de naissance : '. $test->getDateN()."\n";
 echo  'username : '.$test->getUsername()."\n ";
 echo  'password : '.$test->getPassword()."\n ";
 
 echo "\n-----------------------------------------------------\n";
 /** Exmple 2
 $test2 =  new  User("DOE",'JOHN','11112011',null,null);
  echo  'Name : '.$test2->getName()."\n ";
 echo  'LastName : '.$test2->getLastName()."\n";
 echo  'Date de naissance : '. $test2->getDateN()."\n";
 echo  'username : '.$test2->getUsername()."\n "; 
  echo 'password : '. $test2->getPassword()."\n ";
 */
