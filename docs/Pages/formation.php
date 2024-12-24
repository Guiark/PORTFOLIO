<?php 

$data = yaml_parse_file('Data\Formation.yaml');
?>

<section id="formation">
    <h1>Mes formations </h1>
    <?php 
        foreach( $data['formation'] as $formation) {
            echo "<h1>".$formation['diplome']."</h1>";
            echo "<h6>".$formation['etablissement']."</h6>";
            echo "<h6>".$formation['lieu']."</h6>";
            echo "<h6>".$formation['annee_debut']."</h6>";
            echo "<h6>".$formation['annee_fin']."</h6>";
            echo "<h6>".$formation['description']."</h6>";
            if (isset($formation['cours_principaux']) && is_array($formation['cours_principaux'])) {
                echo "<h6>" . implode(", ", $formation['cours_principaux']) . "</h6>";
            }
            $url = $formation['illustration'];
            echo "<img src=\"".$url."\"/>";
        }
    ?>

    <div class="cv-link">
        <!-- Lien pour télécharger le CV -->
        <a href="./Images/Formation/CV.pdf" download="CV.pdf" class="cv-button">Télécharger mon CV</a>
    </div>

    <hr/>
</section>
