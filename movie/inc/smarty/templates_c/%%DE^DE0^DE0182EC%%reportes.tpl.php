<?php /* Smarty version 2.6.26, created on 2011-09-18 21:04:10
         compiled from modules/admin/reportes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'modules/admin/reportes.tpl', 14, false),)), $this); ?>
<div id="admin_panel">
<table cellpadding="0" cellspacing="0" border="0" class="admin_table" width="100%" align="center">
	<thead>
		<tr>
			<th width="11%">ID</th>
			<th width="64%">Nombre</th>
			<th width="25%">Acciones</th>
		</tr>
	</thead>
	<tbody>
        <?php $_from = $this->_tpl_vars['msMovie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['m']['p_id']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['m']['p_titulo'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
			<td><a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/?a=pedit&pid=<?php echo $this->_tpl_vars['m']['p_id']; ?>
" title="Editar"><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/editar.png" /></a> <a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/?a=pvideos&pid=<?php echo $this->_tpl_vars['m']['p_id']; ?>
" title="Reproductores"><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/video.png" /></a> <a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/?a=plink&pid=<?php echo $this->_tpl_vars['m']['p_id']; ?>
" title="Enlaces"><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/link.png" /></a></td>
		</tr>
        <?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php if ($this->_tpl_vars['msPag'] != ""): ?>
<!--<nav>--> 
<ul class="nav bgdeg4 bold brdr10px bxshd2 clr fs18px lnht30px liasbrdr10px lstinl pd10px txt_cen white"> 
<?php echo $this->_tpl_vars['msPag']; ?>
 
</ul> 
<!--</nav>--> 
<?php endif; ?>
</div>