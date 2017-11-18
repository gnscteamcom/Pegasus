<?php /* Smarty version 2.6.26, created on 2017-01-16 18:01:04
         compiled from modules/admin/links.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/admin/links.tpl', 14, false),)), $this); ?>
<div id="admin_panel">
<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
	<thead>
		<tr>
			<th width="11%">ID</th>
			<th width="64%">Nome</th>
			<th width="25%">Ações</th>
		</tr>
	</thead>
	<tbody>
        <?php $_from = $this->_tpl_vars['msData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['l']['l_id']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['l']['l_nombre'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
			<td><a href="<?php echo $this->_tpl_vars['l']['l_url']; ?>
"><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/ver.png" /></a> <a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/?a=linksedit&wid=<?php echo $this->_tpl_vars['l']['l_id']; ?>
" title="Editar"><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/editar.png" /></a> <a <?php echo 'onclick="if(confirm(\'Esta seguro que desea continuar?\') == false){return false;}"'; ?>
 href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/?a=linksdel&wid=<?php echo $this->_tpl_vars['l']['l_id']; ?>
" title="Eliminar"><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/close.png" /></a></td>
		</tr>
        <?php endforeach; endif; unset($_from); ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3" ><p style="float:right;margin:5px;"><input type="button" onclick="location.href = '<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/?a=linksadd'" class="btn_g" value="Agregar Nuevo!"></p></th>
		</tr>
	</tfoot>
</table>
</div>