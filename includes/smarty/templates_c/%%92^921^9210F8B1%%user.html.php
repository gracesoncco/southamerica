<?php /* Smarty version 2.6.10, created on 2010-02-12 06:14:17
         compiled from adm/user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wrap', 'adm/user.html', 3, false),array('function', 'gt', 'adm/user.html', 5, false),array('function', 'html_options', 'adm/user.html', 13, false),array('function', 'form_token', 'adm/user.html', 42, false),)), $this); ?>
<div class="datadetail">
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" id="your-profile" name="frm" onsubmit="return v.exec()">
	<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Datos Personales'), $this);?>
</legend>
		<p><label for="name" id="lname"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
:</label> <br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['user']['name']; ?>
" size="40" maxlength="200" /></p>
		<p><label for="email" id="lemail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> <br />
		<input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" size="40" maxlength="100" <?php if ($this->_tpl_vars['user']): ?>readonly="readonly"<?php endif; ?> />
		</p>
		<p><label for="country_code"><?php echo smarty_function_gt(array('s' => 'País'), $this);?>
:</label> <br />
		<select name="country_code" id="country_code">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['user']['country_code']), $this);?>

		</select>
		</p>
	</fieldset>
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Información del Sistema'), $this);?>
</legend>
		<p><label for="pwd" id="lpwd"><?php echo smarty_function_gt(array('s' => 'Contraseña'), $this);?>
:</label> <br /> 
		<input type="password" name="pwd" id="pwd" size="20" maxlength="15" /></p>
		<p><label for="pwd2" id="lpwd2"><?php echo smarty_function_gt(array('s' => 'Repite tu contraseña'), $this);?>
:</label> <br />
		<input type="password" name="pwd2" id="pwd2" size="20" maxlength="15" /></p>
		<p><label for="usertype"><?php echo smarty_function_gt(array('s' => 'Tipo'), $this);?>
:</label><br /> 
		<select name="usertype" id="usertype">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['usertypes'],'selected' => $this->_tpl_vars['user']['usertype']), $this);?>

		</select>
		</p>
		<p><label for="active"><?php echo smarty_function_gt(array('s' => 'Usuario activo?'), $this);?>
:</label> <br />
		<select name="active" id="active">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['status'],'selected' => $this->_tpl_vars['user']['active']), $this);?>

		</select>
		</p>		
	</fieldset>
	<div class="clear"></div>
	<p class="submit">
		<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'Guardar Usuario'), $this);?>
" class="bold" />
		<?php if ($this->_tpl_vars['user'] && $this->_tpl_vars['user']['userid'] != 1): ?>
		<input type="submit" name="remove" id="remove" value="<?php echo smarty_function_gt(array('s' => 'Eliminar Usuario'), $this);?>
" onclick="return confirm_msg();" />
		<?php endif; ?>
		<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
		<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['user']['userid']; ?>
" />
		<?php echo smarty_function_form_token(array('action' => "update-user"), $this);?>

	</p>	
</form>
</div>
<?php if ($this->_tpl_vars['user']): ?>
<div class="datadetail">
	<p class="updated"><?php echo smarty_function_gt(array('s' => 'Dejar los campos en blanco si no vas a cambiar la contraseña'), $this);?>
</p>
</div>
<?php endif; ?>
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
		},
	'; ?>

	<?php if (! $this->_tpl_vars['user']): ?>
	<?php echo '
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
	'; ?>

	<?php endif; ?>
	<?php echo '	
		\'pwd\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Contraseña'), $this);?>
',  // label
			<?php echo '
	'; ?>

		<?php if (! $this->_tpl_vars['user']): ?>
			'r': true,    // required
			'mn': 4,
		<?php endif; ?>
	<?php echo '
			\'f\': \'alphanum\',  // format (see below)
			\'t\': \'lpwd\',   // id of the element to highlight if input not validated
			\'m\' : \'pwd2\'
		},
		
		\'pwd2\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Repite la contraseña'), $this);?>
',  // label
			<?php echo '
	'; ?>

		<?php if (! $this->_tpl_vars['user']): ?>
			'r': true,    // required
			'mn': 4,
		<?php endif; ?>
	<?php echo '
			\'f\': \'alphanum\',  // format (see below)
			\'t\': \'lpwd2\'   // id of the element to highlight if input not validated
		}
		
	},
	o_config = {
		\'to_disable\' : [\'save\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	
	copyfield = function(p, q) {
		document.getElementById(q).value = document.getElementById(p).value;
		return false;
	}
	'; ?>

</script>