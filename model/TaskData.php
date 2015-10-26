<?php

/**
 * Class that represents task object
 *
 * @author Lachezar
 */
class TaskData {
    
    private $body;
    private $id;
    private $dueDate;
    private $creationDate;
    private $send;
    
    public function __construct($id,$body, $dueDate, $creationDate, $send) {
        $this->body = $body;
        $this->dueDate = $dueDate;
        $this->creationDate = $creationDate;
        $this->id = $id;
        $this->send = $send;
       
    }
    
    public function getID(){
        return $this->id;
    }

    public function getBody(){
        return $this->body;
    }
    
    public function getDueDate(){
        return $this->dueDate;
    }
    
    public function getCreationDate(){
        return $this->creationDate;
    }
    
     /**
     * Can be used in further implementation where sending reminder 
     * emails is possible.
     * @return boolean
     * 
     */
    public function getSend(){
        return $this->send;
    }
  
    
}
