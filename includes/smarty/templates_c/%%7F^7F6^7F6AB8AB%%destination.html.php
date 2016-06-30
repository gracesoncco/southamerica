<?php /* Smarty version 2.6.10, created on 2016-06-23 01:06:12
         compiled from destination.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'destination.html', 7, false),)), $this); ?>
<h1><?php echo $this->_tpl_vars['section_title']; ?>
</h1>

<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['destinations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div class="borde">
<p>
	<h3><a href="<?php echo $this->_tpl_vars['baseurl'];  echo $this->_tpl_vars['destinations'][$this->_sections['n']['index']]['link']; ?>
-information.<?php echo $this->_tpl_vars['lang']; ?>
.html"><?php echo $this->_tpl_vars['destinations'][$this->_sections['n']['index']]['name']; ?>
</a></h3>
	<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_destination_url','data' => $this->_tpl_vars['destinations'][$this->_sections['n']['index']],'lang' => $this->_tpl_vars['lang']), $this);?>
">
		
	</a>
	<?php echo $this->_tpl_vars['destinations'][$this->_sections['n']['index']]['description']; ?>
</p>
</div>
<?php endfor; endif; ?>