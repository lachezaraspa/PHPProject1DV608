# PHP Project 1DV608
#Task Scheduler 

##Author: Lachezar Asparuhov

###Overview
  The project in this repository presents a simple web aplication wirtten in PHP. The pourpose of this application is to allow users to organize their everyday tasks. This is acheived through a simple page where upon login a list of already created tasks is shown to the user. Each task in the list is displayed with additional information for it, including: description of the task, due date and time and time left until the task expires. The logged in user can create new tasks, edit and delete the already created tasks.
  
###Project goals:
  * Provides secured login function 
  * New users can create accounts
  * Users' passwords are encrypted 
  * List of tasks and additional information is presented upon login
  * Users can create, edit and delete tasks
  * The application notifies a user by sending an email when the due date of a certain task is approaching
  * Very basic design with CSS
  * User can logout
  * Code is following the Model-View-Controller pattern
  * Code is Object oriented 

###Not yet implemented 
  * The application notifies a user by sending an email when the due date of a certain task is approaching
    * Reason: the project requirements do not permit the use of external libraries. Additionally, the native PHP mail() library     does not support SMTP authentication, thus in general it cannot be used to send emails.
    

###The application can be seen at: http://lachoproject.byethost31.com/

###Use cases at: https://github.com/lachezaraspa/PHPProject1DV608/blob/master/Use%20Cases.md

###Test cases at: 

###Instalation:  
  * Upload files to server that supports PHP 5.4 or later
  * Create a databes using the userdb.sql script
  * Provide connection and credentials information for the database by modifying the MasterController.php file
  * Modify the field $db in UserDAL.php and TaskDAL.php to match the database name
  
