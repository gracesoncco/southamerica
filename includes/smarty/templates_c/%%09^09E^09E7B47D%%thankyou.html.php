<?php /* Smarty version 2.6.10, created on 2010-03-13 20:06:23
         compiled from thankyou.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'thankyou.html', 1, false),)), $this); ?>
<h2><?php echo smarty_function_gt(array('s' => 'Thank You!'), $this);?>
</h2>
<p><strong><?php echo $this->_tpl_vars['rname']; ?>
, <?php echo smarty_function_gt(array('s' => 'Thanks for your'), $this);?>
 <?php if ($this->_tpl_vars['reserv']):  echo smarty_function_gt(array('s' => 'Reservation'), $this); else:  echo smarty_function_gt(array('s' => 'feedback'), $this); endif; ?>, <?php echo smarty_function_gt(array('s' => 'we will put in contact with you as soon as possible'), $this);?>
.</strong></p>
<p class="acenter"><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
">Go home...</a></p>