<?php
$data = yaml_parse_file('Data/Competences.yaml') ?? [];

// Fonction pour obtenir la valeur du niveau en pourcentage
function niveauToPercentage($niveau) {
    switch($niveau) {
        case 'Nouveau': return 10;
        case 'Intermédiaire': return 50;
        default: return 0;
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

<section id="competences">
    <h1>État des Compétences</h1>
    <?php
    foreach ($data as $categorie => $technologies) {
        echo "<div class='category'>";
        echo "<h2>" . ucfirst($categorie) . "</h2>";
        foreach ($technologies as $technologie => $details) {
            afficherBarreProgression($technologie, $details['niveau']);
        }
        echo "</div>";
    }
    ?>
</section>
<hr/>
