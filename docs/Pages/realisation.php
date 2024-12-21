

<?php 
$data = yaml_parse_file('Data\Realisations.yaml');
?>

<section id="realisations">
    <h1> Mes réalisations</h1>
    <?php 
        foreach( $data['realisations'] as $realisation) {
             foreach( $realisation['documents'] as $document) {
                echo "<embed src=\"".$document['lien']."\" width=\"240\" height=\"500\" /> ";
             }
        }
    ?>  


<hr/>
</section>


