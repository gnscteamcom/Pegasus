<?php /* Smarty version 2.6.26, created on 2011-09-14 18:06:57
         compiled from modules/admin/links.edit.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['msData'] != ""): ?>
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Editar web amiga</legend>
<dl>
	<dt><label>Título:</label><br /><span>Nombre de la página web</span></dt>
	<dd><input type="text" name="titulo" value="<?php echo $this->_tpl_vars['msData']['0']['l_nombre']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Url:</label><br /><span>Ej: http://www.marcofbb.com.ar/</span></dt>
	<dd><input type="text" name="url" value="<?php echo $this->_tpl_vars['msData']['0']['l_url']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Mostrar:</label><br /><span>Mostrar enlace?</span></dt>
	<dd><label><input name="online" type="radio" value="1" class="radio" <?php if ($this->_tpl_vars['msData']['0']['l_online'] == 1): ?> checked="checked" <?php endif; ?>> Sí</label> <label><input name="online" type="radio" value="0" class="radio" <?php if ($this->_tpl_vars['msData']['0']['l_online'] == 0): ?> checked="checked" <?php endif; ?>> No</label></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Editar!" class="btn_g"></p>
</fieldset>
</form>
<?php else: ?><center>El link que usted quiere editar no existe.</center><br /><?php endif; ?>
</div>