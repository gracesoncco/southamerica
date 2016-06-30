<?php /* Smarty version 2.6.10, created on 2016-07-01 00:17:09
         compiled from login.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'login.html', 6, false),array('modifier', 'wrap', 'login.html', 7, false),)), $this); ?>
<h1>
	<?php echo $this->_tpl_vars['section_title']; ?>

</h1>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm" onsubmit="return v.exec()">
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Login Information'), $this);?>
</legend>
		<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
		<p><label for="email" id="lemail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" size="40" maxlength="100" id="email" name="email" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p><label for="pwd" id="lpwd"><?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
:</label> 
		<input type="password" name="pwd" id="pwd" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p class="button">
			<input type="submit" name="login" id="login" value="<?php echo smarty_function_gt(array('s' => 'Login'), $this);?>
" />
			<input type="hidden" name="r" id="r" value="<?php echo $this->_tpl_vars['r']; ?>
" />
			<input type="hidden" name="action" id="action" value="login" />
			<input type="hidden" name="lang" id="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" />
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
?action=lostpassword&lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'Forgot your password?'), $this);?>
</a>
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
		},
		\'pwd\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
',
			<?php echo '
			\'r\': true,
			\'mn\': 4,
			\'f\': \'alphanum\',
			\'t\': \'lpwd\'
		}		
	},
	o_config = {
		\'to_disable\' : [\'login\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	'; ?>

</script>