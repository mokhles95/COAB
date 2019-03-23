<?php
session_start();
require_once 'login.php';
$user = new USER();
if(!$user->is_loggedin())
{
 $user->redirect('../index.php');
}

if($user->is_loggedin()!="")
{
 $user->logout(); 
 $user->redirect('../index.php');
}
?>