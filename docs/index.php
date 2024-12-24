<?php require_once __DIR__ . '/yaml.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="Style/PortFolio.css">
    <script>
        function toggleMenu() {
            const nav = document.querySelector('nav');
            nav.classList.toggle('active');
        }
    </script>
</head>

<body>
    <header>
        <h1>Mon Portfolio</h1>
        <div class="menu-burger" onclick="toggleMenu()">&#9776;</div>
        <nav>
            <a href="#accueil">Accueil</a>
            <a href="#competences">Compétences</a>
            <a href="#formation">Formation</a>
            <a href="#realisations">Réalisations</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <main>
        <section id="accueil" class="section">
            <?php include_once __DIR__ . '/Pages/accueil.php'; ?>
        </section>
        <section id="competences" class="section">
            <?php include_once __DIR__ . '/Pages/competences.php'; ?>
        </section>
        <section id="formation" class="section">
            <?php include_once __DIR__ . '/Pages/formation.php'; ?>
        </section>
        <section id="realisations" class="section">
            <?php include_once __DIR__ . '/Pages/realisation.php'; ?>
        </section>
        <section id="contact" class="section">
            <?php include_once __DIR__ . '/Pages/contact.php'; ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Portfolio Guillaume Lenormand. Tous droits réservés.</p>
    </footer>
</body>

</html>
