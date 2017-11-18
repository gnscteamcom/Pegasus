<div id="admin_panel">
{if $msMovie != ""}
{if $error != ""}<center>{$error}</center>{/if}
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Agregar pel�cula</legend>
<dl>
	<dt><label>T�tulo:</label><br /><span>Nombre de la pel�cula</span></dt>
	<dd><input type="text" name="titulo" value="{$msMovie.0.p_titulo}" ></dd>
</dl>
<dl>
	<dt><label>Caraptula:</label><br /><span>Imagen de la pel�cula, dejar vacio para conservar actual. Tama�o: 196x258</span></dt>
	<dd><img src="{$msConfig.datos.w_url}/files/uploads/{$msMovie.0.p_id}.jpg"  /><br /><br /><input name="imagen" type="file" id="imagen" size="35" /></dd>
</dl>
<dl>
	<dt><label>A�o:</label><br /><span>A�o que se extreno la pel�cula</span></dt>
	<dd><input name="anio" type="text" size="4" maxlength="4" value="{$msMovie.0.p_ano}" >
	</dd>
</dl>
<dl>
	<dt><label>Idioma:</label><br /><span>Idioma en el que se encuentra la pel�cula</span></dt>
	<dd><input type="text" name="idioma" value="{$msMovie.0.p_idioma}" ></dd>
</dl>
<dl>
	<dt><label>Calidad:</label><br /><span>Calidad en el que se encuentra la pel�cula</span></dt>
	<dd><input type="text" name="calidad" value="{$msMovie.0.p_calidad}" ></dd>
</dl>
<dl>
	<dt><label>Estreno:</label><br /><span>�La pel�cula se estreno hace poco?</span></dt>
	<dd><label><input name="estreno" type="radio" value="1" class="radio" {if $msMovie.0.p_estreno == 1} checked="checked" {/if}> S�</label> <label><input name="estreno" type="radio" value="0" class="radio" {if $msMovie.0.p_estreno == 0} checked="checked" {/if}> No</label></dd>
</dl>
<dl>
	<dt><label>Online:</label><br /><span>�Mostrar la pel�cula en el index/buscador?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio" {if $msMovie.0.p_online == 1} checked="checked" {/if}> S�</label> <label><input name="online" type="radio" value="0" class="radio" {if $msMovie.0.p_online == 0} checked="checked" {/if}> No</label></dd>
</dl>
<dl>
	<dt><label>G�nero:</label><br /><span>Elige el g�nero de la pel�cula</span></dt>
	<dd><select name="genero"><option value="">Seleccionar un g�nero</option>{foreach from=$msGeneros item=g}<option value="{$g.g_id}" {if $msMovie.0.p_genero == $g.g_id} selected="selected" {/if}>{$g.g_nombre}</option>{/foreach}</select></dd>
</dl>
<dl>
	<dt><label>Sinopsis:</label><br /><span>Escribe una breve rese�a sobree la pel�cula</span></dt>
	<dd><textarea name="sinopsis" rows="5" cols="50">{$msMovie.0.p_sinopsis}</textarea></dd>
</dl>
<hr />
<dl>
	<dt><label>Hits:</label><br /><span>Veces visualizada esta pel�cula</span></dt>
	<dd><input type="text" name="hits" value="{$msMovie.0.p_hits}" ></dd>
</dl>
<dl>
	<dt><label>Votos:</label><br /><span>Suma y resta de los votos de la pel�cula</span></dt>
	<dd><input type="text" name="votos" value="{$msMovie.0.p_votos}" ></dd>
</dl>
<dl>
	<dt><label>Reportes:</label><br /><span>�Se ha reportado un problema con esta pel�cula?</span></dt>
	<dd><input type="text" name="reports" value="{$msMovie.0.p_reports}" ></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Editar pel�cula!" class="btn_g"></p>
</fieldset>
</form>
{else}
<center>La pel�cula a editar no existe.</center>
{/if}
</div>