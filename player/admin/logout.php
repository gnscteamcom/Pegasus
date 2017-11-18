<?php
	session_destroy(); //pei!!! destruimos a sessão ;)
	session_unset(); //limpamos as variaveis globais das sessões

	$URL = adminURL('');
	echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
	exit;

?>
