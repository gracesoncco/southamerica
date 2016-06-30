<?php /* Smarty version 2.6.10, created on 2016-06-23 01:06:22
         compiled from tours.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'tours.html', 10, false),)), $this); ?>
<?php if ($this->_tpl_vars['destination']): ?>
	<?php if ($this->_tpl_vars['destination']['description'] != ''): ?>
		<h1 id="infode"><a href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['destination']['link']; ?>
-information.<?php echo $this->_tpl_vars['lang']; ?>
.html"><?php echo $this->_tpl_vars['destination']['name']; ?>
</a></h1>
		




				<?php echo $this->_tpl_vars['destination']['description']; ?>

		<p><a href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['destination']['link']; ?>
-information.<?php echo $this->_tpl_vars['lang']; ?>
.html"><?php echo smarty_function_gt(array('s' => 'More'), $this);?>
 &rarr;</a></p>
		<h1 id="tours-in"><?php echo smarty_function_gt(array('s' => 'Tours in'), $this);?>
 <?php echo $this->_tpl_vars['destination']['name']; ?>
</h1>
	<?php else: ?>
		<h1><?php echo smarty_function_gt(array('s' => 'Tours in'), $this);?>
 <?php echo $this->_tpl_vars['destination']['name']; ?>
</h1>
	<?php endif;  elseif ($this->_tpl_vars['tourtype']): ?>
	<h1><?php echo smarty_function_gt(array('s' => 'Tour Packages'), $this);?>
: '<?php echo $this->_tpl_vars['tourtype']['name']; ?>
'</h1>
<?php elseif ($this->_tpl_vars['search_term']): ?>
	<h1><?php echo smarty_function_gt(array('s' => 'Search results for'), $this);?>
: <?php echo $this->_tpl_vars['search_term']; ?>
</h1>	
<?php else: ?>
	<h1><?php echo smarty_function_gt(array('s' => 'Our Tours'), $this);?>
</h1>
<?php endif;  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tour-results.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>