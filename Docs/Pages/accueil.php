<?php

require_once("yaml/yaml.php");
$data=yaml_parse_file('Data/accueil.yaml');

echo "<h1>".$data["titre"]."</h1>\n";

echo "<h2>Sommaire</h2>\n";
foreach($data["sommaire"]AS $unsommaire){
    echo "<p>".ucfirst($unsommaire["accueil"]).":".$unsommaire["Compétences"]."".$unsommaire["Réalisations"]."</p>\n";
}






























?>