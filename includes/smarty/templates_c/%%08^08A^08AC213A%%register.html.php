<?php /* Smarty version 2.6.10, created on 2010-02-12 05:47:00
         compiled from register.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'register.html', 1, false),array('function', 'html_options', 'register.html', 34, false),array('modifier', 'wrap', 'register.html', 2, false),)), $this); ?>
<h1><?php echo smarty_function_gt(array('s' => 'Welcome'), $this);?>
</h1>
<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
<div style="float: left; width: 50%;padding-right: 10px; ">
<h2><?php echo smarty_function_gt(array('s' => 'Login'), $this);?>
</h2>
<form action="<?php echo $this->_tpl_vars['baseurl']; ?>
login.php" method="post" name="frmlogin" id="frmlogin">
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Login Information'), $this);?>
</legend>
		<p><label for="loginemail" id="llemail" class="noblock"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> <br />
		<input type="text" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" size="30" maxlength="100" id="loginemail" name="email" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p><label for="loginpwd" id="llpwd" class="noblock"><?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
:</label> <br />
		<input type="password" name="pwd" id="loginpwd" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p class="button">
			<input type="submit" name="login" id="sublogin" value="<?php echo smarty_function_gt(array('s' => 'Login'), $this);?>
" />
			<input type="hidden" name="action" id="action" value="login" />
			<input type="hidden" name="lang" id="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" />
		</p>
	</fieldset>
</form>
</div>
<div style="float: left; width: 45%; padding-left: 10px;">
<h2><?php echo smarty_function_gt(array('s' => 'New Company'), $this);?>
</h2>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm" onsubmit="return v.exec()">
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Company\'s Information'), $this);?>
</legend>
		<p><label for="name" id="lname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Company Name'), $this);?>
:</label> <br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['user']['name']; ?>
" maxlength="200" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p><label for="email" id="lemail" class="noblock"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> <br />
		<input type="text" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" maxlength="100" <?php if ($this->_tpl_vars['action'] == 'update'): ?>disabled="disabled" name="demail" id="demail" <?php else: ?> name="email" id="email" <?php endif; ?> /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
		<?php if ($this->_tpl_vars['action'] == 'update'): ?>
		<input type="hidden" name="email" id="email" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" />
		<?php endif; ?></p>
		<p><label for="country_code" class="noblock"><?php echo smarty_function_gt(array('s' => 'Country'), $this);?>
:</label> <br />
		<select name="country_code" id="country_code">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['default_country']), $this);?>

		</select>
		</p>
	</fieldset>
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'System Information'), $this);?>
</legend>
		<p><label for="pwd" id="lpwd" class="noblock"><?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
:</label> <br />
		<input type="password" name="pwd" id="pwd" <?php if ($this->_tpl_vars['action'] != 'update'): ?>value="<?php echo $this->_tpl_vars['user']['pwd']; ?>
"<?php endif; ?> size="20" maxlength="15" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p><label for="pwd2" id="lpwd2" class="noblock"><?php echo smarty_function_gt(array('s' => 'Again'), $this);?>
:</label> <br />
		<input type="password" name="pwd2" id="pwd2" <?php if ($this->_tpl_vars['action'] != 'update'): ?>value="<?php echo $this->_tpl_vars['user']['pwd']; ?>
"<?php endif; ?> size="20" maxlength="15" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p class="button">
			<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'Save'), $this);?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
		</p>
	</fieldset>
</form>
</div>
<script type="text/javascript">
	document.getElementById('loginemail').focus();
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
		},
		\'email\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'f\': \'email\',  // format (see below)
			\'t\': \'lemail\',   // id of the element to highlight if input not validated
			\'mn\': 4
		},
		\'pwd\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'mn\': 4,
			\'f\': \'alphanum\',  // format (see below)
			\'t\': \'lpwd\',   // id of the element to highlight if input not validated
			\'m\' : \'pwd2\'
		},
		
		\'pwd2\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Password Again'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'mn\': 4,
			\'f\': \'alphanum\',  // format (see below)
			\'t\': \'lpwd2\'   // id of the element to highlight if input not validated
		}
		
	},
	o_config = {
		\'to_disable\' : [\'save\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	/*
	var b_fields = {
		\'loginemail\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'f\': \'email\',  // format (see below)
			\'t\': \'llemail\',   // id of the element to highlight if input not validated
			\'mn\': 4
		},
		\'loginpwd\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'mn\': 4,
			\'f\': \'alphanum\',  // format (see below)
			\'t\': \'llpwd\',   // id of the element to highlight if input not validated
			\'m\' : \'pwd2\'
		}
		
	},
	b_config = {
		\'to_disable\' : [\'sublogin\'],
		\'alert\' : 0
	}
	var b = new validator(\'frmlogin\', b_fields, b_config);*/
	'; ?>

</script>