<?php


require_once ('controller/LoginController.php');
require_once ('controller/RegisterContoller.php');
require_once ('controller/TaskController.php');

require_once ('model/TaskDAL.php');
require_once ('model/UserDAL.php');
require_once ('model/TaskData.php');

/**
 * Controller that 
 * controls the other smaller controllers in the application
 *
 * @author Lacezar
 */
class MasterController {

    private $logView;
    private $logModel;
    private $dtv;
    private $regView;
    private $regModel;
    private $taskView;
    private $layoutView;
    private $tDAL;
    private $userDAL;

    public function __construct(LoginView $logView, LoginModel $logModel, TaskView $taskView, DateTimeView $dtv, RegisterModel $regModel, RegisterView $regView, LayoutView $layoutView) {
        
        $this->dtv = $dtv;
        $this->logView = $logView;
        $this->logModel = $logModel;
        $this->regModel = $regModel;
        $this->regView = $regView;
        $this->taskView = $taskView;
        $this->layoutView = $layoutView;

        $this->conn = new mysqli("sql103.byethost31.com", "b31_16789578", "46m9vcjz", "b31_16789578_project");              
        //$this->conn = new mysqli("localhost", "root", "root", "userdb");

        // Check connection
        if ($this->conn->connect_error) {
            throw new Exception($this->conn->connect_error);
        }

        $this->userDAL = new UserDAL($this->conn);
        $this->tDAL = new TaskDAL($this->conn);
    }
    
    public function masterContol(){
        $regControl = new RegisterContoller($this->regModel, $this->regView, $this->layoutView, $this->logView);//Controller for registration
        $loginContol = new LoginController($this->logView, $this->logModel);//Use the contoller to log in
        $taskControl = new TaskController($this->taskView, $this->logView, $this->logModel, $this->dtv);// Contoller for manipulationg and creationg tasks
        
        $loginContol->control($this->userDAL);
        $regControl->control($this->userDAL);
        $taskControl->control($this->tDAL);
        
        $this->conn->close();
    }

}
