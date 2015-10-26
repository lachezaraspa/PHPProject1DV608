<?php

/**
 * Displays the different tasks seted up by a user
 *
 * @author Lachezar
 */
class TaskView {

    private static $taskBody = 'TaskView::TaskBody';
    private static $taskDueDate = 'TaskView::DueDate';
    private static $deleteTask = 'TaskView::DeleteTask';
    private static $checkbox = 'TaskView::CheckBox';
    private static $createTask = 'TaskView::CreateTask';
    private static $deleteID = 'TaskView::DeleteID';
    private static $editButton = 'TaskView::Edit';
    private static $editTask = 'edit';
    private static $editID = "";
    private static $out = 'TaskView::Out';
    private static $urlCreateTask = "newTask";
    private static $urlTaskList = "?";
    private $list;  //List of tasks
    private $body;  //Body of the task that will be edited
    private $date;  //Due date of the task that will be edited
    private $hour;  //Due time of the task
    private $minute; // ----||----
    private static $hours = 'TaskView::Hours';
    private static $minutes = 'TaskView::Minutes';
    private $message = ""; //Error masages

    /**
     * Returns the apropriate form
     * 
     * @return string
     */
    public function responseForm() {
        if (isset($_GET[self::$urlCreateTask])) {
            return $this->createTaskForm();
        } elseif (isset($_GET[self::$editTask])) {
            return $this->editTaskForm();
        } else {
            return $this->showTasks();
        }
    }

    /**
     * Shows a list of user tasks
     * 
     * @return string
     */
    public function showTasks() {

        return $this->hrefGenerator() .
                '<p>' . $_SESSION['notice'] . '</p>'
                . '<ul id="ul">' .
                $this->list
                . '</ul>
                    
                <form  method="post" >
				<input type="submit" name="' . self::$out . '" value="Logout"/>
			</form>';
    }

    /**
     * Method that creates dropdown 
     * list to let the user choose time for the tasks
     * 
     * @return string
     */
    public function showHours() {

        $hours = '<form method="post">'
                . '<select id="' . self::$hours . '" name="' . self::$hours . '">';

        if ($this->hour != null) { //When an edit form is requested the time will be filed in
            $hours.= '<option>' . $this->hour . '</option>';
        }

        //For 24 hour format
        for ($i = 0; $i <= 2; $i++) {
            for ($j = 0; $j <= 9; $j++) {
                if ($i === 2 && $j === 4) {
                    break;
                }
                $hours.= '<option>' . $i . '' . $j . '</option>';
            }
        }
        $hours.='</select>';
        return $hours;
    }

    /**
     * Same as showHours...
     * @return string
     */
    public function showMinutes() {

        $minutes = '<form method="post">'
                . '<select id="' . self::$minutes . '" name="' . self::$minutes . '">';

        if ($this->minute != null) {
            $minutes.= '<option>' . $this->minute . '</option>';
        }

        for ($i = 0; $i <= 5; $i++) {
            for ($j = 0; $j <= 9; $j++) {

                $minutes.= '<option>' . $i . '' . $j . '</option>';
            }
        }
        $minutes.=' </select></form>'; //The <form> tag that is open in showHours is closed here.
        return $minutes;
    }

    /**
     * Method for generating form for creating tasks
     * @return type string
     */
    public function createTaskForm() {

        return $this->hrefGenerator() . '
            
			<form method="post" > 
                        <br>
				<fieldset>
					<legend>Create new task</legend>
                                        <p>' . $this->message . '</p>

					<label for="' . self::$taskBody . '">Task description :<br><small>Max 500 characters.</small></label><br>
					<textarea id = "taskBody" name="' . self::$taskBody . '" ROWS=4 COLS=30 >' . $this->getTaskBoby() . '</textarea>
                                        
                                        <br>   
					<label for="' . self::$taskDueDate . '">To be completed :</label>
					<input type="date" id="' . self::$taskDueDate . '" name="' . self::$taskDueDate . '" value = ' . $this->getDueDate() . ' />
                                        <br>
                                        <label for="' . self::$checkbox . '">Remind by sending email :</label>
                                        <input type="checkbox" id="' . self::$checkbox . '" name="' . self::$checkbox . '" checked/>
                                        <br>
                                        <label for ="' . self::$hours . '">Set hour :</label>'
                                        . $this->showHours() .
                                        '<label for ="' . self::$minutes . '"> Set minutes :</label>'
                                        . $this->showMinutes() . '
                                        <br>
					<input type="submit" name="' . self::$createTask . '" value="Create" />
				</fieldset>
			</form>
		';
    }

    /**
     * Method for generating form for editing tasks
     * 
     * Body, date and time are automatically filled in 
     * depending on their previous values
     * 
     * @return string
     * 
     */
    public function editTaskForm() {

        return $this->hrefGenerator() . '
            
			<form method="post" >
                        <br>
				<fieldset>
					<legend>Edit task</legend>
                                        <p>' . $this->message . '</p>
                                            
					<label for="' . self::$taskBody . '">Task description :<br><small>Max 500 characters.</small></label><br>
					<textarea id = "taskBody" name="' . self::$taskBody . '" ROWS=4 COLS=30 >' . $this->body . '</textarea>
                                        <br>   
					<label for="' . self::$taskDueDate . '">To be completed :</label>
					<input type="date" id="' . self::$taskDueDate . '" name="' . self::$taskDueDate . '" value = ' . $this->date . ' />
                                        <br>
                                        <label for="' . self::$checkbox . '">Remind by sending email :</label>
                                        <input type="checkbox" id="' . self::$checkbox . '" name="' . self::$checkbox . '" checked/>
                                        <br>  
                                        <label for ="' . self::$hours . '">Set hour :</label>'
                                        . $this->showHours() .
                                        '<label for ="' . self::$minutes . '"> Set minutes :</label>'
                                        . $this->showMinutes() . '
                                        <br>
					<input type="submit" name="' . self::$editButton . '" value="Edit" />
				</fieldset>
			</form>
		';
    }

    /**
     * Builds list of tasks and 
     * diplays information for each task.
     * 
     * @param type $list
     */
    public function buildList($list, DateTimeView $dtv) {
        $left = "";
        $date = new DateTime($dtv->returnDate());

        foreach ($list as $task) {
            self::$editID = $task->getID();

            $timeLeft = $date->diff(new DateTime($task->getDueDate()));

            $url = '"?' . self::$editTask . '=' . self::$editID . '"';

            //Check if the task has expired and displays the appropriate text
            if ($this->timeLeftHandler($dtv, $task->getDueDate())) {
                $left = '<b>Time left: Mounts:</b> ' . $timeLeft->m . ' <b>Days:</b> ' . $timeLeft->d . ' <b>Hours:</b> ' . $timeLeft->h . ' <b>Minutes:</b>  ' . $timeLeft->i;
            } else {
                $left = "Expired";
            }

            $this->list .= '<br><li id="li"><b>Task:</b> ' . $task->getBody() . ' <br> <b>Due date:</b> ' . $task->getDueDate() . ' '
                    . $left
                    . '<br>'
                    . '<a href =' . $url . '>Edit</a>'
                    . '<form method="post">'
                    . '<input type = "hidden", name = "' . self::$deleteID . '" value = "' . $task->getID() . '"/>'
                    . '<input type="submit"  name="' . self::$deleteTask . '" value="Delete" />'
                    . '</form>'
                    . '</li>'
            ;
        }
    }

    /**
     * Generates error messages for creating
     * and editing tasks.
     */
    public function generateMessage(DateTimeView $dtv, $dueDate) {

        if ($this->isCreateTask() && $this->getTaskBoby() === "") {
            $this->message .= "Task cannot be empty! Please fill in some text.";
        } elseif ($this->isCreateTask() && $this->getDueDate() === "") {
            $this->message .= "Please set a valid date for the task.";
        } elseif ($this->editTask() && $this->getTaskBoby() === "") {
            $this->message .= "Task cannot be empty! Please fill in some text.";
        } elseif ($this->editTask() && $this->getDueDate() === "") {
            $this->message .= "Please set a valid date for the task.";
        } elseif (!$this->timeLeftHandler($dtv, $dueDate)) {
            $this->message .= "Please set a valid date for the task.";
        } elseif ($this->isCreateTask() && strlen ($this->getTaskBoby())>500) {
            $this->message .= "Task description is too long. Currently:".strlen($this->getTaskBoby())."";
        } elseif ($this->editTask() && strlen ($this->getTaskBoby())>500) {
            $this->message .= "Task description is too long. Currently:".strlen($this->getTaskBoby())."";
        }
    }

    /**
     * Generates apropriate links for navigation
     * @return string
     */
    public function hrefGenerator() {
        $link = "";

        if (isset($_GET[self::$urlCreateTask]) || isset($_GET[self::$editTask])) {
            $link = '<a href ="' . self::$urlTaskList . '">Back to tasks</a>';
        } else {
            $link = '<a href ="?' . self::$urlCreateTask . '">Create new task</a>';
        }
        return $link;
    }

    public function isLogOutPressed() {
        return isset($_POST[self::$out]);
    }

    public function isCreateTask() {
        return isset($_POST[self::$createTask]);
    }

    /**
     * Returns the body of the task
     * @return type
     */
    public function getTaskBoby() {
        $body = null;
        if (isset($_POST[self::$taskBody])) {
            $body = $_POST[self::$taskBody];
        }
        return $body;
    }

    /**
     * Returns the due date and time setted up by the user
     * @return string
     */
    public function getDueDate() {
        $date = null;
        $dueDate = null;

        if (isset($_POST[self::$taskDueDate])) {
            $dueDate = $_POST[self::$taskDueDate] . " " . $_POST[self::$hours] . ":" . $_POST[self::$minutes] . ":00";
        }
        return $dueDate;
    }

    /**
     * Checks if user wants to delete a task
     * @return true/false
     */
    public function deletePressed() {
        return isset($_POST[self::$deleteTask]);
    }

    //Check if the user wants to redirect to the edit page
    public function editPressed() {
        return isset($_GET[self::$editTask]);
    }

    /**
     * Gets the id of the task to be edited
     * 
     * @return type
     * @throws Exception
     */
    public function getEditID() {
        if ($this->editPressed()) {
            return $_GET[self::$editTask];
        } else {
            throw new Exception("No such task");
        }
    }

    //Check if the user wants to update a taks 
    public function editTask() {
        return isset($_POST[self::$editButton]);
    }

    /**
     * Get the id of the task to be deleted
     * 
     * @return type
     * @throws Exception
     */
    public function getDeleteID() {
        if ($this->deletePressed()) {
            return $_POST[self::$deleteID];
        } else {
            throw new Exception("No such task");
        }
    }

    /* Redirects the user to the page that 
     * contains the list of tasks
     */

    public function refresh() {
        header('Location: ' . self::$urlTaskList, true);
        die();
    }

    //Populates the body of the task 
    public function populateBody($body) {
        $this->body = $body;
    }

    //Populates the due date of the task
    public function populateDate($date) {
        $this->date = $date;
    }

    //Populates the due time of the task
    public function populateTime($time) {
        $date = strtotime($time);
        $this->hour = date('H', $date);
        $this->minute = date('i', $date);
    }

    /**
     * Checks if the due date is a valid date
     * 
     * @param DateTimeView $dtv
     * @param type $dueDate
     * @return boolean
     */
    private function timeLeftHandler(DateTimeView $dtv, $dueDate) {

        $datetime1 = new DateTime($dtv->returnDate());
        $datetime2 = new DateTime($dueDate);
        $interval = $datetime1->diff($datetime2);

        $timeLeft = $interval->format("%r%i%m%d");

        if ($timeLeft <= 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Can be used in further implementation where sending reminder 
     * emails is possible.
     * @return boolean
     */
    public function getCheckBox() {
        $check = null;
        if (isset($_POST[self::$checkbox])) {
            if ($_POST[self::$checkbox] === 0) {
                $check = FALSE;
            } else {
                $check = TRUE;
            }
        }
        return $check;
    }

}
