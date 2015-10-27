
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
* All fields are filed in and password and repassword are not matching; Example: "PASSWORD" and "password"
* Press "Register" button

###Output:
* The text "Not logged in", is shown.
* The text "Register new user", is shown.
* Error message: “Password do not match” is shown
* A form for registration is shown
