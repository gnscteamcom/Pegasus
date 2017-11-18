<?php /* Smarty version 2.6.26, created on 2011-09-17 21:34:40
         compiled from modules/admin/pelicula.edit.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['msMovie'] != ""): ?>
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Agregar película</legend>
<dl>
	<dt><label>Título:</label><br /><span>Nombre de la película</span></dt>
	<dd><input type="text" name="titulo" value="<?php echo $this->_tpl_vars['msMovie']['0']['p_titulo']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Caraptula:</label><br /><span>Imagen de la película, dejar vacio para conservar actual. Tamaño: 196x258</span></dt>
	<dd><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/files/uploads/<?php echo $this->_tpl_vars['msMovie']['0']['p_id']; ?>
.jpg"  /><br /><br /><input name="imagen" type="file" id="imagen" size="35" /></dd>
</dl>
<dl>
	<dt><label>Año:</label><br /><span>Año que se extreno la película</span></dt>
	<dd><input name="anio" type="text" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['msMovie']['0']['p_ano']; ?>
" >
	</dd>
</dl>
<dl>
	<dt><label>Idioma:</label><br /><span>Idioma en el que se encuentra la película</span></dt>
	<dd><input type="text" name="idioma" value="<?php echo $this->_tpl_vars['msMovie']['0']['p_idioma']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Calidad:</label><br /><span>Calidad en el que se encuentra la película</span></dt>
	<dd><input type="text" name="calidad" value="<?php echo $this->_tpl_vars['msMovie']['0']['p_calidad']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Estreno:</label><br /><span>¿La película se estreno hace poco?</span></dt>
	<dd><label><input name="estreno" type="radio" value="1" class="radio" <?php if ($this->_tpl_vars['msMovie']['0']['p_estreno'] == 1): ?> checked="checked" <?php endif; ?>> Sí</label> <label><input name="estreno" type="radio" value="0" class="radio" <?php if ($this->_tpl_vars['msMovie']['0']['p_estreno'] == 0): ?> checked="checked" <?php endif; ?>> No</label></dd>
</dl>
<dl>
	<dt><label>Online:</label><br /><span>¿Mostrar la película en el index/buscador?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio" <?php if ($this->_tpl_vars['msMovie']['0']['p_online'] == 1): ?> checked="checked" <?php endif; ?>> Sí</label> <label><input name="online" type="radio" value="0" class="radio" <?php if ($this->_tpl_vars['msMovie']['0']['p_online'] == 0): ?> checked="checked" <?php endif; ?>> No</label></dd>
</dl>
<dl>
	<dt><label>Género:</label><br /><span>Elige el género de la película</span></dt>
	<dd><select name="genero"><option value="">Seleccionar un género</option><?php $_from = $this->_tpl_vars['msGeneros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['g']):
?><option value="<?php echo $this->_tpl_vars['g']['g_id']; ?>
" <?php if ($this->_tpl_vars['msMovie']['0']['p_genero'] == $this->_tpl_vars['g']['g_id']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['g']['g_nombre']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></dd>
</dl>
<dl>
	<dt><label>Sinopsis:</label><br /><span>Escribe una breve reseña sobree la película</span></dt>
	<dd><textarea name="sinopsis" rows="5" cols="50"><?php echo $this->_tpl_vars['msMovie']['0']['p_sinopsis']; ?>
</textarea></dd>
</dl>
<hr />
<dl>
	<dt><label>Hits:</label><br /><span>Veces visualizada esta película</span></dt>
	<dd><input type="text" name="hits" value="<?php echo $this->_tpl_vars['msMovie']['0']['p_hits']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Votos:</label><br /><span>Suma y resta de los votos de la película</span></dt>
	<dd><input type="text" name="votos" value="<?php echo $this->_tpl_vars['msMovie']['0']['p_votos']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Reportes:</label><br /><span>¿Se ha reportado un problema con esta película?</span></dt>
	<dd><input type="text" name="reports" value="<?php echo $this->_tpl_vars['msMovie']['0']['p_reports']; ?>
" ></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Editar película!" class="btn_g"></p>
</fieldset>
</form>
<?php else: ?>
<center>La película a editar no existe.</center>
<?php endif; ?>
</div>