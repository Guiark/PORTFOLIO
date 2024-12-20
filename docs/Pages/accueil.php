<?php 
$data = yaml_parse_file('Data\Accueil.yaml');
?>

<section id="accueil">
    <h2><?php echo $data['titre']; ?></h2>
    <p><strong>Nom : </strong><?php echo $data['nom']; ?></p>
    <p><strong>Prénom : </strong><?php echo $data['prenom']; ?></p>
    <p><?php echo $data['description']; ?></p>
    <p><img src="<?php echo $data['image']; ?>" alt="Illustration"></p>
</section>