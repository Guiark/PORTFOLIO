<?php

<<<<<<< HEAD
#require_once '../Docs/Pages/accueil.php'; // On inclut le fichier de configuration (uniquement 1 fois)
#include '../Docs/Pages/accueil.php';      // On inclut l'en-tête HTML
#include 'menu.php';        // On inclut un menu de navigation

echo "je teste un truc laisse moi";

#include 'footer.php';      // On inclut le pied de page
=======
require_once("../yaml/yaml.php");
$data = yaml_parse_file("../Data/Accueil.yaml");


echo "<h1>".$data["titre"]."</h1>\n";
    echo "<h1>".$data["nom"]."</h1>\n";
    echo "<h1>".$data["prenom"]."</h1>\n";
    echo "<h1>".$data["accroche"]."</h1>\n";
    echo "<h1>".$data["presentation"]."</h1>\n";
    echo "<h1>".$data["photo"]."</h1>\n";
>>>>>>> 147535a68a85fc7f7e282620fcd9ca7af1b0f106


