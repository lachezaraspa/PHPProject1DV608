<?php

require_once ('view/LoginView.php');
require_once ('view/DateTimeView.php');
require_once ('view/LayoutView.php');
require_once ('view/RegisterView.php');
require_once ('view/TaskView.php');

require_once ('model/UserCredent.php');
require_once ('model/LoginModel.php');
require_once ('model/RegisterModel.php');
require_once ('model/UserDAL.php');


require_once ('controller/MasterController.php');


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');


//CREATE OBJECTS OF THE VIEWS
$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();
$rv = new RegisterView();
$tv = new TaskView();


session_set_cookie_params(0);
session_name();
session_start();

//If the sessions are not set, set them to false
if (!isset($_SESSION['LogIn'])) {
    $_SESSION['LogIn'] = false;
}

if (!isset($_SESSION['newUser'])) {
    $_SESSION['newUser'] = false;
}

if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = false;
}

if (!isset($_SESSION['usernameLoged'])) {
    $_SESSION['usernameLoged'] = false;
}

if (!isset($_SESSION['notice'])) {
    $_SESSION['notice'] = false;
}

if (!isset($_SESSION['redirect'])) {
    $_SESSION['redirect'] = false;
}


$regmodel = new RegisterModel(); // Registration model 
$logmodel = new LoginModel(); //Login model

$master = new MasterController($v, $logmodel, $tv, $dtv, $regmodel, $rv, $lv);
$master->masterContol();

$lv->render($logmodel->isLoged(), $v, $dtv, $rv, $tv, $regmodel->isRegistered());

$_SESSION['notice'] = false;
