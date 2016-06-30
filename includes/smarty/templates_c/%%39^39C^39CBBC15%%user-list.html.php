<?php /* Smarty version 2.6.29, created on 2016-07-01 00:38:04
         compiled from adm/user-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/user-list.html', 1, false),array('function', 'cycle', 'adm/user-list.html', 14, false),array('modifier', 'date_format', 'adm/user-list.html', 18, false),)), $this); ?>
<table class="datalist" summary="<?php echo smarty_function_gt(array('s' => 'Listado de Usuarios'), $this);?>
" id="lista">
	<caption><?php echo smarty_function_gt(array('s' => 'Listado de Usuarios'), $this);?>
</caption>
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'E-mail'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Tipo'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Registrado'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Acciones'), $this);?>
</th>
		</tr>
	</thead>
	<tbody>
		<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "tr01, tr02"), $this);?>
">
			<td><a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php?id=<?php echo $this->_tpl_vars['users'][$this->_sections['n']['index']]['userid']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Editar'), $this);?>
 '<?php echo $this->_tpl_vars['users'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['users'][$this->_sections['n']['index']]['name']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['users'][$this->_sections['n']['index']]['email']; ?>
</td>
			<td><?php echo $this->_tpl_vars['users'][$this->_sections['n']['index']]['utname']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['users'][$this->_sections['n']['index']]['regdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %B %Y %H:%m") : smarty_modifier_date_format($_tmp, "%d %B %Y %H:%m")); ?>
</td>
			<td class="acenter">
				<?php if ($this->_tpl_vars['users'][$this->_sections['n']['index']]['userid'] != '1'): ?>
				<a href="<?php echo $this->_tpl_vars['self']; ?>
?id=<?php echo $this->_tpl_vars['users'][$this->_sections['n']['index']]['userid']; ?>
&remove" class="delete" title="<?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
 '<?php echo $this->_tpl_vars['users'][$this->_sections['n']['index']]['name']; ?>
'" onclick="return confirm_msg()"><?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
</a>
				<?php else: ?>
				<?php echo smarty_function_gt(array('s' => 'Predeterminado'), $this);?>

				<?php endif; ?>
			</td>
		</tr>		
		<?php endfor; else: ?>
		<tr class="tr01">
			<td colspan="5" class="acenter"><?php echo smarty_function_gt(array('s' => 'No hay datos que mostrar'), $this);?>
 [<a href="#name"><?php echo smarty_function_gt(array('s' => 'Añadir uno nuevo'), $this);?>
</a>]</td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>