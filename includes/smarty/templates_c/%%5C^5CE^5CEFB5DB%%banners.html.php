<?php /* Smarty version 2.6.10, created on 2010-02-12 05:45:33
         compiled from banners.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'banners.html', 6, false),array('function', 'gt', 'banners.html', 6, false),array('function', 'cycle', 'banners.html', 19, false),)), $this); ?>
<h1>
	<?php echo $this->_tpl_vars['section_title']; ?>

</h1>

<ul id="accounttabs">
		<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'account','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'My Information'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'utours','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Tours'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'banners','lang' => $this->_tpl_vars['lang']), $this);?>
" class="current"><?php echo smarty_function_gt(array('s' => 'Banners'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'logout','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Logout'), $this);?>
</a></li>
</ul>
<table summary="Banners" class="banners">
	<thead>
		<tr>
			<th class="acenter">Banner</th>
		</tr>
	</thead>
	<tbody>
		<?php unset($this->_sections['ba']);
$this->_sections['ba']['name'] = 'ba';
$this->_sections['ba']['loop'] = is_array($_loop=$this->_tpl_vars['banners']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ba']['show'] = true;
$this->_sections['ba']['max'] = $this->_sections['ba']['loop'];
$this->_sections['ba']['step'] = 1;
$this->_sections['ba']['start'] = $this->_sections['ba']['step'] > 0 ? 0 : $this->_sections['ba']['loop']-1;
if ($this->_sections['ba']['show']) {
    $this->_sections['ba']['total'] = $this->_sections['ba']['loop'];
    if ($this->_sections['ba']['total'] == 0)
        $this->_sections['ba']['show'] = false;
} else
    $this->_sections['ba']['total'] = 0;
if ($this->_sections['ba']['show']):

            for ($this->_sections['ba']['index'] = $this->_sections['ba']['start'], $this->_sections['ba']['iteration'] = 1;
                 $this->_sections['ba']['iteration'] <= $this->_sections['ba']['total'];
                 $this->_sections['ba']['index'] += $this->_sections['ba']['step'], $this->_sections['ba']['iteration']++):
$this->_sections['ba']['rownum'] = $this->_sections['ba']['iteration'];
$this->_sections['ba']['index_prev'] = $this->_sections['ba']['index'] - $this->_sections['ba']['step'];
$this->_sections['ba']['index_next'] = $this->_sections['ba']['index'] + $this->_sections['ba']['step'];
$this->_sections['ba']['first']      = ($this->_sections['ba']['iteration'] == 1);
$this->_sections['ba']['last']       = ($this->_sections['ba']['iteration'] == $this->_sections['ba']['total']);
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "tr01, tr02"), $this);?>
">
			<th class="acenter">
				<img src="<?php echo $this->_tpl_vars['baseurl']; ?>
banners/<?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['f']; ?>
" alt="Banner <?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['w']; ?>
x<?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['h']; ?>
" />
				<textarea class="ohp" id="ban<?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['f']; ?>
" rows="5" readonly="readonly" onfocus="if (typeof(document.layers) == 'undefined' || typeof(textarea_selected) == 'undefined') {textarea_selected = 1; this.select();}" style="display: none">&lt;p&gt;&lt;a href=&quot;<?php echo $this->_tpl_vars['baseurl']; ?>
x-<?php echo $this->_tpl_vars['paid']; ?>
&quot; title=&quot;<?php echo $this->_tpl_vars['site_name']; ?>
&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;<?php echo $this->_tpl_vars['baseurl']; ?>
banners/<?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['f']; ?>
&quot; alt=&quot;<?php echo $this->_tpl_vars['site_name']; ?>
&quot; style=&quot;border: 0&quot; /&gt;&lt;/a&gt;&lt;/p&gt;</textarea>
				<p><?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['w']; ?>
x<?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['h']; ?>
 px [<a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="Effect.Appear('ban<?php echo $this->_tpl_vars['banners'][$this->_sections['ba']['index']]['f']; ?>
');return false;"><?php echo smarty_function_gt(array('s' => 'Show Code'), $this);?>
</a>]</p>
			</th>
		</tr>
		<?php endfor; else: ?>
		<tr class="tr01">
			<th class="acenter">
				---
			</th>
		</tr>
		<?php endif; ?>
	</tbody>
</table>