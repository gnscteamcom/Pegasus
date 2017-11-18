<?php
ob_start();
session_start();
if (file_exists('config.php')) {
	include('config.php'); // Arquivo de configurações
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

//Carrega as includes
require("includes/Autoload.php");
GetSQLDb();

//Carrega as paginas Conrespondentes
	if(!empty($_GET['action'])){
		if($_GET['action'] == $CONFIG['BaseAdmURI']){
			//Verifica login
			if (isset($_SESSION['Login'])) { // Está logado
				if(!empty($_GET['page'])){
					// paginas de admin
					if (file_exists("admin/".$_GET['page'].".php")) {
						include("admin/".$_GET['page'].".php");
					}else{
						//pagina inicial do admin
						include("admin/index.php");
					}
				}else{
					//pagina inicial do admin
					include("admin/index.php");
				}
			}else{
				//pagina de login
				include("admin/login-form/index.php");
			}
		}else if($_GET['action'] == 'embed'){
			if(!empty($_GET['page'])){
				if(IsEmbed($_GET['page'])){
					// pagina para o embed do site
					include("theme/embed.php");
				}else{
					// EmbedId não encontrado
					include("theme/embed-notfound.php");
				}
			}else{
				include("theme/index.php");
			}
		}else if($_GET['action'] == 'callplayerjw6'){
			include("includes/CallPlayerjw6.php");
		}else{
			include("theme/index.php");
		}
	} else {
		// pagina inicial do site
		include("theme/index.php");
	}

?>