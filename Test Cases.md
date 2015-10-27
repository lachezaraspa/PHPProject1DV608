
#Test cases

Author: Lachezar Asparuhov

##Test case 1.1, Navigate to Page

###Input:
* Clear existing cookies.
* Navigate to site.

###Output:
* Link to the registration page is shown.
* The text "Not logged in", is shown.
* A form for login is shown.
* Todays date and time is shown.

##Test case 1.2: Failed login without any entered fields

###Input:
* Username and password are empty
* Press "Login" button

###Output:
* The text "Not logged in", is shown.
* Error message: “Username is missing” is shown
* A form for login is shown

##Test case 1.3: Failed login with username only

###Input:
* Username is provided and password is empty
* Press "Login" button

###Output:
* The text "Not logged in", is shown.
* Error message: “Password is missing” is shown
* A form for login is shown

##Test case 1.4: Failed login with password only

###Input:
* Username is empty and password is provided
* Press "Login" button

###Output:
* The text "Not logged in", is shown.
* Error message: “Username is missing” is shown
* A form for login is shown

##Test case 1.5: Failed login with wrong credentials

###Input:
* Ether username or password is wrong
* Press "Login" button

###Output:
* The text "Not logged in", is shown.
* Error message: “Wrong name or password” is shown
* A form for registration is shown

##Test case 2.1: Failed to register with missing username
The user is viewing the register page

###Input:
* All fields are filed in except username
* Press "Register" button

###Output:
* The text "Not logged in", is shown.
* The text "Register new user", is shown.
* Error message: “Username has too few characters, at least 3 characters.” is shown
* A form for registration is shown

##Test case 2.2: Failed to register with exisiting username
The user is viewing the register page. A user with username: "User" exists in the database

###Input:
* All fields are filed in and username is "User"
* Press "Register" button

###Output:
* The text "Not logged in", is shown.
* The text "Register new user", is shown.
* Error message: “User exists, pick another username.” is shown
* A form for registration is shown


##Test case 2.3: Failed to register with not matching passwords
The user is viewing the register page.

###Input:
* All fields are filed in and password and repassword are not matching; Example: "PASSWORD" and "password"
* Press "Register" button

###Output:
* The text "Not logged in", is shown.
* The text "Register new user", is shown.
* Error message: “Password do not match” is shown
* A form for registration is shown

##Test case 2.4: Failed to register with not valid email
The user is viewing the register page.

###Input:
* All fields are filed in correctly except email
* Email is shorter than 4 characters or does not contain '@'; Example: "@.e" and "email"
* Press "Register" button

###Output:
* The text "Not logged in", is shown.
* The text "Register new user", is shown.
* Error message: “Not valid email.” is shown
* A form for registration is shown

##Test case 2.5: Registration is successful
The user is viewing the register page.

###Input:
* All fields are filed in correctly
* Press "Register" button

###Output:
* A form for login is shown
* The text "Not logged in", is shown.
* The text "Registered new user.", is shown.

##Test case 3.1: Failed to create task without having task description
The user is loged in and is viewing the form for creating tasks.

###Input:
* No task description is given
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Back to tasks", is shown.
* Error message: "Task cannot be empty! Please fill in some text." is shown.
* A form for creating task is shown

##Test case 3.2: Failed to create task without giving valid date
The user is loged in and is viewing the form for creating tasks.

###Input:
* No date or passed date and time are given
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Back to tasks", is shown.
* Error message: "Please set a valid date for the task." is shown.
* A form for creating task is shown

##Test case 3.3: Failed to create task with too long task description 
The user is loged in and is viewing the form for creating tasks.

###Input:
* Task description is having more than 500 characters
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Back to tasks", is shown.
* Error message: "Task description is too long. Currently:N of chars" is shown.
* A form for creating task is shown

##Test case 3.4: Successful task creation
The user is loged in and is viewing the form for creating tasks.

###Input:
* Task description is having less than 500 characters, it is not empty and the date and time are valid
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Create new task", is shown.
* Message: "Task successfully created." is shown.
* A list of tasks is shown.
* The new task is shown at the bottom.

##Test case 4.1: Failed to edit task without having task description
The user is loged in and is viewing the form for editing tasks. 
The old description of the task is in the text box, and the old date and time are filled in as well.

###Input:
* The old text of the task is erased
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Back to tasks", is shown.
* Error message: "Task cannot be empty! Please fill in some text." is shown.
* A form for creating task is shown

##Test case 4.2: Failed to edit task without giving valid date
The user is loged in and is viewing the form for editing tasks.
The old description of the task is in the text box, and the old date and time are filled in as well.

###Input:
* No date or passed date and time are given
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Back to tasks", is shown.
* Error message: "Please set a valid date for the task." is shown.
* A form for creating task is shown

##Test case 4.3: Failed to edit task with too long task description 
The user is loged in and is viewing the form for editing tasks.
The old description of the task is in the text box, and the old date and time are filled in as well.

###Input:
* Task description is having more than 500 characters
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Back to tasks", is shown.
* Error message: "Task description is too long. Currently:N of chars" is shown.
* A form for creating task is shown

##Test case 4.4: Successfuly edited task
The user is loged in and is viewing the form for editing tasks.
The old description of the task is in the text box, and the old date and time are filled in as well.

###Input:
* Task description is having less than 500 characters, it is not empty and the date and time are valid
* Press "Create" button

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Create new task", is shown.
* Message: "Task successfully edited." is shown.
* A list of tasks is shown.


##Test case 5.1: Successfuly delete task
The user is loged in and is viewing the list of tasks.
Bellow each task there is "Delete" button;

###Input:
* Press "Delete" button bellow a task

###Output:
* The text "Loged in as 'Username'", is shown.
* The link "Create new task", is shown.
* Message: "Task deleted!" is shown.
* A list of tasks is shown.

