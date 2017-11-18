{include file='sections/head.tpl'}
{include file='sections/sidebar.admin.tpl'}
        	<!--<cn>--> 
        	<div id="cn" class="f_right"> 
                <!--<bkcnpels>--> 
                <div class="bkcnpels br1px brdr10px mgtop15px"> 
                	<div class="titbkcnt bgdeg7 bold brdr10px bxshd2 fs18px ico_b mgbot15px p_relative white">{$msTitle}</div> 
 
  				<bR/>          	
	{if $msAction == 'home'}
	{include file='modules/admin/home.tpl'}
	{elseif $msAction == 'config'}
	{include file='modules/admin/configuraciones.tpl'}
	{elseif $msAction == 'ads'}
	{include file='modules/admin/publicidad.tpl'}
	{elseif $msAction == 'padd'}
	{include file='modules/admin/pelicula.add.tpl'}
	{elseif $msAction == 'links'}
	{include file='modules/admin/links.tpl'}
	{elseif $msAction == 'linksadd'}
	{include file='modules/admin/links.add.tpl'}
	{elseif $msAction == 'linksedit'}
	{include file='modules/admin/links.edit.tpl'}
	{elseif $msAction == 'post'}
	{include file='modules/admin/peliculas.tpl'}
	{elseif $msAction == 'pedit'}
	{include file='modules/admin/pelicula.edit.tpl'}
	{elseif $msAction == 'plink'}
	{include file='modules/admin/pelicula.links.tpl'}
	{elseif $msAction == 'pvideos'}
	{include file='modules/admin/pelicula.videos.tpl'}
	{elseif $msAction == 'vadd'}
	{include file='modules/admin/pelicula.videos.add.tpl'}
	{elseif $msAction == 'vedit'}
	{include file='modules/admin/pelicula.videos.edit.tpl'}
	{elseif $msAction == 'reportes'}
	{include file='modules/admin/reportes.tpl'}
	{/if}
                </div> 
                <!--</bkcnpels>--> 
       		</div> 
            <!--</cn>--> 
        </div> 
        <!--</bd>-->
{include file='sections/footer.tpl'}