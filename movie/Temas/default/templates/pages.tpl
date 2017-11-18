{include file='sections/head.tpl'}
{include file='sections/sidebar.tpl'}
        	<!--<cn>--> 
        	<div id="cn" class="f_right"> 
                <!--<bkpelsalf>--> 
                <div class="bkpelsalf bgdeg5 brdr10px bxshd2 mgbot15px txt_cen"> 
                    <div class="titcnt bold fs18px white">Filmes por ordem alfabética</div>
                    <div class="bkpelsalf_ul br1px brdr10px bxshd3"> 
                        <ul class="lstinl bold bgdeg6 br1px brdr10px icos fs16px"> 
                            <li><a href="{$msConfig.datos.w_url}/letra/a.html" title="Filmes que começam com A">A</a></li>
                            <li><a href="{$msConfig.datos.w_url}/letra/b.html" title="Peliculas que comienzan con B">B</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/c.html" title="Peliculas que comienzan con C">C</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/d.html" title="Peliculas que comienzan con D">D</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/e.html" title="Peliculas que comienzan con E">E</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/f.html" title="Peliculas que comienzan con F">F</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/g.html" title="Peliculas que comienzan con G">G</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/h.html" title="Peliculas que comienzan con H">H</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/i.html" title="Peliculas que comienzan con I">I</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/j.html" title="Peliculas que comienzan con J">J</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/k.html" title="Peliculas que comienzan con K">K</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/l.html" title="Peliculas que comienzan con L">L</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/m.html" title="Peliculas que comienzan con M">M</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/n.html" title="Peliculas que comienzan con N">N</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/o.html" title="Peliculas que comienzan con O">O</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/p.html" title="Peliculas que comienzan con P">P</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/q.html" title="Peliculas que comienzan con Q">Q</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/r.html" title="Peliculas que comienzan con R">R</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/s.html" title="Peliculas que comienzan con S">S</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/t.html" title="Peliculas que comienzan con T">T</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/u.html" title="Peliculas que comienzan con U">U</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/v.html" title="Peliculas que comienzan con V">V</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/w.html" title="Peliculas que comienzan con W">W</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/x.html" title="Peliculas que comienzan con X">X</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/y.html" title="Peliculas que comienzan con Y">Y</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/z.html" title="Peliculas que comienzan con Z">Z</a></li> 
                            <li><a href="{$msConfig.datos.w_url}/letra/09.html" title="Peliculas que comienzan con numeros de 0 a 9">0 - 9</a></li>            
                        </ul> 
                    </div> 
                </div> 
                <!--</bkpelsalf>--> 
                <!--<bkbnrc>--> 
				{if $msConfig.ads.728x90 != ""}
                <div class="bkbnrc"> 
                	{$msConfig.ads.728x90|unescape}<br/> 
                </div> 
				{/if}
                <!--</bkbnrc>--> 
                <!--<bkcnpels>--> 
                <div class="bkcnpels br1px brdr10px mgtop15px"> 
                	<div class="titbkcnt bgdeg7 bold brdr10px bxshd2 fs18px ico_b mgbot15px p_relative white">{if $msPag != ""}{$msTitle}{else}Error{/if}</div> 
                    <!--<bkbnrc>--> 
					{if $msConfig.ads.300x250 != "" }
                    <div class="bkbnrc_2 br1px brdr10px clf mgbot20px"> 
                    	<div class="bnrlft f_left w300px"> 
                        		{$msConfig.ads.300x250|unescape} 
                        </div> 
                    	<div class="bnrrgt f_right w300px"> 
                        	   {$msConfig.ads.300x250|unescape}
                        </div> 
                    </div> 
					{/if}
                    <!--</bkbnrc>--> 
 
  				<bR/>          	
{if $msPag != ""}
		{if $msPag == "aviso-legal"}
			{include file='modules/pages/aviso-legal.tpl'}
		{/if}
{else}<center>Error 404</center>{/if}
                </div> 
                <!--</bkcnpels>--> 
       		</div> 
            <!--</cn>--> 
        </div> 
        <!--</bd>-->
{include file='sections/footer.tpl'}
