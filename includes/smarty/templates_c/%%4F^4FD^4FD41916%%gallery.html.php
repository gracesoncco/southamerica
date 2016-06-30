<?php /* Smarty version 2.6.10, created on 2016-06-23 03:29:04
         compiled from gallery.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'gallery.html', 1, false),array('function', 'rewrite_link', 'gallery.html', 2, false),)), $this); ?>
<h1><?php echo smarty_function_gt(array('s' => 'Photo Gallery'), $this); if ($this->_tpl_vars['tour']): ?>: 
	<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
" title="<?php echo smarty_function_gt(array('s' => 'View details of'), $this);?>
 <?php echo $this->_tpl_vars['tour']['name']; ?>
"><?php echo $this->_tpl_vars['tour']['name']; ?>
</a><?php endif; ?></h1>
<?php if ($this->_tpl_vars['tour']): ?><p><?php echo $this->_tpl_vars['tour']['resume']; ?>
</p><?php endif; ?>

<ul style="list-style-type:none;">
<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['pics']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
	<?php if ($this->_tpl_vars['pics'][$this->_sections['n']['index']]['pfor'] != 'm'): ?>
	<li style="float:left; margin-left: 10px;">
		<a href="<?php echo $this->_tpl_vars['picsurl']; ?>
normal_<?php echo $this->_tpl_vars['pics'][$this->_sections['n']['index']]['picname']; ?>
" title="<?php echo $this->_tpl_vars['pics'][$this->_sections['n']['index']]['name']; ?>
" rel="lightbox1">
		<img src="<?php echo $this->_tpl_vars['picsurl']; ?>
thumb_<?php echo $this->_tpl_vars['pics'][$this->_sections['n']['index']]['picname']; ?>
" alt="<?php echo $this->_tpl_vars['pics'][$this->_sections['n']['index']]['name']; ?>
" /></a><br />
		<?php echo $this->_tpl_vars['pics'][$this->_sections['n']['index']]['name']; ?>
	
	</li>
	<?php endif;  endfor; else: ?>
	<li><?php echo smarty_function_gt(array('s' => 'There are no pictures'), $this);?>
</li>
<?php endif; ?>
</ul>
<br style="clear:both" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['tour']): ?> 
<p><?php echo smarty_function_gt(array('s' => 'Back to the tour'), $this);?>
 <a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
" title="<?php echo smarty_function_gt(array('s' => 'View details of'), $this);?>
 <?php echo $this->_tpl_vars['tour']['name']; ?>
"><?php echo $this->_tpl_vars['tour']['name']; ?>
</a></p>
<?php endif; ?>