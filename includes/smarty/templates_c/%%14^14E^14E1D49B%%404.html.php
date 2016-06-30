<?php /* Smarty version 2.6.10, created on 2016-06-22 23:57:07
         compiled from 404.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', '404.html', 1, false),array('function', 'gt', '404.html', 2, false),array('function', 'rewrite_link', '404.html', 7, false),)), $this); ?>
<h1><?php echo ((is_array($_tmp=@$this->_tpl_vars['section_title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Page not found') : smarty_modifier_default($_tmp, 'Page not found')); ?>
</h1>
<p><?php echo smarty_function_gt(array('s' => 'Sorry, the page you are looking for might have been removed, had its name changed, or is temporarily unavailable.'), $this);?>
</p>
<?php if ($this->_tpl_vars['tours']): ?>
<h2><?php echo smarty_function_gt(array('s' => 'Related pages:'), $this);?>
</h2>
<ul>
<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['tours']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','lang' => $this->_tpl_vars['lang'],'data' => $this->_tpl_vars['tours'][$this->_sections['n']['index']]), $this);?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
</a></li>
<?php endfor; endif; ?>
</ul>
<?php endif; ?>
<p><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'index','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Go home'), $this);?>
</a>