<?php

/**
 * Description of LoginModel
 *
 * @author Lacho
 */
class LoginModel {

    public function isLoged() {
        if ($_SESSION['LogIn'] == true) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($username, $pass, UserDAL $dal) {

        try {
            $user = $dal->getUserByName($username);
            $hashedPass = crypt($pass, $username);
    
            if ($user->getName() === $username && $hashedPass === $user->getPass()){
                $_SESSION['LogIn'] = true;
                $_SESSION['usernameLoged'] = $user->getName();
                return true;
            } else {   //In any other case when username or pass are wrong
                return false;
            }
            
        } catch (Exception $e) {
            return false;
        }
    }

    public function doLogout() {
        $_SESSION['usernameLoged'] = false;
        if ($_SESSION['LogIn'] != false) { //Checks for resubition of logout post
            $_SESSION['LogIn'] = false;
            session_destroy();
        }
    }

}
