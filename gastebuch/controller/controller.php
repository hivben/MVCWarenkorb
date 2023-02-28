<?php
    class Controller{

        function __construct(){

        }

        function DBConnect_DatenEinlesen(){
            if(!isset($_SESSION['dbLeser'])){
                $_SESSION['dbLeser'] = new DBConnect();
                $_SESSION['dbLeser']->DatenHolen("gaestebuch", "gastbuch");
            }
        }



    }

?>