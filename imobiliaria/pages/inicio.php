<?php
include("configuracao.php");
?>
<div class="content">
		<div class="features-section">
			<div class="features-section-head text-center">
				<h3><span>D</span>estaque</h3>
				<p>"produto em destaque desta semana"</p>
			</div>
			<div class="features-section-grids">
				<div class="features-section-grid">
					<a href="?buscar=produto&id=<?=$pegar[id];?>"><img src="images/up/<?=$pegar[img];?>" width="545" height="345" alt="" /></a>
					<div class="girl-info">
						<div class="lonovo">
							<div class="dress">
								<h4 style="text-transform:capitalize;"><?=$pegar[imovel];?></h4>
								<p style="text-transform:capitalize;"><?=substr($pegar[descricao],0,100);?></p>
							</div>
							<div class="priceindollers">
								<h3>R$ <span><?=number_format($pegar[preco],0,",",".");?></span></h3>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>	
				</div>
			</div>
			</div>
	</div>
			</div>
			</div>
	</div>
		
		<div class="container">
			<div class="products-section">
				<div class="products-section-head text-center">
					<h3><span>I</span>m&oacute;veis</h3>
					<p>confira nossos &uacute;ltimos im&oacute;veis lan&ccedil;ados</p>
				</div>
				<div class="products-section-grids">
					<ul id="filters" class="clearfix">
						<li><span class="filter active" data-filter="app card icon web"><label class="active"></label>Todos</span></li>
						</ul>
						
						<div id="portfoliolist">
						
						<?php
$query = mysql_query("select * from imoveis");
           $query_a = mysql_fetch_array($query);
           if ($query_a['id'] == NULL) {
           echo "<td width='300'><center><p class='text-error' style='color:#CC0033;padding-top:10;'><br>Nenhum im&oacute;vel nesta categoria  foi encontrado.<br><br></p></td></center><br>";
           }
           else{
		   $queryw = mysql_query("select * from imoveis order by id desc limit 0,8");
		   while($exibir = mysql_fetch_array($queryw)) {
		   echo '
		   <div class="portfolio card mix_all  data-cat="card" style="display: inline-block; opacity: 1;">
									
						<div class="portfolio-wrapper">		
							<a href="?buscar=produto&id='.$exibir[id].'" class="b-link-stripe b-animate-go  thickbox">
						     <img src="images/up/'.$exibir[img].'" class="img-responsive" alt="" /><div class="b-wrapper"><div class="atc"><p>'.$exibir[bairro].'</p></div><div class="clearfix"></div><h2 class="b-animate b-from-left    b-delay03 "><img src="images/icon-eye.png" class="img-responsive go" alt=""/></h2>
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
					</div>	
		   ';
		   }
		   }

		   ?>
					
					
<div class="clearfix"></div>					
				</div>
		  <div class="clearfix"></div>
		  <div class="more">
				<div class="allproducts">
					<a href="?buscar=p">TODOS IM&Oacute;VEIS</a>
				</div>
				 <div class="clearfix"></div>
		  </div>
		  </div>
		  
		  <!-- script-for-portfolio -->
		  <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
								
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);				
			
			}

		};
		
		// Run the show!
		filterList.init();
		
		
	});	
	</script>
	</div>
			</div></div>
			
			
						