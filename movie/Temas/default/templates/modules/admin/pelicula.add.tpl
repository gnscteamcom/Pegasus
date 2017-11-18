<div id="admin_panel">
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Agregar película</legend>
<dl>
	<dt><label>Título:</label><br /><span>Nombre de la película</span></dt>
	<dd><input type="text" name="titulo" ></dd>
</dl>
<dl>
	<dt><label>Caraptula:</label><br /><span>Imagen de la película. Tamaño: 196x258</span></dt>
	<dd><input name="imagen" type="file" id="imagen" size="35" /></dd>
</dl>
<dl>
	<dt><label>Año:</label><br /><span>Año que se extreno la película</span></dt>
	<dd><input name="anio" type="text" size="4" maxlength="4" >
	</dd>
</dl>
<dl>
	<dt><label>Idioma:</label><br /><span>Idioma en el que se encuentra la película</span></dt>
	<dd><input type="text" name="idioma" ></dd>
</dl>
<dl>
	<dt><label>Calidad:</label><br /><span>Calidad en el que se encuentra la película</span></dt>
	<dd><input type="text" name="calidad" ></dd>
</dl>
<dl>
	<dt><label>Estreno:</label><br /><span>¿La película se estreno hace poco?</span></dt>
	<dd><label><input name="estreno" type="radio" value="1" class="radio"> Sí</label> <label><input name="estreno" type="radio" value="0" class="radio"> No</label></dd>
</dl>
<dl>
	<dt><label>Online:</label><br /><span>¿Mostrar la película en el index/buscador?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio"> Sí</label> <label><input name="online" type="radio" value="0" class="radio"> No</label></dd>
</dl>
<dl>
	<dt><label>Género:</label><br /><span>Elige el género de la película</span></dt>
	<dd><select name="genero"><option value="">Seleccionar un género</option>{foreach from=$msGeneros item=g}<option value="{$g.g_id}">{$g.g_nombre}</option>{/foreach}</select></dd>
</dl>
<dl>
	<dt><label>Sinopsis:</label><br /><span>Escribe una breve reseña sobree la película</span></dt>
	<dd><textarea name="sinopsis" rows="5" cols="50"></textarea></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Agregar película!" class="btn_g"></p>
</fieldset>
</form>
</div>