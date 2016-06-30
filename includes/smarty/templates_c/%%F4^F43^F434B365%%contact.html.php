<?php /* Smarty version 2.6.10, created on 2016-06-23 00:02:09
         compiled from contact.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'contact.html', 1, false),array('function', 'rewrite_link', 'contact.html', 1, false),array('function', 'html_options', 'contact.html', 17, false),)), $this); ?>
<h1><?php if ($this->_tpl_vars['tour']):  echo smarty_function_gt(array('s' => 'Ask for more information about'), $this);?>
 <a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tour']['name']; ?>
</a><?php else:  echo smarty_function_gt(array('s' => 'Contact Us'), $this); endif; ?></h1>

<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" 	id="frm" onsubmit="return v.exec()">
<fieldset>
	<legend><?php echo smarty_function_gt(array('s' => 'Personal Information'), $this);?>
</legend>
	<p>
		<label for="rname" id="lrname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
:</label><br />
		<input type="text" id="rname" name="rname" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="remail" id="lremail" class="noblock"><?php echo smarty_function_gt(array('s' => 'e-Mail'), $this);?>
:</label><br />
		<input type="text" id="remail" name="remail" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="rctry" class="noblock"><?php echo smarty_function_gt(array('s' => 'Country'), $this);?>
:</label><br />
		<select name="rctry" id="rctry">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['default_country']), $this);?>

		</select>
	</p>
	<p>
		<label for="rcomm" class="noblock"><?php echo smarty_function_gt(array('s' => 'Consults, comments or suggestions'), $this);?>
:</label><br />
		<textarea id="rcomm" name="rcomm" cols="60" rows="7"></textarea>
	</p>
	<p class="button">
		<input type="submit" name="rsub" id="rsub" value="<?php echo smarty_function_gt(array('s' => 'Send'), $this);?>
" />
		<input type="reset" name="reset" id="reset" value="<?php echo smarty_function_gt(array('s' => 'Reset'), $this);?>
" />
		<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['tour']['tourid']; ?>
" />
		<input type="hidden" name="lang" id="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" />
	</p>
</fieldset>
</form>

<script type="text/javascript">
	document.getElementById('rname').focus();
	<?php echo '
	var a_fields = {
		\'rname\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
',
			<?php echo '
			\'r\': true,
			\'t\': \'lrname\',
			\'mn\': 4
		},
		\'remail\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
',
			<?php echo '
			\'r\': true,
			\'f\': \'email\',
			\'t\': \'lremail\',
			\'mn\': 4
		}
	},
	o_config = {
		\'to_disable\' : [\'rsub\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	'; ?>

</script>