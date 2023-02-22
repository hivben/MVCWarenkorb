<html>
    <head>
        <!-- Beachte: Da dieses Template in die index.php integriert wird (include), muss der Pfad zur css-Datei vom Ort der index.php aus angeführt werden. Der Pfad auf warenkorbTemplate.php würde nämlich "../css/styles.css" lauten -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <div class="box">
            <?php $_SESSION['controller']->Ueberschrift(1, "Wähle deine Produkte") ?>
            <form action="index.php" method="post" name="formProduktwahl">
                <select style="height: 2rem;" name="produktWahl">
                    <!-- Hiermit wird die ComboBox mit Werten befüllt -->
                    <?php $_SESSION['controller']->ComboBoxFuellen($_SESSION['dbLeser']->werte) ?>
                </select>
            </form>
                

                <!-- Das ist absichtlich nicht mit dem Controller realisiert, weil das ein statischer Aufbau ist. -->
                <div>
                    <!-- Anmerkung: Wir haben immer mit einem Submit-Button gearbeitet. Hier greife ich per Javascript auf das Formular zu. Das war natürlich nicht verlangt. -->
                    <a href="javascript:document.formProduktwahl.submit();" class="button">In den Warenkorb</a>
                    <a href="?kauf=true" class="button">Kaufen</a>
                    <a href="#" class="button">Summe</a>
                    <a href="#" class="button">Produkt entfernen</a>
                    <a href="#" class="button">Alle Bestellungen</a>
                </div>
            
            <div id="warenkorb">
                <p>
                    <?php
                        $_SESSION['controller']->WarenkorbAusgeben();
                        $_SESSION['controller']->Kaufen();
                    ?>
                </p>
            </div>
        </div>

    </body>
</html>