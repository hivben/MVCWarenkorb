<?php

    include "model/DBConnect.php";
    include "controller/controller.php";
    session_start();

    if(!isset($_SESSION['controller'])){
        $_SESSION['controller'] = new Controller();
    }

    $_SESSION['controller']->DBConnect_DatenEinlesen();

    


    include "view/Template.php";





?>