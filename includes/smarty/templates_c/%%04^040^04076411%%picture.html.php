<?php /* Smarty version 2.6.10, created on 2010-02-23 18:03:39
         compiled from adm/picture.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wrap', 'adm/picture.html', 3, false),array('function', 'gt', 'adm/picture.html', 5, false),array('function', 'html_options', 'adm/picture.html', 7, false),)), $this); ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm" onsubmit="return v.exec()" enctype="multipart/form-data">
	<fieldset class="datadetail">
		<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>		
		<p>
			<label for="t2"><?php echo smarty_function_gt(array('s' => 'Tipo'), $this);?>
:</label><br />
			<select name="t2" id="t2" onchange="document.getElementById('t').value = this.value">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tpic'],'selected' => $this->_tpl_vars['picture']['pfor']), $this);?>

			</select>
		</p>

		<p><label for="name" id="lname"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
:</label> <br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['picture']['name']; ?>
" size="40" maxlength="100" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>

		<p><label for="pic" id="lpic"><?php echo smarty_function_gt(array('s' => 'Imagen'), $this);?>
:</label> <br />
		<input type="file" name="pic" id="pic" size="45" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>

		<p class="submit">
			<input type="submit" name="save" id="save" class="bold" value="<?php echo smarty_function_gt(array('s' => 'Guardar Imagen'), $this);?>
" />
			<?php if ($this->_tpl_vars['picture']): ?>
			<input type="submit" name="remove" id="remove" value="<?php echo smarty_function_gt(array('s' => 'Eliminar Imagen'), $this);?>
" onclick="return confirm_msg();" />
			<?php endif; ?>
			<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['picture']['picid']; ?>
" />
			<input type="hidden" name="t" id="t" value="<?php echo $this->_tpl_vars['t']; ?>
" />
		</p>		
		<?php if ($this->_tpl_vars['picture']): ?>
			<p>
			<a href="<?php echo $this->_tpl_vars['picsurl']; ?>
normal_<?php echo $this->_tpl_vars['picture']['picname']; ?>
" title="<?php echo $this->_tpl_vars['picture']['name']; ?>
'" rel="lightbox"><img src="<?php echo $this->_tpl_vars['picsurl']; ?>
thumb_<?php echo $this->_tpl_vars['picture']['picname']; ?>
" alt="<?php echo $this->_tpl_vars['picture']['picname']; ?>
" /></a><br />
			</p>
		<?php endif; ?>
	</fieldset>
</form>

<?php if ($this->_tpl_vars['picture']): ?>
<div class="datadetail">
<p class="updated">
	<?php echo smarty_function_gt(array('s' => 'Haz click en la imágen para agrandar el tamaño.'), $this);?>

</p>
</div>
<?php endif; ?>

<script type="text/javascript">
	document.getElementById('name').focus();
	<?php echo '
	var a_fields = {
		\'name\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'t\': \'lname\',   // id of the element to highlight if input not validated
			\'mn\': 2
		}';  if (! $this->_tpl_vars['picture']):  echo ',
		\'pic\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Picture'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'t\': \'lpic\'
		}';  endif;  echo '
		
	},
	o_config = {
		\'to_disable\' : [\'save\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	'; ?>

</script>