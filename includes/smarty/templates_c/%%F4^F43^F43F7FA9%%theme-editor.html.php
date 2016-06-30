<?php /* Smarty version 2.6.10, created on 2007-03-09 10:55:16
         compiled from adm/theme-editor.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wrap', 'adm/theme-editor.html', 2, false),array('modifier', 'escape', 'adm/theme-editor.html', 26, false),array('function', 'gt', 'adm/theme-editor.html', 4, false),array('function', 'form_token', 'adm/theme-editor.html', 32, false),)), $this); ?>

<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>

<p><?php echo smarty_function_gt(array('s' => 'Ruta actual'), $this);?>
: <strong><?php echo $this->_tpl_vars['current_path']; ?>
</strong> <br />
<?php echo smarty_function_gt(array('s' => 'Ver'), $this);?>
: 
<?php $_from = $this->_tpl_vars['active_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
<a href="<?php echo $this->_tpl_vars['self']; ?>
?lang=<?php echo $this->_tpl_vars['lang']['lang_code']; ?>
&amp;file=<?php echo $this->_tpl_vars['current_file']['parent']; ?>
"><?php echo $this->_tpl_vars['lang']['lang_name']; ?>
</a> 
<?php endforeach; endif; unset($_from); ?> <a href="<?php echo $this->_tpl_vars['self']; ?>
?file=<?php echo $this->_tpl_vars['current_file']['parent']; ?>
">Todos los archivos</a></p>


<div id="templateside">
<h3><?php echo smarty_function_gt(array('s' => 'Archivos a editar'), $this);?>
</h3>

<ul>
	<li><a href="<?php echo $this->_tpl_vars['self']; ?>
?file=/" class="bold">Directorio Superior</a></li>
<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['files']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<li><a href="<?php echo $this->_tpl_vars['self']; ?>
?file=<?php echo $this->_tpl_vars['files'][$this->_sections['n']['index']]['path'];  echo $this->_tpl_vars['filter_lang']; ?>
"><?php echo $this->_tpl_vars['files'][$this->_sections['n']['index']]['filename']; ?>
</a></li>
<?php endfor; endif; ?>
</ul>

</div>

<form name="template" id="template" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post">

<div>
<textarea cols="70" rows="25" name="newcontent" id="newcontent" tabindex="1"><?php echo ((is_array($_tmp=$this->_tpl_vars['current_file']['contents'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
</div>
<p class="submit">
	<input type="submit" name="save" value="<?php echo smarty_function_gt(array('s' => 'Actualizar Archivo'), $this);?>
" class="bold" />
	<input type="submit" name="delete" value="<?php echo smarty_function_gt(array('s' => 'Eliminar Archivo'), $this);?>
" onclick="return confirm_msg();" />
	<input type="hidden" name="file" value="<?php echo $this->_tpl_vars['current_file']['path']; ?>
" />
	<?php echo smarty_function_form_token(array('action' => 'update'), $this);?>

</p>
</form>

<form id="newfile" action="<?php echo $this->_tpl_vars['self']; ?>
" method="post">
<p>
	<label for="newfile"><?php echo smarty_function_gt(array('s' => 'Nombre:'), $this);?>
</label>
	<input type="text" name="newfile" id="newfile" size="30" />
</p>
<p class="submit">
	<input type="submit" name="create" value="<?php echo smarty_function_gt(array('s' => 'Crear nuevo archivo'), $this);?>
" class="bold" /> (<?php echo smarty_function_gt(array('s' => 'Ruta actual'), $this);?>
: <strong><?php echo $this->_tpl_vars['current_path']; ?>
</strong>)
	<input type="hidden" name="file" value="<?php echo $this->_tpl_vars['current_file']['path']; ?>
" />
	<?php echo smarty_function_form_token(array('action' => 'create'), $this);?>

</p>
</form>

<br class="clear"/>