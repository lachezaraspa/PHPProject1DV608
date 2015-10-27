
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

##Test case 1.4: Failed login with password only

###Input:
* Username is empty and password is provided
* Press "Login" button

###Output:
* The text "Not logged in", is shown.
* Error message: “Username is missing” is shown
* A form for login is shown

