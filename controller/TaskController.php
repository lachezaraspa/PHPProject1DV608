<?php


/**
 * Description of TaskController
 *
 * @author Lachezar
 */
class TaskController {

    private $tv;
    private $lv;
    private $logModel;
    private $tDAL;
    private $conn;
    private $dtv;

    public function __construct(TaskView $tv, LoginView $lv, LoginModel $logModel, DateTimeView $dtv) {
        
        $this->tv = $tv;
        $this->lv = $lv;
        $this->logModel = $logModel;
        $this->dtv = $dtv;
    }
    
    public function control(TaskDAL $tDAL) {
          
        
        if($this->lv->isLoginPressed()){
            $_SESSION['notice'] = $this->lv->setMessage();
            
        }
        
        if ($_SESSION['LogIn'] === true) {
            $this->tv->buildList($tDAL->getUserTasks($_SESSION['usernameLoged']),  $this->dtv);
            
            
        }
        if ($this->tv->isLogOutPressed()) {
            $this->logModel->doLogout();
            $this->lv->setLogout();
            $this->lv->setMessage();
            
        }

        if ($this->tv->isCreateTask()) {
            try {
                
                if ($tDAL->createTask($_SESSION['usernameLoged'], $this->tv->getTaskBoby(), $this->tv->getDueDate(), $this->dtv->returnDate(), $this->tv->getCheckBox())){
                    $_SESSION['notice'] = 'Task successfully created.';
                   
                    $this->tv->refresh();

                    
                }else{
                    $this->tv->generateMessage($this->dtv, $this->tv->getDueDate());
                }
            } catch (Exception $e) {
                echo $e;
            }
        }

        if ($this->tv->deletePressed()) {
            try {
                $tDAL->deleteTask($this->tv->getDeleteID());
                $this->tv->refresh();
            } catch (Exception $e) {
                echo $e;
            }
        }

        //When the user wants to view the edit form
        if ($this->tv->editPressed()) {
            try {
                $editTask = $tDAL->getTaskFromID($this->tv->getEditID());
                $this->tv->populateBody($editTask->getBody());
                $this->tv->populateDate($editTask->getDueDate());
                $this->tv->populateTime($editTask->getDueDate());
                
            } catch (Exception $e) {
                echo $e;
            }
        }

        if ($this->tv->editTask()) {
               
            try {
                if ($tDAL->editTask($this->tv->getEditID(), $_SESSION['usernameLoged'], $this->tv->getTaskBoby(), $this->tv->getDueDate(), $this->dtv->returnDate(), $this->tv->getCheckBox())) {
                   $_SESSION['notice'] = 'Task successfuly edited';
                   
                   $this->tv->refresh();
                 
                     
                }else{
                    $this->tv->generateMessage($this->dtv, $this->tv->getDueDate());
                    
                }
            } catch (Exception $e) {
                echo $e;
            }
        }
    }

}
