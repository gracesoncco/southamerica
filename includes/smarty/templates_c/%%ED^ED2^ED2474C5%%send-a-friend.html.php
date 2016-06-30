<?php /* Smarty version 2.6.10, created on 2009-06-04 04:12:05
         compiled from stmt/send-a-friend.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'stmt/send-a-friend.html', 1, false),array('function', 'rewrite_link', 'stmt/send-a-friend.html', 3, false),array('modifier', 'autop', 'stmt/send-a-friend.html', 5, false),)), $this); ?>
<p><?php echo smarty_function_gt(array('s' => 'Hi'), $this);?>
 <?php echo $this->_tpl_vars['dname']; ?>
</p>

<p><?php echo $this->_tpl_vars['fname']; ?>
 <?php echo smarty_function_gt(array('s' => 'recommends you this tour'), $this);?>
: "<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tour']['name']; ?>
</a>"</p>

<?php echo ((is_array($_tmp=$this->_tpl_vars['personal'])) ? $this->_run_mod_handler('autop', true, $_tmp) : smarty_modifier_autop($_tmp)); ?>

--

<h2><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tour']['name']; ?>
</a></h2>

<?php echo ((is_array($_tmp=$this->_tpl_vars['tour']['resume'])) ? $this->_run_mod_handler('autop', true, $_tmp) : smarty_modifier_autop($_tmp)); ?>


<p><?php echo smarty_function_gt(array('s' => 'If you do not see the url, you can copy this url into your address bar:'), $this);?>

<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>

</p>

<p>--<br />
<?php echo $this->_tpl_vars['site_footer']; ?>
</p>