<?php

?>

<DOCTYPE Html>
<body>
    <form action="doLivre.php" method="post">
        <label for="ref">référence</label><input type="text" name="ref">
        <div>
            <input type="radio" name="lang" value="fr"checked>
            <label for="lang">Français</label>
        </div>
        <div>
            <input type="radio" name="lang" value="en"checked>
            <label for="lang">English</label>
        </div>
        <select name="color">
            <option value="nuit">Nuit</option>
            <option value="normal">Normal</option>
            <option value="contraste">Contraste</option>
        </select>
        <div>
            <input type="checkbox" name="CGV" checked>
            <label for="CGV">J'accepte les CGV</label>
        </div>
        <input type="submit" value='OK'>
    </form>
    
<body>