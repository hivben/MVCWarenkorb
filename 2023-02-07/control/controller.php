<?php
    class Controller{

        function __construct(){

        }

        function DBConnect_DatenEinlesen(){
            if(!isset($_SESSION['dbLeser'])){
                $_SESSION['dbLeser'] = new DBConnect();
                $_SESSION['dbLeser']->DatenHolen("onlineshop", "produkte");
                //echo $_SESSION['dbLeser']->werte[0][2];
            }
        }

        function Ueberschrift($rang, $ueberschrift){
                    echo "<h".$rang." class='ueberschrift'>".$ueberschrift."</h".$rang.">";
        }

        //Funktion erwartet sich idealerweise ein Array von Werten
        //in unserem Beispiel arbeiten wir mit einem mehrdimensionalen Array. Wir könnten hier aber auch eine zweite Funktion schreiben, die eindimensionael Arrays verarbeitet.
        //Die Wert werden aus dem DBConnect-Objekt bezogen --> $_SESSION[dbLeser]->werte
        function ComboBoxFuellen($werte){
            for($i = 0; $i < count($werte); $i++)
            {
                //Wir geben den Namen des Produkts aus. Als Value speichern wir die Nummer der Produktgruppe.
                //Wir setzen hier zusätzlich eine Wenn-Entscheidung ein (Kurzform):
                    //entspricht der Wert des Select-Feldes dem Namen des jeweiligen Optionsfeldes, so gilt dieses als selected.
                echo "<option value='".$werte[$i][0]."'>".$werte[$i][1]."</option>";
            }
        }

        function WarenkorbObjektErstellen(){
            if(!isset($_SESSION['warenkorb'])){
                $_SESSION['warenkorb'] = new Warenkorb();
            }
        }

        function InDenWarenkorb(){
            //00: Wir prüfen, ob die $_POST-Variable für "In den Warenkorb" gesetzt ist.
            if(isset($_POST['produktWahl'])){
                //01: Wir speichern die ProduktID (= dieselbe wie in der DB-Tabelle "produkte")
                $produktID = $_POST['produktWahl'];

                //02: Wir bilden aus den Daten im Array $_SESSION['dbLeser']->werte ein Produktobjekt
                $bezeichnung = $_SESSION['dbLeser']->werte[$produktID-1][1];
                $preis = $_SESSION['dbLeser']->werte[$produktID-1][2];

                $produkt = new Produkt($produktID, $bezeichnung, $preis);
                
                //Zwischenprobe: funktioniert
                //echo $produkt->ProduktID." - ".$produkt->Bezeichnung." - ".$produkt->Preis;

                //03: Der Warenkorb soll das Produkt in seine Liste aufnehmen
                $_SESSION['warenkorb']->ProduktAufnehmen($produkt);

                //Zwischenprobe: Gib immer das letzte Produkt aus
                //echo $_SESSION['warenkorb']->Produktliste[count($_SESSION['warenkorb']->Produktliste)-1]->Bezeichnung;

                //04: Wir lesen alle Produkte aus dem Warenkorb aus. Das passiert aber in einer eigenen Funktion.
            }
        }

        function WarenkorbAusgeben(){
            if($_SESSION['warenkorb']->Produktliste[0] == "0"){
                echo "Noch kein Produkt im Warenkorb";
            }
            else{
                for($i=0; $i < count($_SESSION['warenkorb']->Produktliste); $i++){
                    echo $_SESSION['warenkorb']->Produktliste[$i]->Bezeichnung." - ".$_SESSION['warenkorb']->Produktliste[$i]->Preis."<br/>";

                }
            }
        }

        function Kaufen(){
            //Wir prüfen, ob die $_GET['kauf']-Variable gesetzt ist. Wenn ja, dann erfolgt die Eintragung in die Datenbank.
            if($_SESSION['warenkorb']->Produktliste[0] == "0" || !isset($_GET['kauf'])){
            }
            else
            {
                for($i=0; $i < count($_SESSION['warenkorb']->Produktliste); $i++){
                    $_SESSION['dbLeser']->BestellartikelEintragen($_SESSION['warenkorb']->rechnungsnummer, $_SESSION['warenkorb']->Produktliste[$i]->ProduktID);
                    //$_SESSION['dbLeser']->BestellartikelEintragen($_SESSION['warenkorb']->rechnungsnummer, 1);
                }

                //Nach jedem Kauf muss die Rechnungsnummer erhöht werden.
                //Zugleich müssen wir den Warenkorb zurücksetzen
                $_SESSION['warenkorb']->Produktliste = array("0");
                $_SESSION['warenkorb']->rechnungsnummer++;

                echo "Bestellung erfolgreich.";

                
            }

            //Neue Rechnungsnummer festlegen für nächsten Kauf (ist jetzt sehr vereinfacht, weil wir mit SESSIONS arbeiten)
            //$_SESSION['warenkorb']->rechnungsnummer++;
        }















        // function ComboBoxFuellen(){
        //     for($i = 0; $i < count($_SESSION['dbLeser']->werte); $i++){
        //                 echo "<option>".$_SESSION['dbLeser']->werte[$i][1]."</option>";
        //             }
        // }
    }

?>