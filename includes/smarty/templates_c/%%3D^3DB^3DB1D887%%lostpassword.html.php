<?php /* Smarty version 2.6.10, created on 2010-02-12 05:09:38
         compiled from lostpassword.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'lostpassword.html', 6, false),array('modifier', 'wrap', 'lostpassword.html', 7, false),)), $this); ?>
<h1>
	<?php echo $this->_tpl_vars['section_title']; ?>

</h1>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm" onsubmit="return v.exec()">
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Fill your E-Mail'), $this);?>
</legend>
		<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
		<p><label for="email" id="lemail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" size="40" maxlength="100" id="email" name="email" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p class="button">
			<input type="submit" name="login" id="login" value="<?php echo smarty_function_gt(array('s' => 'Recover'), $this);?>
" />
			<input type="button" name="cancel" id="cancel" value="<?php echo smarty_function_gt(array('s' => 'Cancel'), $this);?>
" onclick="location.href='<?php echo $this->_tpl_vars['self']; ?>
'" />
			<input type="hidden" name="r" id="r" value="<?php echo $this->_tpl_vars['r']; ?>
" />
			<input type="hidden" name="action" id="action" value="lostpassword" />
		</p>
	</fieldset>
</form>
<p class="acenter">
	<?php echo smarty_function_gt(array('s' => 'If you don\'t have an account'), $this);?>
, <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
register.php?lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'Register'), $this);?>
</a> <?php echo smarty_function_gt(array('s' => 'i\'ts free'), $this);?>
.
</p>
<p class="acenter">
	<a href="<?php echo $this->_tpl_vars['self']; ?>
?lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'Login'), $this);?>
</a>.
</p>
<script type="text/javascript">
	document.getElementById('email').focus();
	<?php echo '
	var a_fields = {
		\'email\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
',
			<?php echo '
			\'r\': true,
			\'f\': \'email\',
			\'t\': \'lemail\',
			\'mn\': 4
		}		
	},
	o_config = {
		\'to_disable\' : [\'login\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	'; ?>

</script>