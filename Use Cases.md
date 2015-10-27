
#Use Case specification

Author: Lachezar Asparuhov 

##Use Case 1: Loging in 

###Main Scenario
 
  1. Starts when a user wants to authenticate.
  2. System asks for username, password
  3. User provides username and password
  4. System authenticates the user and presents the users' list of taks
 
 ###Alternate Scenarios 
  4a. User is not authenticated
    i. System presents an error message
    ii. Step 2 in main scenario

##Use Case 2: Registering new user

###Main Scenario
 
  1. Starts when a user wants to register.
  2. System asks for username, password, repeat password and email.
  3. User provides username, password, repasword and email.
  4. System checks that the username does not exist, and that the password and repassword match
  5. System successfuly register the user and redirects to the login page
 
 ###Alternate Scenarios 
  4a. Username exist 
    i. System presents an error message
    ii. Step 2 in main scenario
    
  4b. Username is empty
    i. System presents an error message
    ii. Step 2 in main scenario
    
  4c. Password is empty or do not match with repeat password
    i. System presents an error message
    ii. Step 2 in main scenario
    
  4d. Email provided is not valid email
    i. System presents an error message
    ii. Step 2 in main scenario
    
    
