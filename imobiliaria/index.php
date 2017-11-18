<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
session_start();
require("configuracao.php");
$conn = mysql_connect($cfg["servidor"],$cfg["login"],$cfg["senha"]);
mysql_select_db($cfg["database"],$conn);



/* SAIR */
if($_GET["buscar"] === "sair") {
@session_start();
@session_destroy();
@session_unset();
echo '<meta http-equiv="refresh" content="0;url=?buscar=adm">';
}

/* ANTI-SQL */
function sql($str) {
	$retorna_str = addslashes(eregi_replace('(SELECT|FROM|WHERE|CREATE|GRANT|INSERT|ALTER |SUPER|UPDATE|INDEX|PROCESS |DELETE|DROP|RELOAD|CREATE TEMPORARY TABLES|.TXT|WGET|SHUTDOWN|SHOW DATABASES|LOCK TABLES|REFERENCES|EXECUTE|REPLICATION CLIENT|REPLICATION SLAVE|#|\*|--|\\\\)', "", $str));
	return $retorna_str;
}


/* TITULO */
if($_GET["id"] || $_GET["buscar"] == "produto") {
$pegar = mysql_fetch_array(mysql_query("select * from imoveis where id='".$_GET['id']."'"));
}
$pegar = mysql_fetch_array(mysql_query("select * from imoveis order by id desc"));

if(empty($pegar["id"])) {
mysql_query("CREATE TABLE IF NOT EXISTS`images` (
  `id` int(4) NOT NULL auto_increment,
  `imovel` int(4) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

mysql_query("CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(4) NOT NULL auto_increment,
  `tipo` text NOT NULL,
  `cidade` text NOT NULL,
  `bairro` text NOT NULL,
  `negocio` text NOT NULL,
  `imovel` text NOT NULL,
  `descricao` text NOT NULL,
  `preco` text NOT NULL,
  `endereco` text NOT NULL,
  `estado` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(empty($_GET['id'])) { echo $cfg[empresa]; echo " | Encontre seu im&oacute;vel aqui."; } else { 
echo strtoupper($pegar[tipo]); echo " EM "; echo strtoupper($pegar[cidade]); echo " | $cfg[empresa] $cfg[site]"; } ?></title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="imoveis, casas, ap, apartamentos" />
<meta name="description" content="Imóveis." />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
		 <script src="js/scripts.js" type="text/javascript"></script>
		 <style>
		 p.text-error {
		 background:#FCE7EA;
		 border:thin solid #EB5367;
		 color:#EB5367;
		 margin:15;
		 padding:15;
		 height:50;
		 }
		 </style>
		 
</head>
<body>
	<!-- header-section-starts -->
	<div class="header" id="home">
		<div class="top-header">
			<div class="container">
			<div class="logo">
				<a href=""><img src="images/logo.png" alt="" /></a>
			</div>
				<div class="header-top-right">
				<!-- start search-->
				    <div class="search-box">
					    <div id="sb-search" class="sb-search">
							<form action="" method="post">
								<input class="sb-search-input" placeholder="Pesquisar im&oacute;veis..." type="search" name="txtgo">
								<input name="procgo" type="submit" class="sb-search-submit">
								<span class="sb-icon-search"> </span>
							</form>
							<? if($_POST['procgo']) {
							if(empty($_POST['txtgo'])) {
							echo "<script>alert('Existem campos em branco.');</script>";
							} else {
							echo 'wwwww<meta http-equiv="refresh" content="0;url=?buscar=p&id='.$_POST['txtgo'].'">';
							 } }?>
						</div>
				    </div>
					<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
				</div>
			<div class="navigation">	
			<div>
              <label class="mobile_menu" for="mobile_menu">
              <span>Menu</span>
              </label>
              <input id="mobile_menu" type="checkbox">
				<ul class="nav">
              <li class="active"><a href="?buscar=inicio">In&Iacute;cio</a></li>  
			             <li class="dropdown1"><a href="#">IM&Oacute;VEIS</a>
           	<ul class="dropdown2">
			<?php 
while (list ($key, $val) = each ($imoveis) ) echo '<li><a href="?buscar=p&id='.$val.'">'.$val.'</a></li>'; 
?>
                </ul>
           </li>                       
              <li class="dropdown1"><a href="#">Neg&Oacute;cios</a>
                <ul class="dropdown2">
                  <?php 
while (list ($key, $val) = each ($negocios) ) echo '<li><a href="?buscar=p&id='.$val.'">'.$val.'</a></li>'; 
?>
                </ul>
              </li>             
              <li class="dropdown1"><a href="#">Tipos</a>
              	<ul class="dropdown2">
                 <?php 
while (list ($key, $val) = each ($tipos) ) echo '<li><a href="?buscar=p&id='.$val.'">'.$val.'</a></li>'; 
?>
                </ul>
              </li>
           </li>                 
            <li><a href="?buscar=contato">Contato</a></li>
            <div class="clearfix"></div>
          </ul>
		</div>			
	 </div>
			</div>
		</div>
		

		
	
<?php
include("pages/pw.php");
?>


	


<?
if(empty($_GET['buscar'])) {
require("pages/inicio.php");
} elseif (file_exists("pages/".$_GET['buscar'].".php")) {
require("pages/".$_GET['buscar'].".php");
} else {
require("pages/inicio.php");
}
?>

<!-- WWW.PHPLIVRE.COM -->

		<div class="footer">
		<div class="up-arrow">
			<a class="scroll" href="#home"><img src="images/up.png" alt="" /></a>
		</div>
			<div class="container">
				<div class="copyrights">
					<p>Copyright &copy; <?=date('Y');?> All rights reserved | Desenvolvido por  <a href="http://phplivre.com">  PHPLivre</a></p>
				</div>
				<div class="footer-social-icons">
					<a href="http://<?=$cfg[facebook];?>"><i class="fb"></i></a>
					<a href="http://<?=$cfg[twitter];?>"><i class="tw"></i></a>
					<a href="?buscar=adm"><i class="in"></i></a>
				</div>
				  <div class="clearfix"></div>
			</div>
		</div>
</body>
</html>
