<?php
use Symfony\Component\Yaml\Yaml;
// Charger le fichier YAML
$data = yaml_parse_file('Data\Competences.yaml');

// Fonction pour obtenir la valeur du niveau en pourcentage
function niveauToPercentage($niveau) {
    switch($niveau) {
        case 'Nouveau':
            return 10;
        case 'Intermédiaire':
            return 50;
        default:
            return 0;
    }
}

function afficherBarreProgression($categorie, $niveau) {
    $percentage = niveauToPercentage($niveau);
    echo "<div><strong>$categorie :</strong></div>";
    echo "<div style='width: 100%; background-color:rgb(221, 96, 96); border-radius: 10px;'>";
    echo "<div style='height: 20px; width: $percentage%; background-color:rgb(2, 71, 128); border-radius: 10px;'></div>";
    echo "</div>";
    echo "<p>$niveau - $percentage% de progression</p><br>";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barre de Progression par Catégorie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .category {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>État des Compétences</h1>
    
    <?php
    // Affichage des barres de progression pour chaque catégorie
    foreach ($data as $categorie => $technologies) {
        echo "<div class='category'>";
        echo "<h2>" . ucfirst($categorie) . "</h2>";
        foreach ($technologies as $technologie => $details) {
            afficherBarreProgression($technologie, $details['niveau']);
        }
        echo "</div>";
    }
    ?>
<hr/>
</body>
</html>
