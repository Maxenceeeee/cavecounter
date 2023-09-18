<html>

<head>
    <link rel="stylesheet" media="all" type="text/css" href="index.css">
    <title>Cave Counter</title>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6"> -->

</head>

<body>
    <?php
    $contenu = $_REQUEST['contenu'];
    $nbr = $_REQUEST['nbr'];
   
    $dbname = "cave";
    $dbuser = "root";
    $dbpass = "";
    $dbip = "localhost";

    $bdd = new PDO("mysql:host=" . $dbip . ";dbname=" . $dbname . ";charset=utf8", $dbuser, $dbpass);
    for ($i = 1; $i <= $nbr; $i++) {
        $ajout = $bdd->query('INSERT INTO bouteilles (contenu) VALUES ("' . $contenu . '")');
    }

    
    header('Location: index.php');
    ?>
    
</body>

</html>