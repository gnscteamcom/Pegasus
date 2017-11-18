<div id="admin_panel">
{if $msData != ""}
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Editar web amiga</legend>
<dl>
	<dt><label>Título:</label><br /><span>Nombre de la página web</span></dt>
	<dd><input type="text" name="titulo" value="{$msData.0.l_nombre}" ></dd>
</dl>
<dl>
	<dt><label>Url:</label><br /><span>Ej: http://www.marcofbb.com.ar/</span></dt>
	<dd><input type="text" name="url" value="{$msData.0.l_url}" ></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar enlace?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio" {if $msData.0.l_online == 1} checked="checked" {/if}> Sí</label> <label><input name="online" type="radio" value="0" class="radio" {if $msData.0.l_online == 0} checked="checked" {/if}> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Editar!" class="btn_g"></p>
</fieldset>
</form>
{else}<center>El link que usted quiere editar no existe.</center><br />{/if}
</div>