<?php /* Smarty version 2.6.10, created on 2010-02-12 22:19:57
         compiled from adm/comment-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/comment-list.html', 2, false),array('function', 'cycle', 'adm/comment-list.html', 27, false),array('function', 'form_token', 'adm/comment-list.html', 33, false),array('modifier', 'default', 'adm/comment-list.html', 9, false),array('modifier', 'wrap', 'adm/comment-list.html', 13, false),array('modifier', 'date_format', 'adm/comment-list.html', 31, false),)), $this); ?>
<div class="datadetail">
<p><?php echo smarty_function_gt(array('s' => 'Ver los comentarios hechos en'), $this);?>
: 
<?php $_from = $this->_tpl_vars['active_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
<a href="<?php echo $this->_tpl_vars['self']; ?>
?lang=<?php echo $this->_tpl_vars['lang']['lang_code']; ?>
"><?php echo $this->_tpl_vars['lang']['lang_name']; ?>
</a>
<?php endforeach; else:  echo smarty_function_gt(array('s' => 'Ops!, debería haber algún lenguaje'), $this);?>

<?php endif; unset($_from); ?></p>
<?php if ($this->_tpl_vars['comment_count'] && ( $this->_tpl_vars['spam_filter']['method'] == 'akismet' || $this->_tpl_vars['spam_filter']['method'] == 'moderate' )): ?>
<p><a href="moderation.php"><?php echo smarty_function_gt(array('s' => 'Moderar comentarios'), $this);?>
 (<?php echo ((is_array($_tmp=@$this->_tpl_vars['comment_count'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
)</a></p>
<?php endif; ?>
</div>
<div class="datadetail">
<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
<table class="datalist" summary="<?php echo smarty_function_gt(array('s' => 'Comments List'), $this);?>
" id="lista">
	<caption><?php echo smarty_function_gt(array('s' => 'Lista de comentarios'), $this);?>
</caption>
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Tour'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Fecha'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Acciones'), $this);?>
</th>
		</tr>
	</thead>
	<tbody>
		<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<tr class="<?php echo smarty_function_cycle(array('values' => "tr01, tr02"), $this);?>
">
			<td><a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php?id=<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['commentid']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Editar'), $this);?>
 '<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['name']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['email']; ?>
</td>
			<td><?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['tour_name']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['comments'][$this->_sections['n']['index']]['pdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%b %d, %Y %T") : smarty_modifier_date_format($_tmp, "%b %d, %Y %T")); ?>
</td>
			<td class="acenter">
				<a href="<?php echo $this->_tpl_vars['self']; ?>
?id=<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['commentid']; ?>
&amp;remove&amp;<?php echo smarty_function_form_token(array('action' => "remove-comment",'type' => 'url'), $this);?>
" class="delete" title="<?php echo smarty_function_gt(array('s' => 'Borrar'), $this);?>
 '<?php echo $this->_tpl_vars['comments'][$this->_sections['n']['index']]['name']; ?>
'" onclick="return confirm_msg()"><?php echo smarty_function_gt(array('s' => 'Borrar'), $this);?>
</a>
			</td>
		</tr>		
		<?php endfor; else: ?>
		<tr class="tr01">
			<td colspan="5" class="acenter"><?php echo smarty_function_gt(array('s' => 'No hay comentarios'), $this);?>
</td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>