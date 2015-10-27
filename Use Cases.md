
#Use Case specification

Author: Lachezar Asparuhov 

##Use Case 1: Loging in 

###Main Scenario
 
  1. Starts when a user wants to authenticate.
  2. System asks for username, password.
  3. User provides username and password.
  4. System authenticates the user and presents the users' list of taks.

###Alternate Scenarios 
  * 4a. User is not authenticated.
   * i. System presents an error message.
   * ii. Step 2 in main scenario.

##Use Case 2: Registering new user

###Main Scenario
 
  1. Starts when a user wants to register.
  2. System asks for username, password, repeat password and email.
  3. User provides username, password, repasword and email.
  4. System checks that the username does not exist, and that the password and repassword match.
  5. System successfuly register the user and redirects to the login page.
 
###Alternate Scenarios 
  * 4a. Username exist.
   * i. System presents an error message.
   * ii. Step 2 in main scenario.
    
  * 4b. Username is empty.
   * i. System presents an error message.
   * ii. Step 2 in main scenario.
    
  * 4c. Password is empty or do not match with repeat password.
   * i. System presents an error message.
   * ii. Step 2 in main scenario.
    
  * 4d. Email provided is not valid email.
   * i. System presents an error message.
   * ii. Step 2 in main scenario.

##Use Case 3: User creates new task

###Main Scenario
 
  1. Starts when a user is loged in and wants to create new task.
  2. System asks for task description, due date and time for the task and if the user wants a reminder for the task.
  3. System checks the fields provided and creates new task in the user record.
  4. System redirects the user to the list of tasks page.
 
 ###Alternate Scenarios 
  * 3a. New task is not created due to not valid task description or not valid due date and time.
   * i. System presents an error message.
   * ii. Step 2 in main scenario.
    

##Use Case 4: User edits already created task

###Main Scenario
 
  1. Starts when a user is loged in and wants to edit task.
  2. System provides the information previously declared for the task.
  3. System asks for new task description, new due date and time for the task and again if the user wants a reminder for the      task.
  4. System checks the fields provided and edits the task in the user record.
  5. System redirects the user to the list of tasks page.
 
 ###Alternate Scenarios 
  * 4a. Task is not created due to not valid task description or not valid due date and time.
   * i. System presents an error message.
   * ii. Step 3 in main scenario.

##Use Case 5: User deletes task

###Main Scenario
 
  1. Starts when a user is loged in and wants to delete task.
  2. System provides list of all user tasks with an option for deletion.
  3. User choose a task to delete.
  4. System deletes the task from the user records.

    
 
