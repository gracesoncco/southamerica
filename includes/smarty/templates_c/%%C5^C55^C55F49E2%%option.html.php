<?php /* Smarty version 2.6.10, created on 2010-02-12 06:14:40
         compiled from adm/option.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wrap', 'adm/option.html', 33, false),array('modifier', 'escape', 'adm/option.html', 56, false),array('function', 'gt', 'adm/option.html', 40, false),array('function', 'html_options', 'adm/option.html', 67, false),array('function', 'form_token', 'adm/option.html', 118, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/tiny_mce/tiny_mce_gzip.php"></script>
<script type="text/javascript">
<?php echo '
	tinyMCE.init({
		mode : "exact",
		elements : "site_footer, signature",
		textarea_trigger : "title",
		width : "100%",
		theme : "advanced",
		theme_advanced_buttons1 : "bold,italic,strikethrough,separator,bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,image,undo,redo,code,search,replace",
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
		plugins: "searchreplace"
	});

'; ?>

</script>

<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>

<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm">
	<fieldset class="datadetail">
	
	<div class="dbx-group" id="optiondiv">
	<fieldset class="dbx-box" id="datadiv">
		<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Información del Sitio'), $this);?>
</h3>
		<div class="dbx-content">
		<p><label for="name" id="lname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Nombre del Sitio'), $this);?>
:</label> <br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['options']['name']; ?>
" size="40" class="ohp" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span></p>
		<p><label for="slogan" id="lslogan" class="noblock"><?php echo smarty_function_gt(array('s' => 'Eslogan'), $this);?>
:</label><br /> 
		<textarea name="slogan" id="slogan" cols="45" rows="6" class="ohp"><?php echo $this->_tpl_vars['options']['slogan']; ?>
</textarea> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span></p>
		</div>
	</fieldset>
	<fieldset class="dbx-box" id="contactdiv">
		<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Información de Contacto'), $this);?>
</h3>
		<div class="dbx-content">
		<p><label for="site_admin" id="lsiteadmin" class="noblock"><?php echo smarty_function_gt(array('s' => 'Administrador del Sitio'), $this);?>
:</label> <br />
		<input type="text" name="site_admin" id="site_admin" value="<?php echo $this->_tpl_vars['options']['site_admin']; ?>
" size="40" class="ohp" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span></p>
		<p><label for="site_mail" id="lsitemail" class="noblock"><?php echo smarty_function_gt(array('s' => 'E-mail principal'), $this);?>
:</label> <br />
		<input type="text" name="site_mail" id="site_mail" value="<?php echo $this->_tpl_vars['options']['site_mail']; ?>
" size="40" class="ohp" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Campo requerido'), $this);?>
">*</span></p>
		<p><label for="signature" id="lsignature" class="noblock"><?php echo smarty_function_gt(array('s' => 'Firma'), $this);?>
:</label><br /> 
		<textarea name="signature" id="signature" cols="45" rows="6" class="ohp"><?php echo ((is_array($_tmp=$this->_tpl_vars['options']['signature'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></p>
		</div>
	</fieldset>
	<fieldset class="dbx-box" id="tecnic-box">
		<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Datos técnicos'), $this);?>
</h3>
		<div class="dbx-content">
		<div id="your-profile">
		<fieldset>
			<p>
			<label for="default_destination" class="noblock"><?php echo smarty_function_gt(array('s' => 'Destino prederminado'), $this);?>
:</label><br />
			<select name="default_destination" id="default_destination">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['destinations'],'selected' => $this->_tpl_vars['options']['default_destination'],'display_m' => 'name','value_m' => 'destid'), $this);?>

			</select>
			</p>
			
			<p>
				<label for="default_lang" class="noblock"><?php echo smarty_function_gt(array('s' => 'Lenguaje predeterminado'), $this);?>
:</label><br />
				<select name="default_lang" id="default_lang">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['langs'],'selected' => $this->_tpl_vars['options']['default_lang'],'display_m' => 'lang_name','value_m' => 'lang_code'), $this);?>

				</select>
			</p>
			
			<p>
				<input type="checkbox" style="width: 20px;" id="user_agent_language" name="user_agent_language" <?php if ($this->_tpl_vars['options']['user_agent_language']): ?>checked="checked"<?php endif; ?> />  
				<label class="noblock" for="user_agent_language"><?php echo smarty_function_gt(array('s' => 'Mostrar páginas según idioma del navegador del cliente'), $this);?>
*</label>
			</p>			
			
			<p>*: Internet Explorer, Firefox, etc.</p>
		</fieldset>
		<fieldset>
			<p>
				<label for="default_country"><?php echo smarty_function_gt(array('s' => 'País predeterminado'), $this);?>
</label><br />
				<select name="default_country" id="default_country">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['options']['default_country']), $this);?>

				</select>
			</p>
			<p>
				<label for="meta_tags" id="lmetatags" class="noblock">Meta Tags:</label><br /> 
				<textarea name="meta_tags" id="meta_tags" cols="45" rows="6" class="ohp"><?php echo $this->_tpl_vars['options']['meta_tags']; ?>
</textarea>
			</p>
			
		</fieldset>
		</div>

		<br style="clear:left;" />
		<p><label for="site_footer" id="lfooter" class="noblock"><?php echo smarty_function_gt(array('s' => 'Pie de página'), $this);?>
:</label><br /> 
		<textarea name="site_footer" id="site_footer" cols="45" rows="6" class="ohp"><?php echo ((is_array($_tmp=$this->_tpl_vars['options']['site_footer'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></p>
		</div>
	</fieldset>	
	<fieldset class="dbx-box" id="comment-box">
		<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Comentarios y Notificaciones'), $this);?>
</h3>		
		<div class="dbx-content">
		<p><input type="checkbox" id="send_book_notification" name="send_book_notification" <?php if ($this->_tpl_vars['options']['send_book_notification']): ?>checked="checked"<?php endif; ?> />  
			<label for="send_book_notification"><?php echo smarty_function_gt(array('s' => 'Enviar una notificación al recibir una nueva reserva'), $this);?>
.</label></p>
			
		<p><input type="checkbox" id="send_comment_notification" name="send_comment_notification" <?php if ($this->_tpl_vars['options']['send_comment_notification']): ?>checked="checked"<?php endif; ?> />  
			<label class="noblock" for="send_comment_notification"><?php echo smarty_function_gt(array('s' => 'Enviar una notificación al recibir un nuevo comentario'), $this);?>
.</label></p>
		</div>
	</fieldset>
	</div>
	<p class="submit">
		<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'Guardar Opciones'), $this);?>
" class="bold" />
		<?php echo smarty_function_form_token(array('action' => "update-options"), $this);?>

	</p>
	<div id="grabit" class="dbx-group"></div>
	</fieldset>
</form>