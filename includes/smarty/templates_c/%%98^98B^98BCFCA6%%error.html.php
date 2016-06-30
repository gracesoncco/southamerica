<?php /* Smarty version 2.6.10, created on 2012-04-05 03:52:54
         compiled from error.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'error.html', 1, false),)), $this); ?>
<h2><?php echo smarty_function_gt(array('s' => 'We Sorry'), $this);?>
</h2>
<p><?php echo smarty_function_gt(array('s' => 'The form could not be sent, please try again'), $this);?>
.</p>
<p class="acenter"><a href="<?php echo $this->_tpl_vars['referer']; ?>
"><?php echo smarty_function_gt(array('s' => 'Try Again'), $this);?>
</a></p>