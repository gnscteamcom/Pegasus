<div id="admin_panel">
<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
	<thead>
		<tr>
			<th width="11%">ID</th>
			<th width="64%">Nombre</th>
			<th width="25%">Acciones</th>
		</tr>
	</thead>
	<tbody>
        {foreach from=$msMovie item=m}
		<tr>
			<td>{$m.p_id}</td>
			<td>{$m.p_titulo|escape}</td>
			<td><a href="{$msConfig.datos.w_url}/admin/?a=pedit&pid={$m.p_id}" title="Editar"><img src="{$msConfig.datos.w_url}/Temas/default/img/editar.png" /></a> <a href="{$msConfig.datos.w_url}/admin/?a=pvideos&pid={$m.p_id}" title="Reproductores"><img src="{$msConfig.datos.w_url}/Temas/default/img/video.png" /></a> <a href="{$msConfig.datos.w_url}/admin/?a=plink&pid={$m.p_id}" title="Enlaces"><img src="{$msConfig.datos.w_url}/Temas/default/img/link.png" /></a></td>
		</tr>
        {/foreach}
	</tbody>
</table>
{if $msPag != ""}
<!--<nav>--> 
<ul class="nav bgdeg4 bold brdr10px bxshd2 clr fs18px lnht30px liasbrdr10px lstinl pd10px txt_cen white"> 
{$msPag} 
</ul> 
<!--</nav>--> 
{/if}
</div>