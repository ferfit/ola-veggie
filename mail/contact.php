<?php

function strClean($strCadena){
  $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
  $string = trim($string); //Elimina espacios en blanco al inicio y al final
  $string = stripslashes($string); // Elimina las \ invertidas
  $string = str_replace("<script>","",$string);
  $string = str_replace("</script>","",$string);
  $string = str_replace("<script src>","",$string);
  $string = str_replace("<script type=>","",$string);
  $string = str_replace("SELECT * FROM","",$string);
  $string = str_replace("DELETE FROM","",$string);
  $string = str_replace("INSERT INTO","",$string);
  $string = str_replace("SELECT COUNT(*) FROM","",$string);
  $string = str_replace("DROP TABLE","",$string);
  $string = str_replace("OR '1'='1","",$string);
  $string = str_replace('OR "1"="1"',"",$string);
  $string = str_replace('OR ´1´=´1´',"",$string);
  $string = str_replace("is NULL; --","",$string);
  $string = str_replace("is NULL; --","",$string);
  $string = str_replace("LIKE '","",$string);
  $string = str_replace('LIKE "',"",$string);
  $string = str_replace("LIKE ´","",$string);
  $string = str_replace("OR 'a'='a","",$string);
  $string = str_replace('OR "a"="a',"",$string);
  $string = str_replace("OR ´a´=´a","",$string);
  $string = str_replace("OR ´a´=´a","",$string);
  $string = str_replace("--","",$string);
  $string = str_replace("^","",$string);
  $string = str_replace("[","",$string);
  $string = str_replace("]","",$string);
  $string = str_replace("==","",$string);
  return $string;
}

if(empty($_POST['name']) || empty($_POST['telefono']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strClean(strip_tags(htmlspecialchars($_POST['name'])));
$email = strClean(strip_tags(htmlspecialchars($_POST['email'])));
$telefono = strClean(strip_tags(htmlspecialchars($_POST['telefono'])));
$message = strClean(strip_tags(htmlspecialchars($_POST['message'])));

$to = "info@olaveggie.com.ar"; // Change this email to your //
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
