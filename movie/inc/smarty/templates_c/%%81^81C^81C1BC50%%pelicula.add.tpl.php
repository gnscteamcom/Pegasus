<?php /* Smarty version 2.6.26, created on 2011-09-17 22:30:11
         compiled from modules/admin/pelicula.add.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
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
	<dd><select name="genero"><option value="">Seleccionar un género</option><?php $_from = $this->_tpl_vars['msGeneros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['g']):
?><option value="<?php echo $this->_tpl_vars['g']['g_id']; ?>
"><?php echo $this->_tpl_vars['g']['g_nombre']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></dd>
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