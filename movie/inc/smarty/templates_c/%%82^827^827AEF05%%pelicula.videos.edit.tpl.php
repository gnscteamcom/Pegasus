<?php /* Smarty version 2.6.26, created on 2011-09-18 01:46:43
         compiled from modules/admin/pelicula.videos.edit.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<form action="" method="post">
<fieldset>
<legend>Agregar reproductor</legend>
<dl>
	<dt><label>Título:</label><br /><span>Texto a mostrar en la pestaña.</span></dt>
	<dd><input type="text" name="titulo" value="<?php echo $this->_tpl_vars['msMovie']['0']['v_titulo']; ?>
" /></dd>
</dl>
<dl>
	<dt><label>Source:</label><br /><span>Código HTML del reproductor.</span></dt>
	<dd><textarea name="source" rows="5" cols="50"><?php echo $this->_tpl_vars['msMovie']['0']['v_source']; ?>
</textarea></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar reproductor?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio" <?php if ($this->_tpl_vars['msMovie']['0']['v_online'] == 1): ?> checked="checked" <?php endif; ?>> Sí</label> <label><input name="online" type="radio" value="0" class="radio" <?php if ($this->_tpl_vars['msMovie']['0']['v_online'] == 0): ?> checked="checked" <?php endif; ?>> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Editar!" class="btn_g"></p>
</fieldset>
</form>
</div>