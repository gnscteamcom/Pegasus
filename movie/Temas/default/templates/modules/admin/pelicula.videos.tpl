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
			<td>{$m.v_id}</td>
			<td>{$m.v_titulo|escape}</td>
			<td> <a href="{$msConfig.datos.w_url}/admin/?a=vedit&vid={$m.v_id}&pid={$p_id}" title="Editar"><img src="{$msConfig.datos.w_url}/Temas/default/img/editar.png" /></a> <a {literal}onclick="if(confirm('Esta seguro que desea continuar?') == false){return false;}"{/literal} href="{$msConfig.datos.w_url}/admin/?a=vdelet&vid={$m.v_id}&pid={$p_id}" title="Eliminar"><img src="{$msConfig.datos.w_url}/Temas/default/img/close.png" /></a></td>
		</tr>
        {/foreach}
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3" ><p style="float:right;margin:5px;"><input type="button" onclick="location.href = '{$msConfig.datos.w_url}/admin/?a=vadd&pid={$p_id}'" class="btn_g" value="Agregar +Videos!"></p></th>
		</tr>
	</tfoot>
</table>
{if $msPag != ""}
<!--<nav>--> 
<ul class="nav bgdeg4 bold brdr10px bxshd2 clr fs18px lnht30px liasbrdr10px lstinl pd10px txt_cen white"> 
{$msPag} 
</ul> 
<!--</nav>--> 
{/if}
</div>