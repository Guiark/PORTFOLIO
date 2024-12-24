<?php
use Symfony\Component\Yaml\Yaml;
// Simulation du contenu YAML sous forme de tableau PHP
$realisations = [
    [
        'titre' => 'Bloc 1 Slam',
        'description' => 'Travaille sur différent TD',
        'illustration' => 'https://guiark.github.io/Bloc1/',
        'documents' => [
            [
                'type' => 'Calculatrice',
                'description' => 'Calculatrice faite en JS',
                'lien' => 'https://guiark.github.io/Bloc1/pages/TD4/Calculatrice.html'
            ],
            [
                'type' => 'Capture d\'écran',
                'description' => 'Mon code en Java Script',
                'lien' => 'https://github.com/Guiark/Bloc1/blob/main/docs/js/TD4/calculatrice.js'
            ]
        ]
    ]
];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réalisation - Bloc 1 Slam</title>
    <style>
        /* Styles pour les liens */
        .responsive-link {
            display: inline-block;
            word-wrap: break-word; /* Coupe les liens longs */
            overflow-wrap: break-word; /* Support moderne pour couper les mots longs */
            color: #0078D7; /* Couleur bleue pour les liens */
            text-decoration: none; /* Supprime le soulignement */
            margin: 5px 0; /* Espacement entre les liens */
        }

        .responsive-link:hover {
            text-decoration: underline; /* Soulignement au survol */
        }

        /* Ajustement pour les petits écrans */
        @media (max-width: 768px) {
            .responsive-link {
                font-size: 14px; /* Réduit la taille des liens */
            }
        }
    </style>
</head>
<body>

<?php
// Affichage des réalisations
foreach ($realisations as $realisation) {
    echo "<h1>Réalisation : " . htmlspecialchars($realisation['titre']) . "</h1>";
    echo "<p><strong>Description :</strong> " . htmlspecialchars($realisation['description']) . "</p>";
    echo "<p><strong>Illustration :</strong> <a href='" . htmlspecialchars($realisation['illustration']) . "' target='_blank' class='responsive-link'>Voir l'illustration</a></p>";

    echo "<h2>Documents associés</h2>";
    echo "<ul>";

    // Affichage des documents associés
    foreach ($realisation['documents'] as $document) {
        echo "<li><strong>" . htmlspecialchars($document['type']) . "</strong><br>";
        echo "<strong>Description :</strong> " . htmlspecialchars($document['description']) . "<br>";
        echo "<a href='" . htmlspecialchars($document['lien']) . "' target='_blank' class='responsive-link'>" . htmlspecialchars($document['lien']) . "</a></li>";
    }

    echo "</ul>";
}
?>
<hr/>
</body>
</html>
