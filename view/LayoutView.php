<?php

class LayoutView {

    private static $urlRegister = "registration";
    private static $urlLogin = "?";

    public function render($isLoggedIn, LoginView $v, DateTimeView $dtv, RegisterView $rv, TaskView $tv, $isRegistered) {
        echo '<!DOCTYPE html>
      <html>
        <head>
        <link rel="stylesheet" type="text/css" href="view/style.css">
          <meta charset="utf-8">
          <title>Task scheduler</title>
           
        </head>
        <body>
          <h1>Task scheduler</h1> 
          ' . $this->renderHref($isLoggedIn, $isRegistered) . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          <div class="container"> 
             ' . $this->renderForm($rv, $v,$tv, $isLoggedIn, $isRegistered) . '
              ' . $dtv->show() . '   
                  
          </div>
         </body>
      </html>
    ';
    }

    private function renderHref($isLoggedIn, $isRegistered) {
        $link = "";
        
        if(!$isLoggedIn){
                $link = '<a href ="?' . self::$urlRegister . '">Register a new user</a>';

            if (!$isRegistered && isset( $_GET[self::$urlRegister])) {
                $link = '<a href ="' . self::$urlLogin . '">Back to login</a>';
            }
        }
        return $link;
    }

    public function renderForm(RegisterView $rv, LoginView $v, TaskView $tv, $isLoggedIn, $isRegistered) { //Show registration or login form depending on user input
        
       if (!$isRegistered && !$isLoggedIn && isset( $_GET[self::$urlRegister])) {
           return $rv->generateRegistrationForm(); //If a user wants to view the registration form
           
        } elseif($isRegistered && isset( $_GET[self::$urlRegister])) {
            header('Location: ' . self::$urlLogin, true); //If the registration is successfull return to login page
            return $v->response();
        }elseif($isLoggedIn){
            return $tv->responseForm(); //Show the task list when a user is loged in
        }else{
            return $v->response();//In the other cases show the login page
        }
    }

    private function renderIsLoggedIn($isLoggedIn) {
        if ($isLoggedIn) {
            return '<h2>Logged in as '.$_SESSION['usernameLoged'].'</h2>';
        } else {
            return '<h2>Not logged in</h2>';
        }
    }

}
