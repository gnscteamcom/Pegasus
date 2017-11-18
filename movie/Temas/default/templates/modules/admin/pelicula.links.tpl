<div id="admin_panel">
{if $msMovie != ""}
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post">
<fieldset>
<legend>Controlar publicidad</legend>
<dl>
	<dt><label>Enlaces de descarga:</label><br /><span>El script detecta automaticamente las URL, poner una URL por línea.</span></dt>
	<dd><textarea name="links" rows="5" cols="50">{$msMovie.0.d_links}</textarea></dd>
</dl>
<dl>
	<dt><label>Activar botón:</label><br><span>Mostrar u ocultar botón descargar.</span></dt>
	<dd><label><input name="offline" type="radio" value="1" {if $msMovie.0.d_online == 1}checked="checked"{/if} class="radio"> Sí</label><label><input name="offline" type="radio" value="0" {if $msMovie.0.d_online == 0}checked="checked"{/if} class="radio"> No</label></dd>
</dl>
<br />
<p><input type="button" name="enviar" value="Eliminar!" {literal}onclick="if(confirm('Esta seguro que desea continuar?') == false){return false;} else { location.href = '{/literal}{$msConfig.datos.w_url}/admin/?a=plink&b=delet&pid={$msMovie.0.p_id}' {literal}}"{/literal} class="btn_r" style="margin-left:10px;" /><input type="submit" name="enviar" value="Guardar!" class="btn_g"></p>
</fieldset>
</form>
{else}
<form action="" method="post">
<fieldset>
<p style=" text-align:center; margin-right:40%;"><input type="submit" name="enviar" value="Activar la descarga" class="btn_g"></p>
</fieldset>
</form>
{/if}
</div>