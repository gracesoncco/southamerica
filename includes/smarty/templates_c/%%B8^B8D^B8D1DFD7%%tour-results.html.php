<?php /* Smarty version 2.6.10, created on 2016-06-22 23:57:05
         compiled from tour-results.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'tour-results.html', 3, false),array('function', 'gt', 'tour-results.html', 6, false),array('function', 'random_image', 'tour-results.html', 14, false),array('modifier', 'trim_text', 'tour-results.html', 21, false),array('modifier', 'autop', 'tour-results.html', 21, false),)), $this); ?>
<?php if ($this->_tpl_vars['tours']): ?>
	<?php unset($this->_sections['ot']);
$this->_sections['ot']['name'] = 'ot';
$this->_sections['ot']['loop'] = is_array($_loop=$this->_tpl_vars['tours']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ot']['show'] = true;
$this->_sections['ot']['max'] = $this->_sections['ot']['loop'];
$this->_sections['ot']['step'] = 1;
$this->_sections['ot']['start'] = $this->_sections['ot']['step'] > 0 ? 0 : $this->_sections['ot']['loop']-1;
if ($this->_sections['ot']['show']) {
    $this->_sections['ot']['total'] = $this->_sections['ot']['loop'];
    if ($this->_sections['ot']['total'] == 0)
        $this->_sections['ot']['show'] = false;
} else
    $this->_sections['ot']['total'] = 0;
if ($this->_sections['ot']['show']):

            for ($this->_sections['ot']['index'] = $this->_sections['ot']['start'], $this->_sections['ot']['iteration'] = 1;
                 $this->_sections['ot']['iteration'] <= $this->_sections['ot']['total'];
                 $this->_sections['ot']['index'] += $this->_sections['ot']['step'], $this->_sections['ot']['iteration']++):
$this->_sections['ot']['rownum'] = $this->_sections['ot']['iteration'];
$this->_sections['ot']['index_prev'] = $this->_sections['ot']['index'] - $this->_sections['ot']['step'];
$this->_sections['ot']['index_next'] = $this->_sections['ot']['index'] + $this->_sections['ot']['step'];
$this->_sections['ot']['first']      = ($this->_sections['ot']['iteration'] == 1);
$this->_sections['ot']['last']       = ($this->_sections['ot']['iteration'] == $this->_sections['ot']['total']);
?>		
		<h2><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tours'][$this->_sections['ot']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['ot']['index']]['name']; ?>
</a> 
		<?php if ($this->_tpl_vars['tours'][$this->_sections['ot']['index']]['price'] > 0): ?>(<acronym title="United States Dollar" lang="en">US$</acronym> <?php echo $this->_tpl_vars['tours'][$this->_sections['ot']['index']]['price']; ?>
)<?php endif; ?></h2>
		<p>
			<?php echo smarty_function_gt(array('s' => 'Visited Destinations'), $this);?>
: 
				<?php unset($this->_sections['otd']);
$this->_sections['otd']['name'] = 'otd';
$this->_sections['otd']['loop'] = is_array($_loop=$this->_tpl_vars['tours'][$this->_sections['ot']['index']]['destinations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['otd']['show'] = true;
$this->_sections['otd']['max'] = $this->_sections['otd']['loop'];
$this->_sections['otd']['step'] = 1;
$this->_sections['otd']['start'] = $this->_sections['otd']['step'] > 0 ? 0 : $this->_sections['otd']['loop']-1;
if ($this->_sections['otd']['show']) {
    $this->_sections['otd']['total'] = $this->_sections['otd']['loop'];
    if ($this->_sections['otd']['total'] == 0)
        $this->_sections['otd']['show'] = false;
} else
    $this->_sections['otd']['total'] = 0;
if ($this->_sections['otd']['show']):

            for ($this->_sections['otd']['index'] = $this->_sections['otd']['start'], $this->_sections['otd']['iteration'] = 1;
                 $this->_sections['otd']['iteration'] <= $this->_sections['otd']['total'];
                 $this->_sections['otd']['index'] += $this->_sections['otd']['step'], $this->_sections['otd']['iteration']++):
$this->_sections['otd']['rownum'] = $this->_sections['otd']['iteration'];
$this->_sections['otd']['index_prev'] = $this->_sections['otd']['index'] - $this->_sections['otd']['step'];
$this->_sections['otd']['index_next'] = $this->_sections['otd']['index'] + $this->_sections['otd']['step'];
$this->_sections['otd']['first']      = ($this->_sections['otd']['iteration'] == 1);
$this->_sections['otd']['last']       = ($this->_sections['otd']['iteration'] == $this->_sections['otd']['total']);
?>
				<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_destination_url','data' => $this->_tpl_vars['tours'][$this->_sections['ot']['index']]['destinations'][$this->_sections['otd']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['ot']['index']]['destinations'][$this->_sections['otd']['index']]['name']; ?>
</a> 
				<?php endfor; endif; ?>
		</p>
		<p>		
		<?php if ($this->_tpl_vars['tours'][$this->_sections['ot']['index']]['pictures']): ?>
			<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tours'][$this->_sections['ot']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
">
			<img <?php echo smarty_function_random_image(array('pics' => $this->_tpl_vars['tours'][$this->_sections['ot']['index']]['pictures'],'no_tag' => true), $this);?>
" class="foto_tour"/>
			</a>
			<?php endif; ?>




			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tours'][$this->_sections['ot']['index']]['resume'])) ? $this->_run_mod_handler('trim_text', true, $_tmp) : smarty_modifier_trim_text($_tmp)))) ? $this->_run_mod_handler('autop', true, $_tmp) : smarty_modifier_autop($_tmp)); ?>
			
		
		</p>		
		<p>
			<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_book_url','data' => $this->_tpl_vars['tours'][$this->_sections['ot']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
" title="<?php echo smarty_function_gt(array('s' => 'Reserve'), $this);?>
 <?php echo $this->_tpl_vars['tours'][$this->_sections['ot']['index']]['name']; ?>
"><?php echo smarty_function_gt(array('s' => 'Book Now'), $this);?>
</a> |
			<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tours'][$this->_sections['ot']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'More'), $this);?>
 &rarr;</a>
		</p> 
		<br />
		<hr />
	<?php endfor; endif; ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php else: ?>
	<p><?php echo smarty_function_gt(array('s' => 'There are no available Tours'), $this);?>
</p>
<?php endif; ?>