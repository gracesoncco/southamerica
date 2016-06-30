<?php /* Smarty version 2.6.10, created on 2010-02-12 06:19:03
         compiled from adm/lang.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/lang.html', 3, false),array('modifier', 'wrap', 'adm/lang.html', 4, false),)), $this); ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm">
	<fieldset class="datadetail">
		<legend><?php echo smarty_function_gt(array('s' => 'Idiomas activos e inactivos'), $this);?>
</legend>
		<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
		<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<input type="checkbox" name="llangs[]" id="lang_<?php echo $this->_tpl_vars['langs'][$this->_sections['n']['index']]['lang_code']; ?>
" value="<?php echo $this->_tpl_vars['langs'][$this->_sections['n']['index']]['lang_code']; ?>
" <?php if ($this->_tpl_vars['langs'][$this->_sections['n']['index']]['active']): ?>checked="checked"<?php endif; ?> />
		<label for="lang_<?php echo $this->_tpl_vars['langs'][$this->_sections['n']['index']]['lang_code']; ?>
" class="noblock"><?php echo $this->_tpl_vars['langs'][$this->_sections['n']['index']]['lang_name']; ?>
</label>
		<?php endfor; endif; ?>
		<p class="submit">
			<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'Save'), $this);?>
" />
			<input type="hidden" name="action" id="action" value="save" />
		</p>
	</fieldset>
	<div class="datadetail">
<p class="updated">
<?php echo smarty_function_gt(array('s' => 'Los idiomas que están seleccionados están activos y por ende se puede completar información en esos idiomas. Al menos un idioma tiene que ser activado.'), $this);?>
</p>
</div>
</form>