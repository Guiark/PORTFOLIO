<?php 
$data = yaml_parse_file('Data\Formation.yaml');
?>

<section id="formation">

<h1>Mes formations </h1>
    <?php 
        foreach( $data['formation'] as $formation) {
            echo "<h1>".$formation['diplome']."</h1>";
            echo "<h6>".$formation['etablissement']."</h6>";
            $url = $formation['illustration'];
            echo "<img src=\"".$url."\"/>";



        }
    ?>  


<hr/>
</section>




