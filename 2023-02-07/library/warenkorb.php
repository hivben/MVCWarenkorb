<?php
    class Warenkorb
    {
        static $id;
        public $ID;
        public $Bezeichnung;
        public $Produktliste = array("0");
        public $rechnungsnummer = 1;
        

        function __construct()
        {
            self::$id++;
            $this->ID = self::$id;
            $this->Bezeichnung = "warenkorb-".$this->ID;
        }

        public function ProduktAufnehmen($produkt){
            //Zur Wiederholung: Da das "Pushen" nur funktioniert, wenn ein Wert vorhanden ist, fügen wir diesen von Start weg ein (siehe DBConnect.php).
            if($this->Produktliste[0] == "0")
                    $this->Produktliste[0] = $produkt;
                else
                    array_push($this->Produktliste, $produkt);
        }

        public function ProduktdatenAusgeben(){
            // if($this->Produktliste[0] == "0")
            //     echo "Noch keine Produkte im Warenkorb";
            // else{
            //     $produktdaten = $this->Produktliste[0]->Bezeichnung;
            //     for($i=0; $i < count($this->Produktliste); $i++){
                    
            //     }
            // }
            echo count($this->Produktliste);
            // $produktdaten = "";
            // if($this->Produktliste[0] == "0")
            //     return $produktdaten;
            // else{
            //     for($i=0; $i < count($this->Produktliste); $i++){
            //         $produktdaten .= $this->Produktliste[$i]->Bezeichnung." - ".$this->Produktliste[$i][2]."<br/>";
            //     }
            //     return $produktdaten;
            // }
        }

        public function ProduktEntfernen(){
            return "wird noch gemacht";
        }

        public function Summe(){
            return "wird noch gemacht";
        }

        public function Kaufen(){
            return "wird noch gemacht";
        }

        public function Inhalte(){
            return "wird noch gemacht";
        }
        
    }

?>