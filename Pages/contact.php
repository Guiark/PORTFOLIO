<?php

// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Charger et parser le fichier YAML
$data = file_get_contents('Data/Contact.yaml');


// Fonction pour envoyer un e-mail
function envoyer_email($destinataire, $sujet, $message, $headers) {
    return mail($destinataire, $sujet, $message, $headers);
}

// Valider les champs du formulaire
function valider_formulaire($data, $form_fields) {
    $errors = [];
    foreach ($form_fields as $field) {
        $field_name = $field['champ']['nom'];
        $obligatoire = $field['champ']['obligatoire'];
        $type = $field['champ']['type'];

        // Vérification des champs obligatoires
        if ($obligatoire && empty($data[$field_name])) {
            $errors[] = "Le champ '$field_name' est obligatoire.";
        }

        // Vérification du type (email par exemple)
        if ($type == 'email' && !filter_var($data[$field_name], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse e-mail '$field_name' est invalide.";
        }
    }
    return $errors;
}

// Vérifier le captcha avec Google reCAPTCHA
function verifier_recaptcha($captcha_response) {
    $secret_key = '6LetEKQqAAAAAGP8aKSSlti4sHGOiz9pmWzcn8n5'; // Ta clé secrète reCAPTCHA
    $remote_ip = $_SERVER['REMOTE_ADDR'];

    // Construire l'URL de vérification
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secret_key,
        'response' => $captcha_response,
        'remoteip' => $remote_ip
    ];

    // Faire la requête POST à Google
    $options = [
        'http' => [
            'method' => 'POST',
            'content' => http_build_query($data),
            'header' => "Content-type: application/x-www-form-urlencoded\r\n"
        ]
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    // Décoder la réponse JSON
    $result = json_decode($response);
    var_dump($result); // Vérifier la réponse de reCAPTCHA
    return $result->success;
}

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $data = [
        'Nom de l\'expéditeur' => $_POST['nom'],
        'Adresse de courriel de l\'expéditeur' => $_POST['email'],
        'Objet du message' => $_POST['objet'],
        'Contenu du message' => $_POST['message'],
        'Captcha' => $_POST['g-recaptcha-response'] // Captcha response venant de Google
    ];
    var_dump($_POST['g-recaptcha-response']);
    // Vérifier si le captcha est valide
    if (!verifier_recaptcha($data['Captcha'])) {
        echo "<p style='color: red;'>La vérification du captcha a échoué. Veuillez réessayer.</p>";
    } else {
        // Valider les champs
        $errors = valider_formulaire($data, $form_data['contact']['formulaire']);
        var_dump($errors); // Vérifier si des erreurs de validation apparaissent

        if (empty($errors)) {
            echo "Formulaire valide, message envoyé.";
        } else {
            // Afficher les erreurs
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }
}

?>

<!-- Formulaire HTML -->
<form method="POST" action="">
    <label for="nom">Nom de l'expéditeur</label>
    <input type="text" name="nom" id="nom" required placeholder="Entrez votre nom complet">

    <label for="email">Adresse de courriel de l'expéditeur</label>
    <input type="email" name="email" id="email" required placeholder="exemple@domaine.com">

    <label for="objet">Objet du message</label>
    <input type="text" name="objet" id="objet" required placeholder="Indiquez l'objet de votre message">

    <label for="message">Contenu du message</label>
    <textarea name="message" id="message" required placeholder="Écrivez ici votre message..."></textarea>

    <!-- Ajouter le widget reCAPTCHA -->
    <div class="g-recaptcha" data-sitekey="6LetEKQqAAAAAGP8aKSSlti4sHGOiz9pmWzcn8n5"></div>

    <input type="submit" value="Envoyer">
</form>

<!-- Charger le script reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
