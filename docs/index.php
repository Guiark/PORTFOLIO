<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Portfolio</title>
    <link rel="stylesheet" href="Style/PortFolio.css">
</head>

<body>
    <?php
require_once("YAML/yaml.php");
?>

    <header>
        <h1>Mon Portfolio</h1>

        <nav>
            <a href="#accueil">Accueil</a>
            <a href="#competences">Compétences</a>
            <a href="#formation">Formation</a>
            <a href="#realisations">Réalisations</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>
    <div id="accueil" class="section">
        <?php
            include_once('Pages/accueil.php') 
        ?>
    </div>
    <div id="competences" class="section">
    <?php
            include_once('Pages/competences.php') 
        ?>
    </div>
    <div id="formation" class="section">
    <?php
            include_once('Pages/formation.php') 
        ?>
    </div>
    <div id="realisations" class="section">
    <?php
            include_once('Pages/realisation.php') 
        ?>
    </div>
    <div id="contact" class="section">
        Contact
    </div>


    <?php print("<p>GUIGUI EST NUL SUR ALBION</p>") ?>










</body>

</html>