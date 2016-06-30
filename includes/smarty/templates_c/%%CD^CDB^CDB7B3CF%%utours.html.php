<?php /* Smarty version 2.6.10, created on 2010-02-12 05:45:12
         compiled from utours.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'utours.html', 6, false),array('function', 'gt', 'utours.html', 6, false),array('function', 'cycle', 'utours.html', 23, false),array('modifier', 'wrap', 'utours.html', 11, false),)), $this); ?>
<h1>
	<?php echo $this->_tpl_vars['section_title']; ?>

</h1>

<ul id="accounttabs">
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'account','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'My Information'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'utours','lang' => $this->_tpl_vars['lang']), $this);?>
" class="current"><?php echo smarty_function_gt(array('s' => 'Tours'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'banners','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Banners'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'logout','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Logout'), $this);?>
</a></li>
</ul>
<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif;  if ($this->_tpl_vars['tours']): ?>
<table class="tabla">
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Tour Packages'), $this);?>
</th>
			<th>PDF</th>
			<th><?php echo smarty_function_gt(array('s' => 'Reserve'), $this);?>
</th>
		</tr>
	</thead>
	<tbody>
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
			<tr class="<?php echo smarty_function_cycle(array('values' => "tr01, tr02"), $this);?>
">
				<td>
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
				</td>
				<td>
					<?php unset($this->_sections['pd']);
$this->_sections['pd']['name'] = 'pd';
$this->_sections['pd']['loop'] = is_array($_loop=$this->_tpl_vars['tours'][$this->_sections['ut']['index']]['pdfs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pd']['show'] = true;
$this->_sections['pd']['max'] = $this->_sections['pd']['loop'];
$this->_sections['pd']['step'] = 1;
$this->_sections['pd']['start'] = $this->_sections['pd']['step'] > 0 ? 0 : $this->_sections['pd']['loop']-1;
if ($this->_sections['pd']['show']) {
    $this->_sections['pd']['total'] = $this->_sections['pd']['loop'];
    if ($this->_sections['pd']['total'] == 0)
        $this->_sections['pd']['show'] = false;
} else
    $this->_sections['pd']['total'] = 0;
if ($this->_sections['pd']['show']):

            for ($this->_sections['pd']['index'] = $this->_sections['pd']['start'], $this->_sections['pd']['iteration'] = 1;
                 $this->_sections['pd']['iteration'] <= $this->_sections['pd']['total'];
                 $this->_sections['pd']['index'] += $this->_sections['pd']['step'], $this->_sections['pd']['iteration']++):
$this->_sections['pd']['rownum'] = $this->_sections['pd']['iteration'];
$this->_sections['pd']['index_prev'] = $this->_sections['pd']['index'] - $this->_sections['pd']['step'];
$this->_sections['pd']['index_next'] = $this->_sections['pd']['index'] + $this->_sections['pd']['step'];
$this->_sections['pd']['first']      = ($this->_sections['pd']['iteration'] == 1);
$this->_sections['pd']['last']       = ($this->_sections['pd']['iteration'] == $this->_sections['pd']['total']);
?>
						<p>
							<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_pdf_url','data' => $this->_tpl_vars['tours'][$this->_sections['ut']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
" class="pdf" target="_blank"><?php echo smarty_function_gt(array('s' => 'Download'), $this);?>
</a>
						</p>
					<?php endfor; else: ?>
						<p>
							<span class="nopdf"><?php echo smarty_function_gt(array('s' => 'Download'), $this);?>
</span>
						</p>
					<?php endif; ?>
				</td>
				<td><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_book_url','data' => $this->_tpl_vars['tours'][$this->_sections['ut']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
" class="ureserve"><?php echo smarty_function_gt(array('s' => 'Reserve'), $this);?>
</a></td>
			</tr>
		<?php endfor; endif; ?>
	</tbody>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  else: ?>
<p><?php echo smarty_function_gt(array('s' => 'There are no tours'), $this);?>
</p>
<?php endif; ?>