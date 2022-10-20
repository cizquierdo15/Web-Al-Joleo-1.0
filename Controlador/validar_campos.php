<?php

// Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
$patron_numeros = "/^[\d\s]+$/";
$patron_mixto = "/^[a-zA-Z\dáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

function validar_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	//$data = htmlspecialchars($data);
	return $data;
}

?>