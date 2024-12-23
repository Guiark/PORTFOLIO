<?php 
$data = yaml_parse_file('Data\Accueil.yaml');
?>

<section id="accueil">
    <h2><?php echo htmlspecialchars($data['titre']); ?></h2>
    <p><?php echo htmlspecialchars($data['nom']); ?></p>
    <p><?php echo htmlspecialchars($data['prenom']); ?></p>
    <p><?php echo htmlspecialchars($data['description']); ?></p>
    <p>
        <img src="<?php echo htmlspecialchars($data['image']); ?>" alt="Illustration" class="responsive-img">
    </p>
</section>
<hr/>
<style>
/* Style de base pour l'image responsive */
.responsive-img {
    max-width: 100%; /* L'image ne dépasse pas la largeur du conteneur */
    height: auto; /* Garde les proportions d'origine */
    display: block; /* Évite les espaces indésirables sous l'image */
    margin: 0 auto; /* Centre l'image dans le conteneur */
}

/* Pour une meilleure adaptation sur les petits écrans */
@media (max-width: 768px) {
    .responsive-img {
        max-width: 90%; /* Ajustement pour petits écrans */
    }
}
</style>