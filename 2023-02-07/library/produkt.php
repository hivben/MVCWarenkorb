<?php
    class Produkt
    {
        public $ProduktID;
        public $Bezeichnung;
        public $Preis;

        function __construct($ProduktID, $Bezeichnung, $Preis)
        {
            $this->ProduktID = $ProduktID;
            $this->Bezeichnung = $Bezeichnung;
            $this->Preis = $Preis;
        }

        public function Details(){
            return "wird noch gemacht";
        }
        
    }

?>