<?php

/**
 * Description of RegisterModel
 *
 * @author Lacezar
 */
class RegisterModel {
    
    private $isReg = false;
    
    
    public function register($name, $pass, $repass, $email, UserDAL $users){
        
        if(strlen($name) >= 3 && strlen($pass) >= 6 && strlen($repass)>= 6 && strlen($email)>= 4 && strpos($email, '@') !==  false){
            
            $hashedPass = crypt($pass, $name);
            $hashedRePass = crypt($repass, $name);
           
            if($hashedPass === $hashedRePass){
                try{
                    $user = (new UserCredent($name, $hashedPass, $email));
                    $users->addUser($name, $hashedPass, $email);
                    $this->isReg = true;
   
                } catch (Exception $ex) {
                    $this->isReg = false;
                }
                
            }
        }else{
            $this->isReg = false;
        } 
    }
    
    public function isRegistered(){
        return $this->isReg;
    }
    
}
