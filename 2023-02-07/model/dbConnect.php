<?php
    class DBConnect{

        //Anmerkung: Leere Arrays in PHP schaffen beim Programmieren Probleme.
        //Daher geben wir hier jedem Array einen Eintrag
        
        public $werte = array("0");

        function __construkt(){
            //Dieser Konstruktor erhält keine Werte ... im Prinzip müssten wir diesen nicht anlegen ... nur zur Vollständigkeit.
            
            

        }

        function DatenHolen($datenbank, $tabellenname){
            $pdo = new PDO('mysql:host=localhost;dbname='.$datenbank, 'root', '');

            $sql = "select * from $tabellenname";
            $statement = $pdo->prepare($sql);
		    $statement->execute();

            $i = 0;
            while($zeile = $statement->fetch())
            {
                //array_push funktioniert erst, wenn zumindest 1 Feld mit einem Wert belegt wurde (siehe Konstrutor)
                //$zeile ist ein eigenes Array!! Daher erzeugen wir hier ein mehrdimensionales Array.
                //Wenn ich das nicht will, müsse ich mit "$zeile[0]" oder "$zeile['Bezeichnung'] arbeiten. 
                if($this->werte[0] == "0")
                    $this->werte[0] = $zeile;
                else
                    array_push($this->werte, $zeile);
                
            }

            //Wichtig fürs Verständnis: Wenn wir hier auf $werte zugreifen würden, würden wir ein NEUES, lokales Array mit demselben Namen erzeugen. Nur mit "$this" weiß PHP, dass wir auf das Klassenarray zugreifen wollen!
            //Das gilt natürlich auch für den Aufruf von $werte im Konstruktor ... es würde immer eine lokale Variable bzw. ein lokales Array erzeugt werden. Weil in PHP ja kein Datentyp angegeben wird glaubt PHP, es ist etwas Neues deklariert..

            $pdo = null;

        }

        //Anmerkung: Diese Funktion ist schlecht auf andere Anwendungen übertragbar, weil zu statisch
        function BestellartikelEintragen($rechnungsnummer, $produktID){
            $pdo = new PDO('mysql:host=localhost;dbname=onlineshop', 'root', '');

            //$statement = $pdo->prepare("Show fields from ".$tabellenname);
		    //$statement->execute();

            //Wir speichern die Spaltenbezeichnungen in einem Array namesn "spalten"
            //$spalten = $statement->fetch();
            
            $statement = $pdo->prepare("Insert into bestellungen(Rechnungsnummer, ProduktID) values(?, ?)");
		    $statement->execute(array($rechnungsnummer, $produktID));

            $pdo = null;
        }
    }
?>