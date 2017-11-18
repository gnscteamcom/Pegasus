<?php
	if (file_exists('../config.php')) {
		include('../config.php'); // Arquivo de configurações
	}else{
		echo '<p>config.php miss!</p>';
		exit;
	}
	if (version_compare(PHP_VERSION, '5.2.1', '<')) {
		echo '<h2>Error</h2>';
		echo '<p>PHP 5.2.1 or higher is required.</p>';
		echo '<p>You are running '.PHP_VERSION.'</p>';
		exit;
	}

	//Carrega as Functions
	require("../includes/Functions.php");
	GetSQLDb();

	if(!empty($_POST['embed'])){
		
		$Embed = $_POST['embed'];
		if(IsEmbed($Embed)){
			$URL = $_POST['url'];
			$Mensage = '';
			if(!empty($_POST['SvID'])){
				//filme
				$SvID = $_POST['SvID'];
				$Mensage = 'File Not Found ServerID:'.$SvID;
				AddReport($Embed, $Mensage);				
			}else if(!empty($_POST['sID']) && !empty($_POST['eID'])){
				//Serie
				$sID = $_POST['sID'];
				$eID = $_POST['eID'];
				$Mensage = 'File Not Found Season:'.$sID.', Episode:'.$eID;
				AddReport($Embed, $Mensage);
			}
		}
	}

?>