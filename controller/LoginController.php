<?php

/**
 * @author Lachezar
 */
class LoginController {

    private $model;
    private $view;
    private $conn;
    private $dal;

    function __construct(LoginView $view, LoginModel $model) {
        $this->view = $view;
        $this->model = $model;
    }

    public function control(UserDAL $dal) {
        
        $this->view->setMessage();
        $this->view->populateName();
        $_SESSION['newUser'] = false;
       
        
        if ($this->model->isLoged()) {
            if ($this->view->isLogOutPressed()) {
                $this->model->doLogout();
                $this->view->setLogout();
                $this->view->setMessage();
            }
        } else {
            if ($this->view->isLoginPressed()) {

                $name = $this->view->getName();
                $pass = $this->view->getPass();

                if ($this->model->doLogin($name, $pass, $dal)) {
                    $this->view->setLoginSuccess();
                    $this->view->setMessage();
                    
                } else {
                    $this->view->setLoginFail();
                    $this->view->setMessage();
                }
            }
        }
    }

}
