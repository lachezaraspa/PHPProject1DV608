<?php

/**
 * Description of UserCredent
 *
 * @author Lachezar
 */
class UserCredent {
    //Constructor for User class
    private $name;
    private $password;
    private $email;
    
    
    //Constructor for the User class
    function __construct($name, $password, $email) {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }
    
    //Return method for the user name
    public function getName(){
        return $this->name;
    }
    
    //Return method for the user password
    public function getPass(){
        return $this->password;
    }
    
    public function getEmail(){
        return $this->email;
    }
}
