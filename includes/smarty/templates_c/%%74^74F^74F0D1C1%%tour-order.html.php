<?php /* Smarty version 2.6.10, created on 2010-04-11 23:39:49
         compiled from adm/tour-order.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/tour-order.html', 7, false),array('function', 'form_token', 'adm/tour-order.html', 15, false),)), $this); ?>
<script type="text/javascript" src="http://tesorosdelperu.info/media/js/targetorder.js.php"></script>
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
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post">
<p class="submit" style="text-align: right">
	<input type="submit" name="save-order" value="<?php echo smarty_function_gt(array('s' => 'Guardar los cambios hechos'), $this);?>
" class="bold" />
	<?php echo smarty_function_form_token(array('action' => "tour-order"), $this);?>

</p>
<table class="targetorder datalist" summary="<?php echo smarty_function_gt(array('s' => 'Tours List in'), $this);?>
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
		<tr id="tour_<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
">
			<td>
			<input type="hidden" name="tour[]" value="<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
" />
			<a href="tour.php?id=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Editar'), $this);?>
 '<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
</a>
			</td>
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
					<a href="tour.php?id=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['tourid']; ?>
&amp;lang=<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['langs'][$this->_sections['nl']['index']]['lang_code']; ?>
" class="<?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['langs'][$this->_sections['nl']['index']]['filled']; ?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['langs'][$this->_sections['nl']['index']]['name']; ?>
</a>,
				<?php endfor; endif; ?>
			</td>			
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
</form>

</div>
<div class="datadetail">
<p class="updated">
<?php echo smarty_function_gt(array('s' => 'Los enlaces de color <span class="filled">azul</span> indican que el texto existe en ese idioma, caso contrario el enlace aparecerá de color <span class="unfilled">naranja</span>.'), $this);?>

</p>
</div>