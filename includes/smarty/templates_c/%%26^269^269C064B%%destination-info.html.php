<?php /* Smarty version 2.6.10, created on 2016-06-23 00:30:16
         compiled from destination-info.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'destination-info.html', 4, false),array('function', 'cycle', 'destination-info.html', 12, false),array('function', 'rewrite_link', 'destination-info.html', 13, false),)), $this); ?>
<h1 id="infode"><?php echo $this->_tpl_vars['destination']['name']; ?>
</h1>
<ul id="tofc">
	<li><a href="#infode"><?php echo $this->_tpl_vars['destination']['name']; ?>
</a></li>
	<li><a href="#tours-in"><?php echo smarty_function_gt(array('s' => 'Tours in'), $this);?>
 <?php echo $this->_tpl_vars['destination']['name']; ?>
</a></li>
</ul>
<?php echo $this->_tpl_vars['destination']['description']; ?>

<p class="acenter"><a href="#content"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>
<h1 id="tours-in"><?php echo smarty_function_gt(array('s' => 'Tours in'), $this);?>
 <?php echo $this->_tpl_vars['destination']['name']; ?>
</h1>
<?php if ($this->_tpl_vars['tours']): ?>
<ul id="utours">
<?php unset($this->_sections['ut']);
$this->_sections['ut']['name'] = 'ut';
$this->_sections['ut']['loop'] = is_array($_loop=$this->_tpl_vars['tours']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ut']['show'] = true;
$this->_sections['ut']['max'] = $this->_sections['ut']['loop'];
$this->_sections['ut']['step'] = 1;
$this->_sections['ut']['start'] = $this->_sections['ut']['step'] > 0 ? 0 : $this->_sections['ut']['loop']-1;
if ($this->_sections['ut']['show']) {
    $this->_sections['ut']['total'] = $this->_sections['ut']['loop'];
    if ($this->_sections['ut']['total'] == 0)
        $this->_sections['ut']['show'] = false;
} else
    $this->_sections['ut']['total'] = 0;
if ($this->_sections['ut']['show']):

            for ($this->_sections['ut']['index'] = $this->_sections['ut']['start'], $this->_sections['ut']['iteration'] = 1;
                 $this->_sections['ut']['iteration'] <= $this->_sections['ut']['total'];
                 $this->_sections['ut']['index'] += $this->_sections['ut']['step'], $this->_sections['ut']['iteration']++):
$this->_sections['ut']['rownum'] = $this->_sections['ut']['iteration'];
$this->_sections['ut']['index_prev'] = $this->_sections['ut']['index'] - $this->_sections['ut']['step'];
$this->_sections['ut']['index_next'] = $this->_sections['ut']['index'] + $this->_sections['ut']['step'];
$this->_sections['ut']['first']      = ($this->_sections['ut']['iteration'] == 1);
$this->_sections['ut']['last']       = ($this->_sections['ut']['iteration'] == $this->_sections['ut']['total']);
?>
	<li class="<?php echo smarty_function_cycle(array('values' => "l01, l02"), $this);?>
">
		<div class="fright"><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_book_url','data' => $this->_tpl_vars['tours'][$this->_sections['ut']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
" class="ureserve"><?php echo smarty_function_gt(array('s' => 'Book now!'), $this);?>
</a></div>
		<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tours'][$this->_sections['ut']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['ut']['index']]['name']; ?>
</a> <strong>(US$ <?php echo $this->_tpl_vars['tours'][$this->_sections['ut']['index']]['price']; ?>
)</strong> <br />
		<?php echo smarty_function_gt(array('s' => 'Include'), $this);?>
: <?php unset($this->_sections['utd']);
$this->_sections['utd']['name'] = 'utd';
$this->_sections['utd']['loop'] = is_array($_loop=$this->_tpl_vars['tours'][$this->_sections['ut']['index']]['destinations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['utd']['show'] = true;
$this->_sections['utd']['max'] = $this->_sections['utd']['loop'];
$this->_sections['utd']['step'] = 1;
$this->_sections['utd']['start'] = $this->_sections['utd']['step'] > 0 ? 0 : $this->_sections['utd']['loop']-1;
if ($this->_sections['utd']['show']) {
    $this->_sections['utd']['total'] = $this->_sections['utd']['loop'];
    if ($this->_sections['utd']['total'] == 0)
        $this->_sections['utd']['show'] = false;
} else
    $this->_sections['utd']['total'] = 0;
if ($this->_sections['utd']['show']):

            for ($this->_sections['utd']['index'] = $this->_sections['utd']['start'], $this->_sections['utd']['iteration'] = 1;
                 $this->_sections['utd']['iteration'] <= $this->_sections['utd']['total'];
                 $this->_sections['utd']['index'] += $this->_sections['utd']['step'], $this->_sections['utd']['iteration']++):
$this->_sections['utd']['rownum'] = $this->_sections['utd']['iteration'];
$this->_sections['utd']['index_prev'] = $this->_sections['utd']['index'] - $this->_sections['utd']['step'];
$this->_sections['utd']['index_next'] = $this->_sections['utd']['index'] + $this->_sections['utd']['step'];
$this->_sections['utd']['first']      = ($this->_sections['utd']['iteration'] == 1);
$this->_sections['utd']['last']       = ($this->_sections['utd']['iteration'] == $this->_sections['utd']['total']);
?><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_destination_url','data' => $this->_tpl_vars['tours'][$this->_sections['ut']['index']]['destinations'][$this->_sections['utd']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['ut']['index']]['destinations'][$this->_sections['utd']['index']]['name']; ?>
</a>, <?php endfor; endif; ?>
	</li>
<?php endfor; endif; ?>
</ul>
<?php else: ?>
<p><?php echo smarty_function_gt(array('s' => 'There are no tours in this destination'), $this);?>
</p>
<?php endif; ?>
<p class="acenter"><a href="#content"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>