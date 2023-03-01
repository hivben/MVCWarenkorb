<?php
    class DBConnect{


        public $werte = array("0");

        function __construkt(){
           
  
        }

        function DatenHolen($datenbank, $tabellenname){
            $pdo = new PDO('mysql:host=localhost;dbname='.$datenbank, 'root', '');

            $sql = "select * from $tabellenname";
            $statement = $pdo->prepare($sql);
		    $statement->execute();

            $i = 0;
            while($zeile = $statement->fetch())
            {
                
                if($this->werte[0] == "0")
                    $this->werte[0] = $zeile;
                else
                    array_push($this->werte, $zeile);
                
            }

            $pdo = null;

        }
        public function DatenHochladen($datenbank, $tabellenname, $name, $email, $comment) {
            $Datum = date('Y-m-d', time());
            $pdo = new PDO('mysql:host=localhost;dbname='.$datenbank, 'root', '');

            $statement = $pdo->prepare("INSERT INTO $tabellenname (Name, Email, Kommentar, Datum) VALUES (?,?,?,?)");
            $statement->execute(array($name, $email, $comment, $Datum));

            $pdo = null;
        }


    }

?>