<?php

/**
 * Controls the registration view and model
 *
 * @author Lacho
 */
class RegisterContoller {

    private $view;
    private $model;
    private $conn;
    private $dal;
    private $lv;
    private $lgv;
            
    
    public function __construct(RegisterModel $model, RegisterView $view, LayoutView $lv, LoginView $lgv) {
        $this->model = $model;
        $this->view = $view;
        $this->lv = $lv;
        $this->lgv = $lgv;
      
    }

    public function control(UserDAL $dal) {
        
        if ($this->view->isRegisterPressed()) {
            
            $this->model->register($this->view->getName(), $this->view->getPass(), $this->view->getRePass(), $this->view->getEmail(), $dal); //Try to register new user
            
            if (!$this->model->isRegistered()) { //Fail registration
                $this->view->registrationFail();
                $this->view->generateMessage($this->lv);
                
            } else { //When user is successfuly registered
                $_SESSION['newUser'] = true;
                $this->view->registrationSuccess();
                $_SESSION['name'] = $this->view->getName();
                
                
            }
        }
    }

}
