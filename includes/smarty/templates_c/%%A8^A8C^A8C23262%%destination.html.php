<?php /* Smarty version 2.6.10, created on 2010-02-12 22:15:33
         compiled from adm/destination.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wrap', 'adm/destination.html', 34, false),array('function', 'gt', 'adm/destination.html', 36, false),array('function', 'html_options', 'adm/destination.html', 45, false),array('function', 'form_token', 'adm/destination.html', 59, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/tiny_mce/tiny_mce_gzip.php"></script>
<script type="text/javascript">
<?php echo '
	tinyMCE.init({
		mode : "exact",
		elements : "description",
		textarea_trigger : "title",
		width : "100%",
		theme : "advanced",
		theme_advanced_buttons1 : "pasteword,pastetext,selectall,bold,italic,strikethrough,separator,bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,image,undo,redo,code,search,replace",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		remove_script_host : false,
		browsers : "msie,gecko,opera",
		dialog_type : "modal",
		entity_encoding : "raw",
		relative_urls : false,
		force_p_newlines : true,
		force_br_newlines : false,
		convert_newlines_to_brs : false,
		remove_linebreaks : true,
		plugins: "searchreplace,paste"
	});
'; ?>

</script>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm" onsubmit="return v.exec()">
	<fieldset class="datadetail">
		<legend>Datos</legend>
		<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
		<?php if ($this->_tpl_vars['destination']): ?>
		<p><strong><?php echo smarty_function_gt(array('s' => 'Agregar descripción en'), $this);?>
</strong>:
			<?php unset($this->_sections['nl']);
$this->_sections['nl']['name'] = 'nl';
$this->_sections['nl']['loop'] = is_array($_loop=$this->_tpl_vars['destination']['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nl']['show'] = true;
$this->_sections['nl']['max'] = $this->_sections['nl']['loop'];
$this->_sections['nl']['step'] = 1;
$this->_sections['nl']['start'] = $this->_sections['nl']['step'] > 0 ? 0 : $this->_sections['nl']['loop']-1;
if ($this->_sections['nl']['show']) {
    $this->_sections['nl']['total'] = $this->_sections['nl']['loop'];
    if ($this->_sections['nl']['total'] == 0)
        $this->_sections['nl']['show'] = false;
} else
    $this->_sections['nl']['total'] = 0;
if ($this->_sections['nl']['show']):

            for ($this->_sections['nl']['index'] = $this->_sections['nl']['start'], $this->_sections['nl']['iteration'] = 1;
                 $this->_sections['nl']['iteration'] <= $this->_sections['nl']['total'];
                 $this->_sections['nl']['index'] += $this->_sections['nl']['step'], $this->_sections['nl']['iteration']++):
$this->_sections['nl']['rownum'] = $this->_sections['nl']['iteration'];
$this->_sections['nl']['index_prev'] = $this->_sections['nl']['index'] - $this->_sections['nl']['step'];
$this->_sections['nl']['index_next'] = $this->_sections['nl']['index'] + $this->_sections['nl']['step'];
$this->_sections['nl']['first']      = ($this->_sections['nl']['iteration'] == 1);
$this->_sections['nl']['last']       = ($this->_sections['nl']['iteration'] == $this->_sections['nl']['total']);
?>
				<a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php?id=<?php echo $this->_tpl_vars['destination']['destid']; ?>
&amp;lang=<?php echo $this->_tpl_vars['destination']['langs'][$this->_sections['nl']['index']]['lang_code']; ?>
" class="<?php echo $this->_tpl_vars['destination']['langs'][$this->_sections['nl']['index']]['filled']; ?>
"><?php echo $this->_tpl_vars['destination']['langs'][$this->_sections['nl']['index']]['name']; ?>
</a>,
			<?php endfor; endif; ?>
		</p>
		<?php endif; ?>
		
		<p><label for="lang" class="noblock"><?php echo smarty_function_gt(array('s' => 'Idioma'), $this);?>
:</label> <br />
		<select name="lang" id="lang">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['active_langs'],'selected' => $this->_tpl_vars['lang'],'value_m' => 'lang_code','display_m' => 'lang_name'), $this);?>

		</select>
		</p>
		<p><label for="name" id="lname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
:</label> <br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['destination']['name']; ?>
" size="40" maxlength="100" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span></p>
		<p><label for="description" id="ldescription" class="noblock"><?php echo smarty_function_gt(array('s' => "Descripción"), $this);?>
:</label><br />
		<textarea name="description" id="description" cols="45" rows="6" class="ohp"><?php echo $this->_tpl_vars['destination']['description']; ?>
</textarea>
		</p>

		<p class="submit">
			<input type="submit" name="save" id="save" class="bold" value="<?php echo smarty_function_gt(array('s' => 'Guardar Destino'), $this);?>
" />
			<?php if ($this->_tpl_vars['destination']): ?>
			<input type="submit" name="remove" id="remove" value="<?php echo smarty_function_gt(array('s' => 'Eliminar Destino'), $this);?>
" onclick="return confirm_msg()" />
			<?php endif; ?>
			<?php echo smarty_function_form_token(array('action' => "update-destination"), $this);?>

			<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['destination']['destid']; ?>
" />
		</p>
	</fieldset>
</form>

<div class="datadetail">
<p class="updated">
<?php echo smarty_function_gt(array('s' => 'Los enlaces de color <span class="filled">azul</span> indican que el texto existe en ese idioma, caso contrario el enlace aparecerá de color <span class="unfilled">naranja</span>.'), $this);?>

</p>
</div>

<script type="text/javascript">
	document.getElementById('name').focus();
	<?php echo '
	var a_fields = {
		\'name\': { '; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'t\': \'lname\',   // id of the element to highlight if input not validated
			\'mn\': 2
		}
	},
	o_config = {
		\'to_disable\' : [\'save\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	'; ?>

</script>