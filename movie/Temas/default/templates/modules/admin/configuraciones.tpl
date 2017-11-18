<div id="admin_panel">
<form action="" method="post">
<fieldset>
<legend>Configuraciones del sitio web</legend>
<dl>
	<dt><label>Titulo:</label><br /><span>Nombre de tu página web.</span></dt>
	<dd><input type="text" name="nombre" value="{$msConfig.datos.w_titulo}" ></dd>
</dl>
<dl>
	<dt><label>Slogan:</label><br /><span>Pequeña reseña de su web.</span></dt>
	<dd><input type="text" name="slogan" value="{$msConfig.datos.w_slogan}" ></dd>
</dl>
<dl>
	<dt><label>Dirección:</label><br /><span>Ingresa la url donde está alojada tu web, sin la última diagonal /</span></dt>
	<dd><input type="text" name="url" value="{$msConfig.datos.w_url}" ></dd>
</dl>
<dl>
	<dt><label>Tema:</label><br /><span>Nombre de la carpeta del theme.</span></dt>
	<dd><input type="text" name="tema" value="{$msConfig.datos.w_tema}" ></dd>
</dl>
<dl>
	<dt><label>Modo mantenimiento:</label><br><span>Esto hará al Sitio inaccesible a los usuarios. Si quiere, también puede introducir un breve mensaje (255 caracteres) para mostrar.</span></dt>
	<dd><label><input name="offline" type="radio" value="1" {if $msConfig.datos.w_offline == 1}checked="checked"{/if} class="radio"> Sí</label><label><input name="offline" type="radio" value="0" {if $msConfig.datos.w_offline == 0}checked="checked"{/if} class="radio"> No</label><br><input type="text" name="txtoff" value="{$msConfig.datos.w_txtoff}"></dd>
</dl>
<br />
{if $error != ""}<center>{$error}</center>{/if}
<p><input type="submit" name="enviar" value="Guardar!" class="btn_g"></p>
</fieldset>
</form>
</div>