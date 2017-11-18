<?php /* Smarty version 2.6.26, created on 2011-09-12 18:13:33
         compiled from modules/admin/configuraciones.tpl */ ?>
<div id="admin_panel">
<form action="" method="post">
<fieldset>
<legend>Configuraciones del sitio web</legend>
<dl>
	<dt><label>Titulo:</label><br /><span>Nombre de tu página web.</span></dt>
	<dd><input type="text" name="nombre" value="<?php echo $this->_tpl_vars['msConfig']['datos']['w_titulo']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Slogan:</label><br /><span>Pequeña reseña de su web.</span></dt>
	<dd><input type="text" name="slogan" value="<?php echo $this->_tpl_vars['msConfig']['datos']['w_slogan']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Dirección:</label><br /><span>Ingresa la url donde está alojada tu web, sin la última diagonal /</span></dt>
	<dd><input type="text" name="url" value="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Tema:</label><br /><span>Nombre de la carpeta del theme.</span></dt>
	<dd><input type="text" name="tema" value="<?php echo $this->_tpl_vars['msConfig']['datos']['w_tema']; ?>
" ></dd>
</dl>
<dl>
	<dt><label>Modo mantenimiento:</label><br><span>Esto hará al Sitio inaccesible a los usuarios. Si quiere, también puede introducir un breve mensaje (255 caracteres) para mostrar.</span></dt>
	<dd><label><input name="offline" type="radio" value="1" <?php if ($this->_tpl_vars['msConfig']['datos']['w_offline'] == 1): ?>checked="checked"<?php endif; ?> class="radio"> Sí</label><label><input name="offline" type="radio" value="0" <?php if ($this->_tpl_vars['msConfig']['datos']['w_offline'] == 0): ?>checked="checked"<?php endif; ?> class="radio"> No</label><br><input type="text" name="txtoff" value="<?php echo $this->_tpl_vars['msConfig']['datos']['w_txtoff']; ?>
"></dd>
</dl>
<br />
<?php if ($this->_tpl_vars['error'] != ""): ?><center><?php echo $this->_tpl_vars['error']; ?>
</center><?php endif; ?>
<p><input type="submit" name="enviar" value="Guardar!" class="btn_g"></p>
</fieldset>
</form>
</div>