<div id="admin_panel">
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post">
<fieldset>
<legend>Controlar publicidad</legend>
<dl>
	<dt><label>Banner 728x90:</label></dt>
	<dd><textarea name="728x90" rows="5" cols="50">{$msConfig.ads.728x90}</textarea></dd>
</dl>
<dl>
	<dt><label>Banner 300x250:</label></dt>
	<dd><textarea name="300x250" rows="5" cols="50">{$msConfig.ads.300x250}</textarea></dd>
</dl>
<dl>
	<dt><label>Banner 120x600:</label></dt>
	<dd><textarea name="120x600" rows="5" cols="50">{$msConfig.ads.120x600}</textarea></dd>
</dl>
<dl>
	<dt><label>Facebook:</label><br /><span>Link de tu página me gusta en facebook.</span></dt>
	<dd><input name="fb" type="text" value="{$msConfig.ads.fb}"></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Guardar!" class="btn_g"></p>
</fieldset>
</form>
</div>