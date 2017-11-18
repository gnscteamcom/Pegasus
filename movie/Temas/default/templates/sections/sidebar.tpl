        	<!--<sd>-->
        	<div id="sd" class="f_left"> 
                <!--<bk>--> 
                <div class="bk_1 bgdeg3 bxshd2 brdr10px mgbot20px fs11px white"> 
                    <div class="tit_sdbr ico_b mgbot10px p_relative txtshdw1"> 
                        <span class="d_block fntber_r">Bem Vindo à...</span>
                        <span class="fntber_b fs18px">{$msConfig.datos.w_titulo}</span> 
                    </div> 
                    <p>Aqui pode encontrar todos <strong>filmes online</strong> cadastrados<br /> Para ver <strong>os filmes online</strong> sem limite não é necesario registrar, bom divertimento.</p>
                </div> 
                <!--</bk>--> 
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico1 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Filmes <span class="d_block">Selecciona tu categoria</span></div>
                    <ul class="icoscat bold clf icos fs14px f_left_li liabrdr10px"> 
 					{foreach from=$msGeneros item=g} 
						<li><a title="{$g.g_nombre}" href="{$msConfig.datos.w_url}/categoria/{$g.g_seo}/"><strong>{$g.g_nombre}</strong></a></li> 
 					{/foreach}
                    </ul> 
                </div> 
                <!--</bk>--> 
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico2 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Os mais acessados <span class="d_block">Peliculas Destacadas</span></div>
                    <ul class="icospel bold clf icos fs14px liabrdr10px"> 
					{foreach from=$msHits item=h}
						<li><a href="{$msConfig.datos.w_url}/pelicula/{$h.p_id}/{$h.p_seo}.html" title="{$h.p_titulo}">{$h.p_titulo} <span>Vista: {$h.p_hits}</span></a></li> 
					{/foreach}
                    </ul> 
                </div> 
                <!--</bk>-->
				<!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico2 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Os mais votados<span class="d_block">Peliculas Votadas</span></div>
                    <ul class="icospel bold clf icos fs14px liabrdr10px"> 
					{foreach from=$msVotos item=h}
						<li><a href="{$msConfig.datos.w_url}/pelicula/{$h.p_id}/{$h.p_seo}.html" title="{$h.p_titulo}">{$h.p_titulo} <span>Votos: {$h.p_votos}</span></a></li> 
					{/foreach}
                    </ul> 
                </div> 
                <!--</bk>-->  
                
				{if $msConfig.ads.fb != ""}
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico3 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Facebook <span class="d_block">Gostou do site?</span></div>
				<center> 
				<div id="fb-root"></div><script src="http://connect.facebook.net/es_LA/all.js#xfbml=1"></script><fb:like-box href="{$msConfig.ads.fb}" width="200" height="630" show_faces="true" border_color="#d7ebf9" stream="false" header="false"></fb:like-box> 
				</center> 
                </div> 
                <!--</bk>--> 
				{/if}
				{if $msConfig.links != ""}
				<!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico3 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Enlaces <span class="d_block">Parceiros</span></div>
                    <ul class="icospag bold clf icos fs14px liabrdr10px">
					{foreach from=$msConfig.links item=l} 
		  				<li><a title="{$l.l_nombre}" href="{$l.l_url}" target="_blank">{$l.l_nombre}</a></li> 
 					{/foreach}
                    </ul> 
                </div> 
                <!--</bk>--> 
				{/if}
                <!--<bk>--> 
				{if $msConfig.ads.120x600 != ""}
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico4 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Sponsor <span class="d_block">Nos ajude a crescer!</span></div>
                    <div class="bkcnt brdr10px br1px pd15px"> 
                   <center> 
				   {$msConfig.ads.120x600|unescape}
				   </center> 
                    </div> 
                </div> 
				{/if}
            </div> 
            <!--</sd>-->
