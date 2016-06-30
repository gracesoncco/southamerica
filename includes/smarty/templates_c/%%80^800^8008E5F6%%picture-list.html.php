<?php /* Smarty version 2.6.10, created on 2010-02-12 06:07:46
         compiled from adm/picture-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/picture-list.html', 4, false),array('function', 'html_options', 'adm/picture-list.html', 6, false),)), $this); ?>
<fieldset id="lista" class="datadetail">
	<fieldset>
		<form name="pfrm" id="pfrm" action="<?php echo $this->_tpl_vars['self']; ?>
" method="get">
		<label for="t3" class="noblock"><?php echo smarty_function_gt(array('s' => 'Filtrar imágenes'), $this);?>
:</label>
			<select name="t" id="t3">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tpic'],'selected' => $this->_tpl_vars['t']), $this);?>

			</select>
			<input type="submit" name="psubmit" id="psubmit" value="<?php echo smarty_function_gt(array('s' => 'Mostrar'), $this);?>
" />
		</form>
		</fieldset>
	
	<ul id="image-gallery">
	<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['pictures']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<li>
			<a href="<?php echo $this->_tpl_vars['picsurl']; ?>
normal_<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['picname']; ?>
" title="<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['name']; ?>
" rel="lightbox1">
			<img src="<?php echo $this->_tpl_vars['picsurl']; ?>
thumb_<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['picname']; ?>
" alt="<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['name']; ?>
" /></a><br />
		<a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php?id=<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['picid']; ?>
&amp;t=<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['pfor']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Editar'), $this);?>
 '<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['name']; ?>
</a>
		<a href="<?php echo $this->_tpl_vars['self']; ?>
?id=<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['picid']; ?>
&amp;remove" title="<?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
 '<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['name']; ?>
'" onclick="return confirm_msg();"><img src="<?php echo $this->_tpl_vars['media_url']; ?>
admin/images/delete.png" alt="<?php echo $this->_tpl_vars['pictures'][$this->_sections['n']['index']]['name']; ?>
" class="nb" /></a>	
		</li>
	<?php endfor; else: ?>
		<li><?php echo smarty_function_gt(array('s' => 'No hay imágenes'), $this);?>
</li>
	<?php endif; ?>
	</ul>
	
</fieldset>

<?php if ($this->_tpl_vars['pictures']): ?>
<div class="datadetail">
<p class="updated">
	<?php echo smarty_function_gt(array('s' => 'Haz click en la imágen para agrandar el tamaño.'), $this);?>

</p>
</div>
<?php endif;  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>