<?php

/**
 * The class adds and
 * edits data from the User database.
 *
 * @author Lachezar
 */
class UserDAL {

    private $dbconn;
    private $username;
    private $password;
    private $email;
    private static $table = "users";
    private static $db = "b31_16789578_project";

    public function __construct(mysqli $db) {
        $this->dbconn = $db;
    }

    /**
     * Fetches a user from a database
     * @return UserCredent  
     */
    public function getUserByName($name) {

        $stmt = ("SELECT * FROM `" . self::$table . "` WHERE `name` LIKE '" . $name . "'");

        
            $results = mysqli_query($this->dbconn, $stmt);
            
           
            while ($row = mysqli_fetch_array($results)) {

                $this->username = $row['name'];
                $this->password = $row['password'];
                $this->email = $row['email'];
            }

            if (!empty($this->username) && !empty($this->password) && !empty($this->email)) {
                $user = new UserCredent($this->username, $this->password, $this->email);
                return $user;
            } else {
                throw new Exception("User does not exist");
            }
            
        

        mysqli_free_result($results);
    }

    /**
     * Creates new row in the db containing 
     * users credentials
     * 
     * @param type $username
     * @param type $password
     * @param type $email
     * @throws Exception
     */
    public function addUser($username, $password, $email) {

        $stmt = "INSERT INTO `".self::$db."`.`" . self::$table . "` (`name`, `password`, `email`) VALUES ('" . $username . "','" . $password . "','" . $email . "')";

        if ($this->dbconn->query($stmt) === TRUE) {
            echo "New record created successfully";
        } else {
            throw new Exception("Error: " . $stmt . "<br>" . $this->dbconn->error);
        }
    }

}
