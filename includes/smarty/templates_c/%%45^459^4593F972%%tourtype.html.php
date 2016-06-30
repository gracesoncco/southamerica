<?php /* Smarty version 2.6.10, created on 2010-02-13 06:13:03
         compiled from adm/tourtype.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wrap', 'adm/tourtype.html', 3, false),array('function', 'gt', 'adm/tourtype.html', 5, false),array('function', 'html_options', 'adm/tourtype.html', 14, false),)), $this); ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm" onsubmit="return v.exec()">
	<fieldset class="datadetail">		
		<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
		<?php if ($this->_tpl_vars['tourtype']): ?>
		<p><strong><?php echo smarty_function_gt(array('s' => 'Agregar descripción en'), $this);?>
</strong>:
			<?php unset($this->_sections['nl']);
$this->_sections['nl']['name'] = 'nl';
$this->_sections['nl']['loop'] = is_array($_loop=$this->_tpl_vars['tourtype']['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
.php?id=<?php echo $this->_tpl_vars['tourtype']['typeid']; ?>
&amp;lang=<?php echo $this->_tpl_vars['tourtype']['langs'][$this->_sections['nl']['index']]['lang_code']; ?>
" class="<?php echo $this->_tpl_vars['tourtype']['langs'][$this->_sections['nl']['index']]['filled']; ?>
"><?php echo $this->_tpl_vars['tourtype']['langs'][$this->_sections['nl']['index']]['name']; ?>
</a>,
			<?php endfor; endif; ?>
		</p>
		<?php endif; ?>
		
		<p><label for="lang"><?php echo smarty_function_gt(array('s' => 'Idioma'), $this);?>
:</label><br />
		<select name="lang" id="lang">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['active_langs'],'selected' => $this->_tpl_vars['lang'],'display_m' => 'lang_name','value_m' => 'lang_code'), $this);?>

		</select>
		</p>
		<p><label for="name" id="lname"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
:</label><br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['tourtype']['name']; ?>
" size="40" maxlength="100" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span></p>		

		<p class="submit">
			<input type="submit" name="save" id="save" class="bold" value="<?php echo smarty_function_gt(array('s' => 'Guardar Tipo'), $this);?>
" />
			<?php if ($this->_tpl_vars['tourtype']): ?>
			<input type="submit" name="remove" id="remove" value="<?php echo smarty_function_gt(array('s' => 'Eliminar Tipo'), $this);?>
" onclick="return confirm_msg()" />
			<?php endif; ?>
			<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
			<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['tourtype']['typeid']; ?>
" />
		</p>
	</fieldset>
</form>
<div class="datadetail">
<p class="updated">
<?php echo smarty_function_gt(array('s' => 'Los enlaces de color <span class="filled">azul</span> indican que el texto existe en ese idioma, caso contrario el enlace aparecerá de color <span class="unfilled">naranja</span>.'), $this);?>

</p>
</div>
<script type="text/javascript">
	document.getElementById('name').focus();
	<?php echo '
	var a_fields = {
		\'name\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'t\': \'lname\',   // id of the element to highlight if input not validated
			\'mn\': 2
		}
	},
	o_config = {
		\'to_disable\' : [\'save\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	'; ?>

</script>