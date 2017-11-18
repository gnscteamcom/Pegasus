<?php /* Smarty version 2.6.26, created on 2011-09-18 01:28:46
         compiled from modules/admin/pelicula.videos.add.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<form action="" method="post">
<fieldset>
<legend>Agregar reproductor</legend>
<dl>
	<dt><label>Título:</label><br /><span>Texto a mostrar en la pestaña.</span></dt>
	<dd><input type="text" name="titulo" /></dd>
</dl>
<dl>
	<dt><label>Source:</label><br /><span>Código HTML del reproductor.</span></dt>
	<dd><textarea name="source" rows="5" cols="50"></textarea></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar reproductor?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio"> Sí</label> <label><input name="online" type="radio" value="0" class="radio"> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Agregar!" class="btn_g"></p>
</fieldset>
</form>
</div>