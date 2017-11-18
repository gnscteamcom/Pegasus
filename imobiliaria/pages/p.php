<div class="products-section-grids">
 <div id="portfoliolist">
 
  
 <?php  
$_GET[id] = sql($_GET[id]);
$_GET[negocio] = sql($_GET[negocio]);
$_GET[tipo] = sql($_GET[tipo]);
$_GET[imovel] = sql($_GET[imovel]);
$_GET[preco] = sql($_GET[preco]);
 if($_GET[id]) {
  $busca = "SELECT * FROM imoveis WHERE descricao LIKE '%".$_GET['id']."%' or tipo LIKE '%".$_GET['id']."%' or imovel LIKE '%".$_GET['id']."%' or negocio LIKE '%".$_GET['id']."%' or bairro LIKE '%".$_GET['id']."%' or cidade LIKE '%".$_GET['id']."%' or estado LIKE '%".$_GET['id']."%'";
 } elseif(empty($_GET['negocio']) || empty($_GET['tipo']) || empty($_GET['imovel']) || empty($_GET['preco'])) {
 $busca = "SELECT * FROM imoveis";
 } else {
 $busca = "SELECT * FROM imoveis where negocio='".$_GET[negocio]."' and tipo='".$_GET[tipo]."' and imovel='".$_GET[imovel]."' and preco<='".$_GET[preco]."'";
 }
 
 $total_reg = "8"; // número de registros por página

$pagina=$_GET['pagina']; if (!$pagina) { $pc = "1"; } else { $pc = $pagina; }

$inicio = $pc - 1; $inicio = $inicio * $total_reg;

 
 $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
  $todos = mysql_query("$busca");
 
  $tr = mysql_num_rows($todos); // verifica o número total de registros
  $tp = $tr / $total_reg; // verifica o número total de páginas
 
 if(mysql_num_rows($todos) == 0) {
 echo "<td width='300'><center><p class='text-error' style='color:#CC0033;padding-top:10;'><br>Nenhum im&oacute;vel nesta categoria  foi encontrado.<br><br></p></td></center>";
 } 
 
  // vamos criar a visualização
  while ($exibir = mysql_fetch_array($limite)) {
  echo '
		   <div class="portfolio card mix_all  data-cat="card" style="display: inline-block; opacity: 1;">
									
						<div class="portfolio-wrapper">		
							<a href="?buscar=produto&id='.$exibir[id].'" class="b-link-stripe b-animate-go  thickbox">
						     <img src="images/up/'.$exibir[img].'" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>'.$exibir[negocio].'</p></div><div class="clearfix"></div><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
						  	</div></a>
							<div class="title">
								<div class="colors">
								<h4 style="text-transform:capitalize;">'.$exibir[imovel].'</h4>
								<p style="text-transform:capitalize;">'.$exibir[tipo].' em '.$exibir[cidade].'</p>
								</div>
								<div class="main-price">
									<h3><span>R$</span>'.number_format($exibir[preco],0,",",".").'</h3>
								</div>
								<div class="clearfix"></div>
							</div>
		                </div>
					</div>';
  }
  echo '</div>
		   <div class="clearfix"></div>					
				</div>
		  <div class="clearfix"></div>
 <div class="more">';
 
  // agora vamos criar os botões "Anterior e próximo"
  $anterior = $pc -1;
  $proximo = $pc +1;
  if ($pc>1) {
    echo '<div class="seemore">';
  if($_GET[id]) {
  echo " <a href='?buscar=p&id=".$_GET['id']."&pagina=$anterior'>Anterior</a> ";
  } elseif(empty($_GET['negocio']) || empty($_GET['tipo']) || empty($_GET['imovel']) || empty($_GET['preco'])) {
  echo " <a href='?buscar=p&pagina=$anterior'>Anterior</a> ";
  } else {
  echo " <a href='?buscar=p&negocio=".$_GET[negocio]."&tipo=".$_GET[tipo]."&imovel=".$_GET[imovel]."&preco=".$_GET[preco]."&pagina=$anterior'>Anterior</a> ";
  }
  echo "</div>";
  }
  if ($pc<$tp) {
  echo '<div class="allproducts">';
  
  
    if($_GET[id]) {
  echo " <a href='?buscar=p&id=".$_GET['id']."&pagina=$proximo'>Pr&oacute;xima</a> ";
  } elseif(empty($_GET['negocio']) || empty($_GET['tipo']) || empty($_GET['imovel']) || empty($_GET['preco'])) {
  echo " <a href='?buscar=p&pagina=$proximo'>Pr&oacute;xima</a> ";
  } else {
  echo " <a href='?buscar=p&negocio=".$_GET[negocio]."&tipo=".$_GET[tipo]."&imovel=".$_GET[imovel]."&preco=".$_GET[preco]."&pagina=$proximo'>Pr&oacute;xima</a> ";
  }
  echo '</div>';
  
  
  }
?>
 
		<div class="clearfix"></div>
		  </div>
 <br><br>
 
		   