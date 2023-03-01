<?php

    include "model/DBConnect.php";
    include "controller/controller.php";
    session_start();

    if(!isset($_SESSION['controller'])){
        $_SESSION['controller'] = new Controller();
    }

    $_SESSION['controller']->DBConnect_DatenEinlesen();

    if(isset($_POST['name'])){
        
        $_SESSION['controller']->DBConnect_Datenhochladen($_POST['name'], $_POST['email'], $_POST['comment']);
        $_SESSION['controller']->Email_Verschicken($_POST['name'], $_POST['email'], $_POST['comment']);
    }

    


    include "view/Template.php";





?>