<?php
$_GET[id] = sql($_GET[id]);
$pegar = mysql_fetch_array(mysql_query("select * from imoveis where id='".sql($_GET[id])."'"));
if($pegar[tipo] == false) {
echo "<td width='300'><center><p class='text-error' style='color:#CC0033;padding-top:10;'><br>Nenhum im&oacute;vel nesta categoria  foi encontrado.<br><br></p></td></center><br><br><br>";
} else {
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
					}
				});

			});
		</script>
		  <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
		$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
	</script>
  <!-- End CSS for slidesjs.com example -->

  <style>
    #slides {
      display: none
    }

    .container {
      margin: 0 auto
    }

    /* For tablets & smart phones */
    @media (max-width: 767px) {
      
      .container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px
      }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 1170px
      }
    }
  </style>
  <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
</head>


			   
			   
			   	<div class="container"  style="font-family:Source Sans Pro;">
		<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
				 
                    <li class="home">
                       <a href="?buscar=inicio" title="Inicio"><img src="images/home.png" alt=""/></a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li>
                       <?=$pegar[cidade];?>
                    </li>&nbsp;
                       <span>&gt;</span>
					<li><?=$pegar[bairro];?></a></li>
                </ul>
                <ul class="previous">
                	<li><a href='' onClick="history.back();">Voltar p&aacute;gina</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   </div>
			   
			   
			 <div class="map" id="map" style="height: 190px; width: 300;"></div>

                
            
			
        <script src="js/gmaps.js" type="text/javascript"></script>
        <script src="js/markers.js" type="text/javascript"></script>		
        <script>
            $(function(){
               //Definir o centro do mapa [endere�o + elm div]
               initMap('<?=$pegar[endereco];?>, <?=$pegar[estado];?>, <?=$pegar[cidade];?>','map');
			   addMarker('<?=$pegar[endereco];?>, <?=$pegar[estado];?>, <?=$pegar[cidade];?>','map');
            })
        </script>  
			   <br><br>
			   
	<!-- start content -->
<div class="container">


<table width="100%" border="0" style="font-family:Source Sans Pro;">
  <tr>
    <td width="80%"><h2><strong><?=$pegar[negocio];?></strong> de <?=$pegar[tipo];?> <?=$pegar[imovel];?> <font size="2px" color="#999999">ID: <?=$_GET[id];?></font></h2>
	<br><?=$pegar[descricao];?><br><br>
	<br>
	<h3><font size="3px" style="margin-right:2%;">POR APENAS</font> <span class="label label-success">R$ <?=number_format($pegar[preco],0,",",".");?></span></h3>
	
<br><br><br><br>
COMPARTILHE<BR>
<div class='shareaholic-canvas' data-app='share_buttons' data-app-id='5390245'></div> <script type="text/javascript"> var shr = document.createElement("script"); shr.setAttribute("data-cfasync", "false"); shr.src = "//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js"; shr.type = "text/javascript"; shr.async = "true"; shr.onload = shr.onreadystatechange = function() { var rs = this.readyState; if (rs && rs != "complete" && rs != "loaded") return; var site_id = "39e07923cec488add2e8c7d4263934e0"; try { Shareaholic.init(site_id); } catch (e) {console.log(e)} }; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(shr, s); </script>
	</td>
    <td><a href="?buscar=contato&id=<?=$_GET[id];?>"><img src="images/button-entre-em-contato.png"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><center><?=$cfg[tel];?> - <?=$cfg[email];?></center></td>
  </tr>
</table>
<br><br><br>

        



  <!-- SlidesJS Optional: If you'd like to use this design -->
  <style>
    body {
      -webkit-font-smoothing: antialiased;
      font: normal 15px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #232525;
    }

    #slides {
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:5px;
    }

    a.slidesjs-next,
    a.slidesjs-previous,
    a.slidesjs-play,
    a.slidesjs-stop {
      background-image: url(img/btns-next-prev.png);
      background-repeat: no-repeat;
      display:block;
      width:12px;
      height:18px;
      overflow: hidden;
      text-indent: -9999px;
      float: left;
      margin-right:5px;
    }

    a.slidesjs-next {
      margin-right:10px;
      background-position: -12px 0;
    }

    a:hover.slidesjs-next {
      background-position: -12px -18px;
    }

    a.slidesjs-previous {
      background-position: 0 0;
    }

    a:hover.slidesjs-previous {
      background-position: 0 -18px;
    }

    a.slidesjs-play {
      width:15px;
      background-position: -25px 0;
    }

    a:hover.slidesjs-play {
      background-position: -25px -18px;
    }

    a.slidesjs-stop {
      width:18px;
      background-position: -41px 0;
    }

    a:hover.slidesjs-stop {
      background-position: -41px -18px;
    }

    .slidesjs-pagination {
      margin: 7px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(img/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
  </style>
  <!-- End SlidesJS Optional-->

  <!-- SlidesJS Required: These styles are required if you'd like a responsive slideshow -->
  <style>
    #slides {
      display: none
    }

    .container {
      margin: 0 auto
    }

    /* For tablets & smart phones */
    @media (max-width: 767px) {
      body {
        padding-left: 20px;
        padding-right: 20px;
      }
      .container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px
      }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 1170px
      }
    }
  </style>
  <!-- SlidesJS Required: -->
</head>
<body>
  <!-- SlidesJS Required: Start Slides -->
  <!-- The container is used to define the width of the slideshow -->
  <div class="container">
  <div id="slides">
<?
$query = mysql_query("select * from images where imovel='".$_GET['id']."'");
           $query_a = mysql_fetch_array($query);
           if ($query_a['imovel'] == NULL) {
           echo "<p class='text-error' style='color:#CC0033;'>Nenhuma imagem até o momento.</p>";
           }
           else{
           $querys = mysql_query("select * from images where imovel='".$_GET['id']."'");
		   while($exibir = mysql_fetch_array($querys)) {
		   echo '<img src="images/up/'.$exibir[img].'" alt="'.$pegar[tipo].'">';
		   }
}
?> </div>
  </div>
  <!-- End SlidesJS Required: Start Slides -->

  <!-- SlidesJS Required: Link to jQuery -->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Link to jquery.slides.js -->
  <script src="js/jquery.slides.min.js"></script>
  <!-- End SlidesJS Required -->

  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 940,
        height: 528,
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true
        }
      });
    });
  </script>
  <!-- End SlidesJS Required -->
</div>
</div>
<br><br>



<? } ?>