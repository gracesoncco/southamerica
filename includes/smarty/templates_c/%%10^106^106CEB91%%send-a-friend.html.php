<?php /* Smarty version 2.6.10, created on 2016-06-23 09:37:24
         compiled from send-a-friend.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'send-a-friend.html', 1, false),array('function', 'rewrite_link', 'send-a-friend.html', 1, false),)), $this); ?>
<h1><?php echo smarty_function_gt(array('s' => 'Recommend'), $this);?>
: <a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tour']['name']; ?>
</a></h1>

<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" id="frm">
<fieldset>
	<?php echo $this->_tpl_vars['msg']; ?>

	<p>
		<label for="fname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Your name'), $this);?>
:</label><br />
		<input type="text" id="fname" name="fname" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="fmail" class="noblock"><?php echo smarty_function_gt(array('s' => 'Your e-Mail'), $this);?>
:</label><br />
		<input type="text" id="fmail" name="fmail" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="dname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Your friend name'), $this);?>
:</label><br />
		<input type="text" id="dname" name="dname" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="demail" class="noblock"><?php echo smarty_function_gt(array('s' => 'Your friend e-Mail'), $this);?>
:</label><br />
		<input type="text" id="demail" name="dmail" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="personal" class="noblock"><?php echo smarty_function_gt(array('s' => 'Put a personal message'), $this);?>
:</label><br />
		<textarea id="personal" name="personal" cols="60" rows="7"><?php echo smarty_function_gt(array('s' => 'Hi!, see this amazing tour.'), $this);?>
</textarea>
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