<?php /* Smarty version 2.6.10, created on 2010-02-12 06:07:22
         compiled from adm/tour-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/tour-list.html', 6, false),array('function', 'cycle', 'adm/tour-list.html', 22, false),array('function', 'form_token', 'adm/tour-list.html', 29, false),)), $this); ?>
<div class="datadetail">
<p>Ver descripciones en: 
<?php $_from = $this->_tpl_vars['active_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
<a href="<?php echo $this->_tpl_vars['self']; ?>
?lang=<?php echo $this->_tpl_vars['lang']['lang_code'];  if ($this->_tpl_vars['RESULTS']['current_page'] > 1): ?>&amp;PageIndex=<?php echo $this->_tpl_vars['RESULTS']['current_page']*10-10;  endif; ?>"><?php echo $this->_tpl_vars['lang']['lang_name']; ?>
</a> 
<?php endforeach; else:  echo smarty_function_gt(array('s' => 'Ups, debería haber algún lenguaje'), $this);?>

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
			<th><?php echo smarty_function_gt(array('s' => 'Idiomas'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Acciones'), $this);?>
</th>
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
			<td><a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php?id=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Editar'), $this);?>
 '<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
</a></td>
			<td>
				<?php unset($this->_sections['nl']);
$this->_sections['nl']['name'] = 'nl';
$this->_sections['nl']['loop'] = is_array($_loop=$this->_tpl_vars['tours'][$this->_sections['n']['index']]['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nl']['show'] = true;
$this->_sections['nl']['max'] = $this->_sections['nl']['loop'];
$this->_sections['nl']['step'] = 1;
$this->_sections['nl']['start'] = $this->_sections['nl']['step'] > 0 ? 0 : $this->_sections['nl']['loop']-1;
if ($this->_sections['nl']['show']) {
    $this->_sections['nl']['total'] = $this->_sections['nl']['loop'];
    if ($this->_sections['nl']['total'] == 0)
        $this->_sections['nl']['show'] = false;
} else
    $this->_sections['nl']['total'] = 0;
if ($this->_sections['nl']['show']):

            for ($this->_sections['nl']['index'] = $this->_sections['nl']['start'], $this->_sections['nl']['iteration'] = 1;
                 $this->_sections['nl']['iteration'] <= $this->_sections['nl']['total'];
                 $this->_sections['nl']['index'] += $this->_sections['nl']['step'], $this->_sections['nl']['iteration']++):
$this->_sections['nl']['rownum'] = $this->_sections['nl']['iteration'];
$this->_sections['nl']['index_prev'] = $this->_sections['nl']['index'] - $this->_sections['nl']['step'];
$this->_sections['nl']['index_next'] = $this->_sections['nl']['index'] + $this->_sections['nl']['step'];
$this->_sections['nl']['first']      = ($this->_sections['nl']['iteration'] == 1);
$this->_sections['nl']['last']       = ($this->_sections['nl']['iteration'] == $this->_sections['nl']['total']);
?>
					<a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php?id=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
&amp;lang=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['langs'][$this->_sections['nl']['index']]['lang_code']; ?>
" class="<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['langs'][$this->_sections['nl']['index']]['filled']; ?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['langs'][$this->_sections['nl']['index']]['name']; ?>
</a>,
				<?php endfor; endif; ?>
			</td>
			<td class="acenter"><a href="<?php echo $this->_tpl_vars['self']; ?>
?id=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
&amp;remove&amp;<?php echo smarty_function_form_token(array('action' => "delete-tour",'type' => 'url'), $this);?>
" class="delete" title="<?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
 '<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
'" onclick="return confirm_msg()"><?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
</a></td>
		</tr>		
		<?php endfor; else: ?>
		<tr class="tr01">
			<td colspan="3" class="acenter"><?php echo smarty_function_gt(array('s' => 'No hay datos que mostrar'), $this);?>
 [<a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php"><?php echo smarty_function_gt(array('s' => 'Añadir uno nuevo'), $this);?>
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
</div>
<div class="datadetail">
<p class="updated">
<?php echo smarty_function_gt(array('s' => 'Los enlaces de color <span class="filled">azul</span> indican que el texto existe en ese idioma, caso contrario el enlace aparecerá de color <span class="unfilled">naranja</span>.'), $this);?>

</p>
</div>