<?php

include "controller/Login.Controller.php";


include "controller/Template.Controller.php";
$templade = new ControllerTemplate;
$templade -> controllerTemplate();
$templade = new ControllerLogin;
$templade -> controllerLogin();




?>