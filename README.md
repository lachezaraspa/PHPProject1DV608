# PHPProject1DV608

##Author: Lachezar <la222ki@student.lnu.se>



###Overview
  The project in this repository presents a simple web aplication wirtten in PHP. The pourpose of this application is to allow users to organize their everyday tasks. This is acheived through a simple page where upon login a list of already created tasks is shown to the user. Each task in the list is displayed with additional information for it, including: description of the task, due date and time and time left until the task expires. The logged in user can create new tasks, edit and delete the already created tasks.
  
###Project goals:
  * Provides secured login function 
  * New users can create accounts
  * Users' passwords are encrypted 
  * List of tasks and additional information is presented upon login
  * Users can create, edit and delete tasks
  * The application notifies a user by sending an email when the due date of a certain task is approaching
  * User can logout

###Not yet implemented 
  * The application notifies a user by sending an email when the due date of a certain task is approaching
    * Reason: the project requirements do not permit the use of external libraries. Additionally, the native PHP mail() library     does not support SMTP authentication, thus in general it cannot be used to send emails.  
