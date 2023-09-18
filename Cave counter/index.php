<html>

<head>
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <title>Cave Counter</title>
    <meta charset="UTF-8">
</head>

<body>
<?php
   $dbname = "cave";
   $dbuser = "root";
   $dbpass = "";
   $dbip = "localhost";

   $bdd = new PDO("mysql:host=" . $dbip . ";dbname=" . $dbname . ";charset=utf8", $dbuser, $dbpass);
   $nbr = $bdd->query('SELECT COUNT(*) AS nbr FROM bouteilles');
   $test = "test";
?>
    <h1>
        Votre Cave : 
    </h1>
    <div class="v">V 1.0</div>
    <div class="formulaire">
        <form action="suppr.php" method="post">
            <div class="suppression">
                <div class="text">
                    Enlever une bouteille de la cave
                </div>
                <input class="input_text" name="contenu" type="text" id="contenu" autocomplete="off" placeholder="Contenu de la bouteille">
                <br />
                <br />
                <div class="type">
                    <label for="type">type de boisson</label>
                    <br />
                    <select name="type" id="type">
                        <option value="">Sélectionnez le type de boisson</option>
                        <option value="rouge">vin rouge</option>
                        <option value="rosé">vin rosé</option>
                        <option value="blanc">vin blanc</option>
                        <option value="champagne">champagne</option>
                        <option value="autres">autres</option>
                    </select>
                    <br />
                    <br />
                </div>
                <input class="input_text" name="nbr" type="text" id="nbr" autocomplete="off" placeholder="Le nombre de bouteilles">
                <br />
                <button class="btn" type="submit">Valider</button>
            </div>
        </form>
    </div>
    <div class="nbr">
        <div class="text">
            Le nombre de bouteilles dans la cave est : 
            <?php 
                $listage = $bdd->query('SELECT contenu, COUNT(*) AS nombre_bouteilles FROM bouteilles GROUP BY contenu');
                $total = 0;

                while ($list = $listage->fetch()) {
                    echo "<br>";
                    echo htmlspecialchars($list['contenu']) . " - " . $list['nombre_bouteilles'] . " bouteille(s)";
                    echo "<br>";
                    echo "------";
                }
            ?>
        </div>
    </div>
    <div class="formulaire">
        <form action="ajout.php" method="post">
            <div class="ajout">
                <div class="text">
                    Ajouter une bouteille à la cave
                </div>
                <input class="input_text" name="contenu" type="text" id="contenu" autocomplete="off" placeholder="Contenu de la bouteille">
                <br />
                <br />
                <div class="type">
                    <label for="type">type de boisson</label>
                    <br />
                    <select name="type" id="type">
                        <option value="">Sélectionnez le type de boisson</option>
                        <option value="rouge">vin rouge</option>
                        <option value="rosé">vin rosé</option>
                        <option value="blanc">vin blanc</option>
                        <option value="champagne">champagne</option>
                        <option value="autres">autres</option>
                    </select>
                    <br />
                </div>
                <br /> 
                <input class="input_text" name="nbr" type="text" id="nbr" autocomplete="off" placeholder="Le nombre de bouteilles">
                <br />
                <button class="btn" type="submit">Valider</button>
            </div>
        </form>
    </div>
</body>

</html>
