<?php /* Smarty version 2.6.26, created on 2011-09-17 22:30:48
         compiled from modules/admin/pelicula.links.tpl */ ?>
<div id="admin_panel">
<?php if ($this->_tpl_vars['msMovie'] != ""): ?>
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<form action="" method="post">
<fieldset>
<legend>Controlar publicidad</legend>
<dl>
	<dt><label>Enlaces de descarga:</label><br /><span>El script detecta automaticamente las URL, poner una URL por línea.</span></dt>
	<dd><textarea name="links" rows="5" cols="50"><?php echo $this->_tpl_vars['msMovie']['0']['d_links']; ?>
</textarea></dd>
</dl>
<dl>
	<dt><label>Activar botón:</label><br><span>Mostrar u ocultar botón descargar.</span></dt>
	<dd><label><input name="offline" type="radio" value="1" <?php if ($this->_tpl_vars['msMovie']['0']['d_online'] == 1): ?>checked="checked"<?php endif; ?> class="radio"> Sí</label><label><input name="offline" type="radio" value="0" <?php if ($this->_tpl_vars['msMovie']['0']['d_online'] == 0): ?>checked="checked"<?php endif; ?> class="radio"> No</label></dd>
</dl>
<br />
<p><input type="button" name="enviar" value="Eliminar!" <?php echo 'onclick="if(confirm(\'Esta seguro que desea continuar?\') == false){return false;} else { location.href = \''; ?>
<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/?a=plink&b=delet&pid=<?php echo $this->_tpl_vars['msMovie']['0']['p_id']; ?>
' <?php echo '}"'; ?>
 class="btn_r" style="margin-left:10px;" /><input type="submit" name="enviar" value="Guardar!" class="btn_g"></p>
</fieldset>
</form>
<?php else: ?>
<form action="" method="post">
<fieldset>
<p style=" text-align:center; margin-right:40%;"><input type="submit" name="enviar" value="Activar la descarga" class="btn_g"></p>
</fieldset>
</form>
<?php endif; ?>
</div>