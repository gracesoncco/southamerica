<?php /* Smarty version 2.6.10, created on 2009-05-31 09:43:20
         compiled from adm/comment.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/comment.html', 3, false),array('function', 'form_token', 'adm/comment.html', 27, false),array('modifier', 'wrap', 'adm/comment.html', 4, false),array('modifier', 'escape', 'adm/comment.html', 21, false),)), $this); ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm" onsubmit="return v.exec()">
	<fieldset class="datadetail">
		<legend><?php echo smarty_function_gt(array('s' => 'Datos del Comentario'), $this);?>
</legend>
		<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
		<p><label for="name" id="lname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
:</label> <br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['comment']['name']; ?>
" size="40" maxlength="200" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span></p>
		
		<p><label for="email" id="lemail" class="noblock"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label><br />
		<input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['comment']['email']; ?>
" size="40" maxlength="100" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span>
		</p>
		
		<p><label class="noblock"><?php echo smarty_function_gt(array('s' => 'Tour'), $this);?>
:</label><br />
		<?php echo $this->_tpl_vars['comment']['tour_name']; ?>

		</p>
		
		<p><label class="noblock"><?php echo smarty_function_gt(array('s' => 'Dirección IP'), $this);?>
:</label><br />
		<?php echo $this->_tpl_vars['comment']['ip']; ?>

		</p>
		
		<p><label for="description" class="noblock"><?php echo smarty_function_gt(array('s' => 'Descripción'), $this);?>
:</label><br /> 
		<textarea name="description" id="description" cols="45" rows="6"><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></p>
		<p class="submit">
			<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'Guardar Comentario'), $this);?>
" class="bold" />
			<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
			<input type="submit" name="remove" id="remove" value="<?php echo smarty_function_gt(array('s' => 'Borrar Comentario'), $this);?>
" onclick="return confirm_msg()" />
			<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['comment']['commentid']; ?>
" />
			<?php echo smarty_function_form_token(array('action' => 'comment'), $this);?>

		</p>
	</fieldset>
</form>

<script type="text/javascript">
<?php if ($this->_tpl_vars['comment']): ?>document.getElementById('name').focus();<?php endif; ?>
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
			\'f\': \'email\',
			\'r\': true,    // required
			\'t\': \'lemail\',   // id of the element to highlight if input not validated
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