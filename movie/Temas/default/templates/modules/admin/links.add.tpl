<div id="admin_panel">
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Agregar web amiga</legend>
<dl>
	<dt><label>T�tulo:</label><br /><span>Nombre de la p�gina web</span></dt>
	<dd><input type="text" name="titulo" ></dd>
</dl>
<dl>
	<dt><label>Url:</label><br /><span>Ej: http://www.marcofbb.com.ar/</span></dt>
	<dd><input type="text" name="url" ></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar enlace?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio"> S�</label> <label><input name="online" type="radio" value="0" class="radio"> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Agregar!" class="btn_g"></p>
</fieldset>
</form>
</div>