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


    }

class GuestbookModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=gaestebuch', 'root', '');
    }

    public function addGuestbookEntry($name, $email, $comment) {
        $stmt = $this->db->prepare('INSERT INTO gastbuch (Name, Email, Kommentar, Datum) VALUES (:name, :email, :comment, NOW())');
        $stmt->execute(array(':name' => $name, ':email' => $email, ':comment' => $comment));
    }

    public function getGuestbookEntries() {
        $stmt = $this->db->query('SELECT * FROM gastbuch');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>