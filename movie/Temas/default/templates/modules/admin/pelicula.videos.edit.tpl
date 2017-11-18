<div id="admin_panel">
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post">
<fieldset>
<legend>Agregar reproductor</legend>
<dl>
	<dt><label>Título:</label><br /><span>Texto a mostrar en la pestaña.</span></dt>
	<dd><input type="text" name="titulo" value="{$msMovie.0.v_titulo}" /></dd>
</dl>
<dl>
	<dt><label>Source:</label><br /><span>Código HTML del reproductor.</span></dt>
	<dd><textarea name="source" rows="5" cols="50">{$msMovie.0.v_source}</textarea></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar reproductor?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio" {if $msMovie.0.v_online == 1} checked="checked" {/if}> Sí</label> <label><input name="online" type="radio" value="0" class="radio" {if $msMovie.0.v_online == 0} checked="checked" {/if}> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Editar!" class="btn_g"></p>
</fieldset>
</form>
</div>