<?php
    class Controller{

        function __construct(){

        }

        function DBConnect_DatenEinlesen(){
            if(!isset($_SESSION['dbLeser'])){
                $_SESSION['dbLeser'] = new DBConnect();
                $_SESSION['dbLeser']->DatenHolen("gaestebuch", "gastbuch");
            }
            else{
                $_SESSION['dbLeser']->DatenHolen("gaestebuch", "gastbuch");
            }
        }

        function DBConnect_Datenhochladen($name, $email, $comment){
            if(!isset($_SESSION['dbSchreiber'])){
                $_SESSION['dbSchreiber'] = new DBConnect();
                $_SESSION['dbSchreiber']->DatenHochladen("gaestebuch", "gastbuch", $name, $email, $comment);
            }
            else{
                $_SESSION['dbSchreiber']->DatenHochladen("gaestebuch", "gastbuch", $name, $email, $comment);
            }        
        }
        function Email_Verschicken($name, $email, $comment){
            $to = $email;
            $subject = $name;
            $message = $comment;
            
            mail($to, $subject,$message);

        }



    }

?>