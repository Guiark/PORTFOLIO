<?php

require_once("yaml/yaml.php");
$data=yaml_parse_file('Data/accueil.yaml');

echo "<h1>".$data["titre"]."</h1>\n";

echo "<h2>Sommaire</h2>\n";
foreach($data["sommaire"]AS $unsommaire){
    echo "<p>".ucfirst($unsommaire["accueil"]).":".$unsommaire["Compétences"]."".$unsommaire["Réalisations"]."</p>\n";
}

echo "<h3>Accueil</h3>\n";
foreach($data["accueil"]As $accueil){
    echo"<p>".ucfirst($accueil["nom et prénom"]).":".$Accroche["accroche"].":".$Accroche["paragraphe de présentation"].":".$Accroche["photo d'illustration"]."</p>\n";
}

echo "<h3>Compétences</h3>\n";
foreach($data["compétences"]As $compétences){
    echo"<p>".ucfirst($compétences["développement"]).":".$compétences["html"].":".$Accroche["Niveau html"].":".$Accroche["css"].":".$compétences["Niveau css"].":".$compétences["php"].":".$Accroche["Niveau php"].":".$Accroche["sql"].":".$Accroche["Niveau sql"]."</p>\n";
    echo"<p>".ucfirst($compétences["bureautique"]).":".$compétences["Excel"].":".$Accroche["Niveau excel"].":".$Accroche["power point"].":".$compétences["word"].":".$compétences["niveau word"]."</p>\n";
}

echo "<h3>Réalisation</h3>\n";
foreach($data["réalisation"]As $réalisation){
    echo"<p>".ucfirst($réalisation["Slam"]).":".$Accroche["description slam"].":".$Accroche["illustration slam"]."</p>\n";
}

























?>