<?php
if(empty($_POST['name']) || empty($_POST['telefono']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$telefono = strip_tags(htmlspecialchars($_POST['telefono']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "ferfit16@gmail.com"; // Change this email to your //
$subject = "Nuevo mensaje - Formulario landingpage";
$body = "Tienes un nuevo mensaje desde el formulario de contacto de tu landingpage. Estos son los datos:\n\n"."
Nombre: $name\n\n\n
Email: $email\n\n
Teléfono: $telefono\n\n
Mensaje: $message";

$header = "From: $email";
//$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
