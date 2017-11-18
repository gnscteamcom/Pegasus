<?php
	if (isset($_SESSION['Login'])) { // Está logado
		session_destroy(); //pei!!! destruimos a sessão ;)
		session_unset(); //limpamos as variaveis globais das sessões
		session_start(); //iniciamos a sessão que foi aberta
		$_SESSION['Lock'] = true;
	}
	$URL = adminURL('');
	echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
	exit;

?>
