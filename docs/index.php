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
require_once("yaml/yaml.php");
?>

<header>
    <h1>Portfolio</h1>
    <nav>
        <a href="#accueil">Accueil</a>
        <a href="#competences">Compétences</a>
        <a href="#formation">Formation</a>
        <a href="#realisations">Réalisations</a>
        <a href="#contact">Contact</a>
    </nav>
</header>


<?php include 'PHP/accueil.php'; ?>
<?php include 'PHP/competences.php'; ?>
<?php include 'PHP/formation.php'; ?>
<?php include 'PHP/realisation.php'; ?>
<?php include 'PHP/contact.php'; ?>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Mon Portfolio</p>
</footer>

</body>
</html>