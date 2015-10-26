<?php

/**
 * Creates, updates and deletes task from the db
 *
 * @author Lachezar
 */
class TaskDAL {

    private $userTasks = array();
    private static $table = "tasks";
    private static $db = "b31_16789578_project";
    
    function __construct(mysqli $db) {
        $this->dbconn = $db;
    }

    /**
     * Returns array of user specific tasks
     * 
     * @param type $name
     * @return type array
     */
    public function getUserTasks($name) {

        $stmt = ("SELECT * FROM `" . self::$table . "` WHERE `username` LIKE '" . $name . "'");

        $results = mysqli_query($this->dbconn, $stmt);

        while ($row = mysqli_fetch_array($results)) {
            $task = new TaskData($row['id'], $row['body'], $row['dueDate'], $row['creationDate'], $row['send']);
            array_push($this->userTasks, $task);
        }

        mysqli_free_result($results);
        return $this->userTasks;
    }

    /**
     * Creates new task in the db
     * 
     * @param type $username
     * @param type $body
     * @param type $dueDate
     * @param type $creationDate
     * @param type $send
     * @return boolean TRUE if a task is successfully created
     * @throws Exception
     */
    public function createTask($username, $body, $dueDate, $creationDate, $send) {
        
        $this->checkDate($creationDate, $dueDate);
       
        $stmt = ("INSERT INTO `" . self::$table . "` (`username`, `body`, `dueDate`, `creationDate`, `send`) "
                . "VALUES ('" . $username . "', '" . $body . "', '" . $dueDate . "', '" . $creationDate . "', '" . $send . "')");
        

        if ($body != "" && $dueDate != "" && $this->checkDate($creationDate, $dueDate) && strlen($body) <= 500) { //Check that the body and the date are not empty
            if ($this->dbconn->query($stmt) === TRUE) {
                return true;
            } else {
                throw new Exception("Error: " . $stmt . "<br>" . $this->dbconn->error);
            }
        } else {
            return false;
        }
    }

    /**
     * Deletes a task from the db
     * 
     * @param type $id
     * @return boolean TRUE if task is successfully deleted
     * @throws Exception
     */
    public function deleteTask($id) {
        $stmt = ("DELETE FROM `" . self::$db . "`.`" . self::$table . "` WHERE `tasks`.`id` =" . $id . "");

        if ($this->dbconn->query($stmt) === TRUE) {
            return true;
        } else {
            throw new Exception("Error: " . $stmt . "<br>" . $this->dbconn->error);
        }
    }

   
    /**
     * Fetches a task from the database depending on its ID
     * 
     * @param type $id
     * @return \TaskData
     */
    public function getTaskFromID($id) {

        $stmt = ("SELECT * FROM `" . self::$table . "` WHERE `id` LIKE '" . $id . "'");

        $results = mysqli_query($this->dbconn, $stmt);

        while ($row = mysqli_fetch_array($results)) {
            $task = new TaskData($row['id'], $row['body'], $row['dueDate'], $row['creationDate'], $row['send']);
        }

        mysqli_free_result($results);
        return $task;
    }

    
    /**
     * Updates the database with the newly edited task
     * 
     * @param type $id
     * @param type $username
     * @param type $body
     * @param type $dueDate
     * @param type $creationDate
     * @param type $send
     * @return boolean TRUE if task is successfully updated
     * @throws Exception
     */
    public function editTask($id, $username, $body, $dueDate, $creationDate, $send) {

        
        
        $stmt = ("UPDATE `" . self::$table . "` SET `username` ='" . $username . "',"
                . "`body` ='" . $body . "',`dueDate` = '" . $dueDate . "',`creationDate` = '" . $creationDate . "',`send` = '" . $send . "'"
                . "WHERE `id` LIKE '" . $id . "'");
       
        if ($body != "" && $dueDate != "" && $this->checkDate($creationDate, $dueDate) && strlen($body) <= 500) { //Check that the body and the date are not empty
            if ($this->dbconn->query($stmt) === TRUE) {
                return true;
            } else {
                throw new Exception("Error: " . $stmt . "<br>" . $this->dbconn->error);
            }
        } else {
            return false;
        }
    }
    
    /**
     * Checks if the due date for a given task is a valid date
     * 
     * @param type $currentD
     * @param type $setedUp
     * @return boolean TRUE if the task due date is a valid date
     */
    private function checkDate($currentD, $setedUp){
        
        $datetime1 = new DateTime($currentD);
        $datetime2 = new DateTime($setedUp);
        $interval = $datetime1->diff($datetime2);
        
        $timeLeft =  $interval->format("%r%i%m%d");

        if($timeLeft < 0){
            return false;
        }else{
            return true;
        }
    }
 
}
