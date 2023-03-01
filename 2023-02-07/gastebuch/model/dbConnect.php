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
            echo "<table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Kommentar</th>
            </tr>";
            
            while ($zeile = $statement->fetch()) {
                echo "<tr>
                <th>".$zeile[1]."</th>
                <th>".$zeile[2]."</th>
                <th>".$zeile[3]."</th>
                </tr>";
            }
            echo "</tabel>";

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