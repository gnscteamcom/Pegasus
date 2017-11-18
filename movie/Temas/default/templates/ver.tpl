{include file='sections/head.tpl'}
{literal}
<script>
jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#basic-modal a').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});
});
</script>
{/literal}
    	<!--<bd>--> 
        <div id="bd" class="bkcnt bkcnt_int br1px brdr10px clf"> 
            <!--<bkbnrc_3>--> 
			{if $msConfig.ads.300x250 != ""}
            <div class="bkbnrc_2 bkbnrc_3 br1px brdr10px clf mgbot15px"> 
                <div class="bnrlft f_left w300px"> 
                   
				    {$msConfig.ads.300x250|unescape} 
                
				</div> 
                <div class="bnrcnt f_left w300px"> 
                
					{$msConfig.ads.300x250|unescape} 
 
				</div> 
                <div class="bnrrgt f_left w300px"> 
                
					{$msConfig.ads.300x250|unescape}</td> 
				
				</div> 
            </div>
			{/if} 
			{if $msMovie != ""}
            {foreach from=$msMovie item=m}
			<table> 
			<tr><td> 
			<!--</bkbnrc_3>--> 
            <div class="titbkcnt bgdeg7 bold brdr10px bxshd2 fs18px ico_b mgbot15px p_relative white"> 
            	{$m.p_titulo}             </div> 
            <!--<intsd>--> 
            <div class="intsd f_left"> 
            	<div class="peli_img_int mgbot10px"> 
                	<img src="{$msConfig.datos.w_url}/files/uploads/{$m.p_id}.jpg" alt="{$m.p_titulo|escape}" style="width:175px;height:268px"/> 
                </div> 
				{if $msDown != ""}
                <div id='basic-modal'><a class="btndescr bgdeg9 fntber_b d_block brdr10px mgbot10px txt_cen txt_may white" rel="nofollow" href="#" title="Descargar Pelicula {$m.p_titulo|escape}" >DESCARGAR</a></div>
				<div id="basic-modal-content">
					<h3>Links para descargar la película</h3>
					<p>{$msDown.0.d_links|bbcode|nl2br}</p><br />
					<h3>Para reproducir las peliculas que has descargado</h3>
					<p>Puedes descargar directamente el video desde Megaupload, y los subtítulos desde {$msConfig.datos.w_titulo}. Para reproducirlos, recuerda que tanto el archivo de video como el de los subtítulos, deben tener el mismo nombre, por ejemplo, nombrevideo.mp4 (video) y nombrevideo.srt (subtítulos). Debes utilizar un reproductor compatible con subtítulos, te recomendamos VLC o BSplayer. <br /><br /><center><a href="http://www.videolan.org/"> Descargar VLC </a> o <a href="http://download7.bsplayer.com/download_free_bsplayer.php?type=1"> Descargar BSplayer </a></center></p>
				</div>				
				<div style='display:none'><img src='img/basic/x.png' alt='' /></div>
				{/if}<!--</intsd>--> 
            </div> 
            <!--<content>--> 
            <div class="content f_right"> 
                <div class="details mgbot20px p_relative"> 
                    <ul class="dtalist fs14px bold"> 
                        <li class="ico_b"><span>Titulo Original:</span> {$m.p_titulo|escape}</li> 
                        <li class="ico_b"><span>Genero:</span> {$m.g_nombre}</li>
						<li class="ico_b"><span>Ano:</span> {$m.p_ano}</li>
						<li class="ico_b"><span>Idioma:</span> {$m.p_idioma|escape}</li>
						<li class="ico_b"><span>Qualidade:</span> {$m.p_calidad|escape}</li>
						<li class="ico_b"><span>Visualizada:</span> {$m.p_hits} veces</li> 
                    </ul> 
                    <div class="share p_absolute"> 
                    	<div class="shr_fac f_right"> 
							<iframe src="http://www.facebook.com/plugins/like.php?href={$msConfig.datos.w_url}/{$msConfig.datos.w_url}/pelicula/{$m.p_id}/{$m.p_seo}.html&amp;layout=box_count&amp;width=71&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:71px; height:90px;" allowTransparency="true"></iframe>                        
                         </div> 
						 
                        <div class="shr_twi f_right"> 
                        	<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="Ver_Pelis" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> 
                        </div>
						
				<ul class="player_buttons">
                    <li><a href="#" class="alert pmenu" title="Reportar este video" onclick="reportar({$m.p_id}); return false;">&nbsp;</a></li>
                    <li class="rate">
                        <a href="#" class="vote_up pmenu" title="Me gusta" onclick="votar('pos', {$m.p_id}); return false">&nbsp;</a>
                        <a href="#" class="vote_down pmenu" title="No me gusta" onclick="votar('neg', {$m.p_id}); return false">&nbsp;</a>
                    </li>
                </ul> 
				
                    </div> 
                </div> 
                <div class="tit_cnt bold fs18px">Sinopse</div>
                <div class="sinoptxt mgbot15px"> 
	                <p>{$m.p_sinopsis}</p> 
				<bR/>
				    
                </div> 
				{if $msConfig.ads.728x90 != ""}
				 <div style="padding-bottom:10px;text-align:center;"> 
                	{$msConfig.ads.728x90|unescape}<br/> 
                </div> 
				{/if}
				</div> 
				</td></tr><tr> 
				<td> 
                <!--<pel_tra_bnr>--> 
                <div class="pel_tra_bnr brdr10px bkcontentint clf mgbot15px"> 
                	<!--<pel_tra>--> 
                 	<div class="pel_tra2 f_left"> 
					{if $msVideos != ""}
                        <ul class="tabs menu bold bxshd1 cntclsx f_left_lia fs14px liabrdr10px lnht30px txt_cen white clf mgbot10px"> 
						{assign var=i value=1}
						{foreach from=$msVideos item=v}
                            <li><a href="#ms{$i}">{$v.v_titulo|escape}</a></li> 
						{assign var=$i value=$i++}
						{/foreach}

                        </ul> 
                        <div class="tab_container">
						{assign var=i value=1}
						{foreach from=$msVideos item=v} 
                            <div id="ms{$i}" class="tab_content br1px brdr10px bkcnt pd15px fs11px"> 
								<div style="text-align:center;"> 
								{$v.v_source}
								</div>                     
					   
                        	</div>
						{assign var=$i value=$i++}
						{/foreach} 
                    </div> 
					{else}<center>Este Filme está offline</center>{/if}
						</div> 
                    <!--</pel_tra>--> 
                </div> 
				
							            	<!--</pel_tra_bnr>--> 
             </td></tr></table> 		
			
				<div class="intsd f_left"> 
				
	
					<div class="bnr txt_cen"> 
						
					{$msConfig.ads.120x600|unescape}
 
					</div> 
 
				</div>
	
				<div class="content f_right"> 
			
				
 
			 <!--<tagsvid>--> 
                <div class="tagsvid txt_cen bgdeg9 brdr10px bold fs16px lnht20px mgbot15px"> 
	               ver <strong>{$m.p_titulo}</strong> Online, <strong>{$m.p_titulo}</strong>, Watch <strong>{$m.p_titulo}</strong> online, Pelicula <strong>{$m.p_titulo}</strong>, Preview <strong>{$m.p_titulo}</strong>, Sinopsis <strong>{$m.p_titulo}</strong> 
                </div> 
                <!--</tagsvid>--> 
                <!--<comentarios>--> 
                <div class="bkcontentint brdr10px clf mgbot15px"> 
		<div id="fb-root"></div>{literal} 
		<script type="text/javascript"> 
		  window.fbAsyncInit = function() {
			FB.init({appId: '168367353225519', status: true, cookie: true,
					 xfbml: true});
		  };
		  (function() {
			var e = document.createElement('script'); e.async = true;
			e.src = document.location.protocol +
			  '//connect.facebook.net/es_ES/all.js';
			document.getElementById('fb-root').appendChild(e);
		  }());
		</script> {/literal}
		<fb:comments url="{$msConfig.datos.w_url}/{$msConfig.datos.w_url}/pelicula/{$m.p_id}/{$m.p_seo}.html" numposts="10" width="700" migrated="1"></fb:comments> 
					</p> 
                </div> 
                <!--</comentarios>-->
				{/foreach}  
				{else}
				<center>La película que quieres ver no existe.</center>
				{/if}               
            </div> 
            <!--</content>--> 
        </div> 
        <!--</bd>--> 
{include file='sections/footer.tpl'}
