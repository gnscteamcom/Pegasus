<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title>{$msTitle}</title> 
<link rel="stylesheet" type="text/css" media="screen" href="{$msConfig.datos.w_url}/Temas/default/style.css"/> 
<script type="text/javascript" src="http://www.ver-pelis.net/js/jquery.js"></script> 
 <script type="text/javascript">
        var site_url = '{$msConfig.datos.w_url}';
    </script>
</head> 
<body> 
<div class="bgf"> 
    <!--<all>--> 
    <div class="all divcen w990px"> 
    	<!--<hd>--> 
        <div id="hd" class="clf p_relative pdtop10px"> 
        	<div class="hd_cnt_1 clf"> 
                <a class="logo f_left ovw p_relative" href="{$msConfig.datos.w_url}/" title="{$msConfig.slogan}"><img class="p_absolute" src="{$msConfig.datos.w_url}/Temas/default/img/bg.png" alt="{$msConfig.datos.w_titulo}" /></a> 
                <div class="hdrgt f_right pdtop5px"> 
                    <div class="frmsrch f_right ovw mgbot5px"> 
                        <form action="{$msConfig.datos.w_url}/buscar/" method="get"> 
                            <p class="bginptxt f_left ico pd5px"><input class="inp_txt bold" value="Buscador" title="Buscador" type="text" name="q" /></p> 
                            <p class="inpbtnp f_right"><input class="inp_btn bold ico white" value="Buscar !" type="submit" /></p> 
                        </form> 
                    </div> 
                    <ul class="mntop bold clr cntclsx f_right lstinl txt_rig w100"> 
						<li><a href="{$msConfig.datos.w_url}/"  title="Home">Inicio</a></li>
                        {if $msUser->is_member}
							{if $msUser->is_admod}
							<li><a title="Cerrar Sesion" href="{$msConfig.datos.w_url}/admin/">Administração</a></li>
							{/if}
							<li><a title="Cerrar Sesion" href="{$msConfig.datos.w_url}/logout/">Encerrar sessão</a></li>
						{else}
							<li><a title="Iniciar Sesion" href="{$msConfig.datos.w_url}/login/">Iniciar Sessão</a></li>
						{/if}
                    </ul> 
                </div> 
            </div> 
            <div class="hd_cnt_2 p_relative"> 
            	<div class="mascota ico p_absolute"></div> 
                <h1 class="tithd bold fs18px lnht30px ico_b pdtop10px"><!-- ALGUNAS KEY RELEVANTES --></h1> 
                <ul id="sldpels" class="f_left_li">  
				{if $msEstrenos != ""}
					{foreach from=$msEstrenos item=e}            
		  			<li><a href="{$msConfig.datos.w_url}/pelicula/{$e.p_id}/{$e.p_seo}.html" title="{$e.p_titulo}" target="_blank"><img src="{$msConfig.datos.w_url}/files/uploads/{$e.p_id}.jpg" alt="{$e.p_titulo}"/></a></li>	
					{/foreach}	
				{/if}			
				</ul> 
            </div>
			{* 
            <ul class="menu bold bxshd1 cntclsx f_left_lia fs14px liabrdr10px lnht30px txt_cen white"> 
                <li><a href="#" >Menu</a></li> 
            </ul>
			*}
        </div> 
        <!--</hd>--> 
    	<!--<bd>--> 
        <div id="bd" class="clf"> 
