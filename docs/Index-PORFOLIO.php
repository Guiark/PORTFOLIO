<?php

require_once("../yaml/yaml.php");
$data = yaml_parse_file("../Data/Accueil.yaml");


echo "<h1>".$data["titre"]."</h1>\n";
    echo "<h1>".$data["nom"]."</h1>\n";
    echo "<h1>".$data["prenom"]."</h1>\n";
    echo "<h1>".$data["accroche"]."</h1>\n";
    echo "<h1>".$data["presentation"]."</h1>\n";
    echo "<h1>".$data["photo"]."</h1>\n";


