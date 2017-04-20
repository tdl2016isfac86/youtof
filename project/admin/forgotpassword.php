<?php


require_once('../includes/config.php');
require_once('../includes/db.php');

require_once('../includes/classes/user.php');
    require_once('vendor/autoload.php');
    
//    use \Mailjet\Resources;

session_start();



// Vérifier l'existance de l'utilisateur dans la BDD
// Modifier son mot de passe avec un mot de passe aléatoire temporaire
// Envoyer l'e-mail avec le mot de passe temporaire en clair
    
if(isset($_POST['email']) && $_POST['email'] != '' ) {
    
    $mail = $_POST['email'];
    $check = user::checkMail($mail);
    $pass = user::createTmpPassword($mail);

        
    $subject='Votre mot de passe temporaire.';
    $message ="Vous avez demandé à réinitialiser votre mot de passe.\n\n"
            .'Le voici : '.$pass
            ."\n Pensez à le modifier dès votre prochaine connexion !\n\nBisous";
    $headers ='From: youtof@djyp.me';
    
    /* 
    Méthode avec la fonction mail() de PHP, bloquée un peu partout...
    $test = mail($mail,$subject,$message,$headers);
    if(!$test) {
        echo "marche pas<br>".$mail.$headers;
    }
    */
    
    /* Méthode avec l'API Mailjet
     *
    
    $mj = new \Mailjet\Client('7dc105574b684a89dc15aa4cbfaf4752', '4f7236068e8d062b265b7074f0f12cc0');
    $body = [
        'FromEmail' => "youtof@djyp.me",
        'FromName' => "Youtof Application",
        'Subject' => $subject,
        'Text-part' => $message,
        'Recipients' => [
            [
                'Email' => $mail
            ]
        ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    var_dump($response->getData());
    */
    
    /* PHPMailer */
    $m = new PHPMailer;

$m->isSMTP();                                      // Set mailer to use SMTP
$m->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$m->SMTPAuth = true;                               // Enable SMTP authentication
$m->Username = 'artmwebmaster@gmail.com';                 // SMTP username
$m->Password = 'azerty012345678912';                           // SMTP password
$m->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$m->Port = 587;                                    // TCP port to connect to

$m->setFrom('youtof@djyp.me', 'Youtof Application');
$m->addAddress($mail, 'Joe User');     // Add a recipient

$m->Subject = $subject;
$m->Body    = $message;

if(!$m->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $m->ErrorInfo;
} else {
    echo 'Message has been sent';
}    
    echo 'Un mot de passe temporaire vous a &eacute;t&eacute; envoy&eacute; &agrave; l\'adresse indiqu&eacute;e.';
}

?>

<form action="forgotpassword.php" method="post">
    <input type="text" name="email" placeholder="Entrez votre E-mail">
    <input type="submit" value="Valider">
</form>
