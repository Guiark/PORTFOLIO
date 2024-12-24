<?php 
$data = yaml_parse_file('Data/Accueil.yaml');
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
