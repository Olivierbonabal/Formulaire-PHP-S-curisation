<<?php
session_start();
$errors = [];
$_SESSION['errors'] = $errors;

$returnMessage = "Merci " . $_POST['user_firstname'] . " " . $_POST['user_name'] . " de nous avoir contacté à propos de \"" . $_POST['reasonCall'] . "\".";
$returnMessage = "Un de nos conseiller vous contactera soit à l'adresse e-mail " . $_POST['user_mail'] . " ou par téléphone au " . $_POST['user_phone'] . " dans les plus brefs délais pour traiter votre demande :";
$returnMessage = $_POST['user_message'];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($_POST["user_mail"])) {
    $_SESSION["errors"]["emailErr"] = "Demande Email";
    header("Location: form.php");
} else {
    $email = test_input($_POST["user_mail"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"]["emailErr"] = "Format e-mail Invalide";
        header("Location: form.php");
    } else {
        echo $returnMessage;
    }
}
