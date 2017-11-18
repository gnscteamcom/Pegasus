<?php /* Smarty version 2.6.26, created on 2011-09-12 14:21:03
         compiled from modules/admin/publicidad.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<form action="" method="post">
<fieldset>
<legend>Controlar publicidad</legend>
<dl>
	<dt><label>Banner 728x90:</label></dt>
	<dd><textarea name="728x90" rows="5" cols="50"><?php echo $this->_tpl_vars['msConfig']['ads']['728x90']; ?>
</textarea></dd>
</dl>
<dl>
	<dt><label>Banner 300x250:</label></dt>
	<dd><textarea name="300x250" rows="5" cols="50"><?php echo $this->_tpl_vars['msConfig']['ads']['300x250']; ?>
</textarea></dd>
</dl>
<dl>
	<dt><label>Banner 120x600:</label></dt>
	<dd><textarea name="120x600" rows="5" cols="50"><?php echo $this->_tpl_vars['msConfig']['ads']['120x600']; ?>
</textarea></dd>
</dl>
<dl>
	<dt><label>Facebook:</label><br /><span>Link de tu página me gusta en facebook.</span></dt>
	<dd><input name="fb" type="text" value="<?php echo $this->_tpl_vars['msConfig']['ads']['fb']; ?>
"></dd>
</dl>
<br />
<p><input type="submit" name="enviar" value="Guardar!" class="btn_g"></p>
</fieldset>
</form>
</div>