<?php
    //include "model/datenbankverbindung.php";

    //Variante 1: Die Daten werden aus der DB ausgelesen und direkt in die ComboBox eingetragen
    //Variante 2: Wir erstellen gleich Produkt-Objekte und erstellen damit die ComboBox-Inhalte.

    include "model/DBConnect.php";
    include "library/produkt.php"; //Wir nehmen zuerst das Produkt auf, weil im Warenkorb Produkte erstellt werden.
    include "library/warenkorb.php";
    include "control/controller.php";
    session_start();

    //Anmerkung: In unserem Beispiel ist die Controller-Klasse die index.php. 

    //Controller-Objekt erzeugen. Das brauchen wir über die gesamte Zeit
    if(!isset($_SESSION['controller'])){
        $_SESSION['controller'] = new Controller();
    }

    //Controller-Aufforderung an Model-Klasse "DBConnect": Produktdaten einlesen
    $_SESSION['controller']->DBConnect_DatenEinlesen();

    //Controller-Aufforderung an Lib-Klasse, ein Warenkorb-Objekt zu erstellen. Dieses steuert unseren Einkauf.
    $_SESSION['controller']->WarenkorbObjektErstellen();

    //Controller: Prüfe, ob $_GET['warenkorb'] gesetzt ist. Wenn ja, dann rufe "ProduktAufnehmen()" von "$_SESSION['warenkorb]" auf.
    //Der Controller steuer also, wann was ausgeführt wird, was man an diesem Beispiel sehr deutlich sieht.
    $_SESSION['controller']->InDenWarenkorb();
    



    //Warenkorb-Template laden
    include "view/warenkorbTemplate.php";

    
    
    //Dieser Code wurde im warenkorbTemplate integriert. Dabei ruft der Controller das DBConnect-Objektnamens "dbAusleser" auf. Über eine eigene Funktion veranlasst der Controller die Ausgabe der Werte.
    // echo "<select>";
    //     for($i = 0; $i < count($_SESSION['dbLeser']->werte); $i++){
    //         echo "<option>".$_SESSION['dbLeser']->werte[$i][1]."</option>";
    //         // echo "<option>".$i."</option>";
    //     }
    // echo "</select>";







?>