<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <h1>Gästebuch</h1>

        <h2>Neuen Eintrag hinzufügen</h2>
        
        <form action="index.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">E-Mail:</label>
            <input type="email" name="email" id="email" required>

            <label for="comment">Kommentar:</label>
            <textarea name="comment" id="comment" required></textarea>

            <input type="submit" value="Eintrag absenden">
        </form>

        <h2>Alle Einträge</h2>
        

    </body>
</html>