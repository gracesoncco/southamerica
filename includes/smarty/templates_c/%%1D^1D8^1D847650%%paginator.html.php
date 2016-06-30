<?php /* Smarty version 2.6.10, created on 2016-06-22 23:57:05
         compiled from adm/paginator.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/paginator.html', 4, false),)), $this); ?>
<?php if ($this->_tpl_vars['RESULTS']['first_page'] || $this->_tpl_vars['RESULTS']['last_page']): ?>
<div class="paginator">
	<p>
	<strong><?php echo smarty_function_gt(array('s' => 'Page'), $this);?>
</strong>: <?php echo $this->_tpl_vars['RESULTS']['current_page']; ?>
 <?php echo smarty_function_gt(array('s' => 'of'), $this);?>
 <?php echo $this->_tpl_vars['RESULTS']['num_pages']; ?>

	(<?php echo $this->_tpl_vars['RESULTS']['num_records']; ?>
 <?php echo smarty_function_gt(array('s' => 'items'), $this);?>
)
	<?php echo $this->_tpl_vars['RESULTS']['first_page']; ?>

	<?php echo $this->_tpl_vars['RESULTS']['prev']; ?>

	<?php echo $this->_tpl_vars['RESULTS']['nav']; ?>

	<?php echo $this->_tpl_vars['RESULTS']['next']; ?>

	<?php echo $this->_tpl_vars['RESULTS']['last_page']; ?>

	</p>
</div>
<?php endif; ?>