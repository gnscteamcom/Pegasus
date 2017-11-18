<div id="admin_panel">
<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
	<thead>
		<tr>
			<th width="11%">ID</th>
			<th width="64%">Nome</th>
			<th width="25%">Ações</th>
		</tr>
	</thead>
	<tbody>
        {foreach from=$msData item=l}
		<tr>
			<td>{$l.l_id}</td>
			<td>{$l.l_nombre|escape}</td>
			<td><a href="{$l.l_url}"><img src="{$msConfig.datos.w_url}/Temas/default/img/ver.png" /></a> <a href="{$msConfig.datos.w_url}/admin/?a=linksedit&wid={$l.l_id}" title="Editar"><img src="{$msConfig.datos.w_url}/Temas/default/img/editar.png" /></a> <a {literal}onclick="if(confirm('Esta seguro que desea continuar?') == false){return false;}"{/literal} href="{$msConfig.datos.w_url}/admin/?a=linksdel&wid={$l.l_id}" title="Eliminar"><img src="{$msConfig.datos.w_url}/Temas/default/img/close.png" /></a></td>
		</tr>
        {/foreach}
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3" ><p style="float:right;margin:5px;"><input type="button" onclick="location.href = '{$msConfig.datos.w_url}/admin/?a=linksadd'" class="btn_g" value="Agregar Nuevo!"></p></th>
		</tr>
	</tfoot>
</table>
</div>
