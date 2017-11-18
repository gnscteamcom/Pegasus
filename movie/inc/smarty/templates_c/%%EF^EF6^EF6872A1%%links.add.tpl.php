<?php /* Smarty version 2.6.26, created on 2011-09-14 15:27:53
         compiled from modules/admin/links.add.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Agregar web amiga</legend>
<dl>
	<dt><label>Título:</label><br /><span>Nombre de la página web</span></dt>
	<dd><input type="text" name="titulo" ></dd>
</dl>
<dl>
	<dt><label>Url:</label><br /><span>Ej: http://www.marcofbb.com.ar/</span></dt>
	<dd><input type="text" name="url" ></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar enlace?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio"> Sí</label> <label><input name="online" type="radio" value="0" class="radio"> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Agregar!" class="btn_g"></p>
</fieldset>
</form>
</div>