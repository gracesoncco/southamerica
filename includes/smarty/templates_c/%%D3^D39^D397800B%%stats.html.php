<?php /* Smarty version 2.6.10, created on 2010-02-12 22:20:20
         compiled from adm/stats.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/stats.html', 2, false),array('function', 'cycle', 'adm/stats.html', 22, false),)), $this); ?>
<div class="datadetail">
<p><?php echo smarty_function_gt(array('s' => 'Ver los tours más visitados en'), $this);?>
: 
<?php $_from = $this->_tpl_vars['active_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['language']):
?>
<a href="<?php echo $this->_tpl_vars['self']; ?>
?lang=<?php echo $this->_tpl_vars['language']['lang_code']; ?>
"><?php echo $this->_tpl_vars['language']['lang_name']; ?>
</a>
<?php endforeach; else:  echo smarty_function_gt(array('s' => 'Ops!, debería haber algún lenguaje'), $this);?>

<?php endif; unset($_from); ?></p>
</div>

<div class="datadetail">
<table class="datalist" summary="<?php echo smarty_function_gt(array('s' => 'Tours List in'), $this);?>
 <?php echo $this->_tpl_vars['lang_name']; ?>
" id="lista">
	<caption><?php echo smarty_function_gt(array('s' => 'Lista de Tours'), $this);?>
</caption>
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
</th>
			<th><a href="<?php echo $this->_tpl_vars['self']; ?>
?comment=<?php echo $this->_tpl_vars['comment_order']; ?>
&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'N° Comentarios'), $this);?>
</a></th>
			<th><a href="<?php echo $this->_tpl_vars['self']; ?>
?visit=<?php echo $this->_tpl_vars['visit_order']; ?>
&amp;lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'N° Visitas'), $this);?>
</a></th>
		</tr>
	</thead>
	<tbody>
		<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['tours']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<td><a href="tour.php?id=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Editar'), $this);?>
 '<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['comment_count']; ?>
</td>
			<td><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['visit_count']; ?>
</td>
		</tr>		
		<?php endfor; else: ?>
		<tr class="tr01">
			<td colspan="3" class="acenter"><?php echo smarty_function_gt(array('s' => 'No hay datos que mostrar'), $this);?>
</td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>