<div id="admin_panel">
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post">
<fieldset>
<legend>Agregar reproductor</legend>
<dl>
	<dt><label>T�tulo:</label><br /><span>Texto a mostrar en la pesta�a.</span></dt>
	<dd><input type="text" name="titulo" /></dd>
</dl>
<dl>
	<dt><label>Source:</label><br /><span>C�digo HTML del reproductor.</span></dt>
	<dd><textarea name="source" rows="5" cols="50"></textarea></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar reproductor?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio"> S�</label> <label><input name="online" type="radio" value="0" class="radio"> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Agregar!" class="btn_g"></p>
</fieldset>
</form>
</div>