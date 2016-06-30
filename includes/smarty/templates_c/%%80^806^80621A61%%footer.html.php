<?php /* Smarty version 2.6.10, created on 2016-06-22 23:57:05
         compiled from footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'footer.html', 2, false),array('function', 'gt', 'footer.html', 2, false),)), $this); ?>
<h5><p style="margin-top: 0" id="fnav">
	<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'about','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'About Us'), $this);?>
</a> |
	<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'contact','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Contact Us'), $this);?>
</a></h5>

<!-- |
	<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
conditions.php?lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'Conditions'), $this);?>
</a> |
<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
deeds.php?lang=<?php echo $this->_tpl_vars['lang']; ?>
"><?php echo smarty_function_gt(array('s' => 'Good Deeds'), $this);?>
</a> |
	<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
faq.php?lang=<?php echo $this->_tpl_vars['lang']; ?>
"><acronym title="Frequently Asked Questions" lang="en">FAQ</acronym></a-->

</p>
<?php echo $this->_tpl_vars['site_footer']; ?>
