<?php
// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Vérification des champs obligatoires
    if (empty($_POST['nom'])) {
        $errors[] = 'Le nom est obligatoire.';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'L\'adresse e-mail est obligatoire et doit être valide.';
    }
    if (empty($_POST['objet'])) {
        $errors[] = 'L\'objet est obligatoire.';
    }
    if (empty($_POST['message'])) {
        $errors[] = 'Le message est obligatoire.';
    }
    
    // Vérification du captcha reCAPTCHA
    $recaptchaSecret = '6LdxUKQqAAAAALDfYBYkqL8UT9_IutVePEg8JM6O';
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaVerification = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $recaptchaData = json_decode($recaptchaVerification);

    if (!$recaptchaData->success) {
        $errors[] = 'La vérification CAPTCHA a échoué. Veuillez réessayer.';
    }

    // Si aucune erreur, envoyer l'email
    if (empty($errors)) {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $objet = htmlspecialchars($_POST['objet']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $to = 'guillaume.lenormand@sts-sio-caen.info';
        $subject = 'Nouveau message via le formulaire de contact';
        $body = "
        Vous avez reçu un nouveau message depuis le formulaire de contact :
        
        - **Nom**: $nom
        - **E-mail**: $email
        - **Objet**: $objet
        - **Message**: 
        $message
        
        Veuillez ne pas répondre à cet e-mail, il a été généré automatiquement.
        ";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: $email\r\n";

        mail($to, $subject, $body, $headers);

        // Envoi de la confirmation à l'utilisateur
        if (isset($_POST['envoyer_confirmation_utilisateur']) && $_POST['envoyer_confirmation_utilisateur'] == '1') {
            $confirmationMessage = "
            Bonjour $nom,
            
            Nous avons bien reçu votre message. Nous vous répondrons dans les plus brefs délais.
            
            Merci de nous avoir contactés !
            ";
            mail($email, "Confirmation de réception", $confirmationMessage, $headers);
        }

        echo 'Message envoyé avec succès.';
    } else {
        echo 'Erreur(s) :<br>';
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
    }
    
}

?>

<form method="POST" action="">
    <label for="nom">Nom de l'expéditeur:</label>
    <input type="text" name="nom" id="nom" placeholder="Entrez votre nom complet" required><br>

    <label for="email">Adresse de courriel de l'expéditeur:</label>
    <input type="email" name="email" id="email" placeholder="exemple@domaine.com" required><br>

    <label for="objet">Objet du message:</label>
    <input type="text" name="objet" id="objet" placeholder="Indiquez l'objet de votre message" required><br>

    <label for="message">Contenu du message:</label>
    <textarea name="message" id="message" placeholder="Écrivez ici votre message..." required></textarea><br>

    <label for="rgpd">
        <input type="checkbox" name="rgpd" id="rgpd" required>
        Conformément au Règlement Général sur la Protection des Données (RGPD), les informations renseignées dans ce formulaire ne seront utilisées qu'à des fins de contact.
    </label><br>

    <div class="g-recaptcha" data-sitekey="6LdxUKQqAAAAAFzwBz3MaPfO19h2Kz41XTpxk75y"></div><br>

    <input type="hidden" name="envoyer_confirmation_utilisateur" value="1"> <!-- Option d'envoyer confirmation à l'utilisateur -->
    
    <button type="submit">Envoyer</button>
</form>

<!-- Inclusion du script reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
