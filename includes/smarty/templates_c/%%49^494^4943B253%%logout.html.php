<?php /* Smarty version 2.6.10, created on 2010-02-12 05:48:35
         compiled from logout.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'logout.html', 4, false),)), $this); ?>
<h1>
	<?php echo $this->_tpl_vars['section_title']; ?>

</h1>
<p><?php echo smarty_function_gt(array('s' => 'You has been logged out successfully, You can'), $this);?>
 <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
?lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'go to home'), $this);?>
</a> or <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
login.php?lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'login again'), $this);?>
</a>.</p>