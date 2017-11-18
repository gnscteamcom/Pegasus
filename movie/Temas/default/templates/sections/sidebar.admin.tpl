        	<!--<sd>-->
        	<div id="sd" class="f_left"> 
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico1 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Administración <span class="d_block">Movie Script</span></div> 
                    <ul class="icoscat bold clf icos fs14px f_left_li liabrdr10px"> 
						<li><a href="{$msConfig.datos.w_url}/admin/"><strong>Inicio</strong></a></li>
						<li><a href="{$msConfig.datos.w_url}/admin/?a=reportes"><strong>Mensagens</strong></a></li>
						<li><a href="{$msConfig.datos.w_url}/admin/?a=post"><strong>Filmes</strong></a></li>
						<li><a href="{$msConfig.datos.w_url}/admin/?a=padd"><strong>Adicionar Filmes</strong></a></li>
						<li><a href="{$msConfig.datos.w_url}/admin/?a=links"><strong>Links Parceiros</strong></a></li>
						<li><a href="{$msConfig.datos.w_url}/admin/?a=ads"><strong>Publicidade</strong></a></li>
						<li><a href="{$msConfig.datos.w_url}/admin/?a=config"><strong>Configuraçao</strong></a></li>
                    </ul> 
                </div> 
                <!--</bk>--> 
                               
				{if $msConfig.ads.fb != ""}
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico3 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Facebook <span class="d_block">Te gusta la pagina?</span></div> 
				<center> 
				<div id="fb-root"></div><script src="http://connect.facebook.net/es_LA/all.js#xfbml=1"></script><fb:like-box href="{$msConfig.ads.fb}" width="200" height="630" show_faces="true" border_color="#d7ebf9" stream="false" header="false"></fb:like-box> 
				</center> 
                </div> 
                <!--</bk>--> 
				{/if}
            </div> 
            <!--</sd>-->
