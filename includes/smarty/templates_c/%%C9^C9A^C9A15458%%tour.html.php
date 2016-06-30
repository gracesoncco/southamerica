<?php /* Smarty version 2.6.29, created on 2016-07-01 00:37:57
         compiled from adm/tour.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/tour.html', 37, false),array('function', 'html_options', 'adm/tour.html', 40, false),array('function', 'form_token', 'adm/tour.html', 119, false),array('modifier', 'wrap', 'adm/tour.html', 100, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/tiny_mce/tiny_mce_gzip.php"></script>
<script type="text/javascript">
<?php echo '
	tinyMCE.init({
		mode : "exact",
		elements : "itinerary, include, notinclude, notes",
		textarea_trigger : "title",
		width : "100%",
		theme : "advanced",
		theme_advanced_buttons1 : "pasteword,pastetext,selectall,bold,italic,strikethrough,separator,bullist,numlist,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,undo,redo,code,search,replace",
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
" method="post" name="frm" id="frm" onsubmit="return v.exec()" enctype="multipart/form-data">	
<div id="poststuff">

<div id="moremeta">
	<div id="grabit" class="dbx-group">
				<fieldset id="langdiv" class="dbx-box">
					<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Idioma'), $this);?>
</h3>
					<div class="dbx-content">
					<select name="lang" id="lang">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['active_langs'],'selected' => $this->_tpl_vars['lang'],'display_m' => 'lang_name','value_m' => 'lang_code'), $this);?>

					</select>
					</div>
				</fieldset>
				<fieldset id="typediv" class="dbx-box">
					<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Tipo'), $this);?>
</h3>
					<div class="dbx-content">
					<select name="typeid" id="typeid">
						<?php if ($this->_tpl_vars['tour']): ?>
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tourtypes'],'selected' => $this->_tpl_vars['tour']['typeid'],'display_m' => 'name','value_m' => 'typeid'), $this);?>

						<?php else: ?>
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tourtypes'],'selected' => $this->_tpl_vars['default_type'],'display_m' => 'name','value_m' => 'typeid'), $this);?>

						<?php endif; ?>
					</select>
					</div>
				</fieldset>
				<fieldset id="codediv" class="dbx-box">
					<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Código'), $this);?>
</h3>
					<div class="dbx-content">
					<input type="text" name="code" id="code" value="<?php echo $this->_tpl_vars['tour']['code']; ?>
" size="20" maxlength="20" class="upper" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
					</div>
				</fieldset>
				<fieldset id="pricediv" class="dbx-box">
					<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Precio US$'), $this);?>
</h3>
					<div class="dbx-content">
					<input type="text" name="price" id="price" value="<?php echo $this->_tpl_vars['tour']['price']; ?>
" size="20" maxlength="20" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
					</div>
				</fieldset>
				<fieldset id="destinationdiv" class="dbx-box">
					<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Destinos'), $this);?>
</h3>
					<div class="dbx-content">
					<?php unset($this->_sections['td']);
$this->_sections['td']['name'] = 'td';
$this->_sections['td']['loop'] = is_array($_loop=$this->_tpl_vars['destinations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['td']['show'] = true;
$this->_sections['td']['max'] = $this->_sections['td']['loop'];
$this->_sections['td']['step'] = 1;
$this->_sections['td']['start'] = $this->_sections['td']['step'] > 0 ? 0 : $this->_sections['td']['loop']-1;
if ($this->_sections['td']['show']) {
    $this->_sections['td']['total'] = $this->_sections['td']['loop'];
    if ($this->_sections['td']['total'] == 0)
        $this->_sections['td']['show'] = false;
} else
    $this->_sections['td']['total'] = 0;
if ($this->_sections['td']['show']):

            for ($this->_sections['td']['index'] = $this->_sections['td']['start'], $this->_sections['td']['iteration'] = 1;
                 $this->_sections['td']['iteration'] <= $this->_sections['td']['total'];
                 $this->_sections['td']['index'] += $this->_sections['td']['step'], $this->_sections['td']['iteration']++):
$this->_sections['td']['rownum'] = $this->_sections['td']['iteration'];
$this->_sections['td']['index_prev'] = $this->_sections['td']['index'] - $this->_sections['td']['step'];
$this->_sections['td']['index_next'] = $this->_sections['td']['index'] + $this->_sections['td']['step'];
$this->_sections['td']['first']      = ($this->_sections['td']['iteration'] == 1);
$this->_sections['td']['last']       = ($this->_sections['td']['iteration'] == $this->_sections['td']['total']);
?>
					<input type="checkbox" name="tdestinations[]" id="dest_<?php echo $this->_tpl_vars['destinations'][$this->_sections['td']['index']]['destid']; ?>
" value="<?php echo $this->_tpl_vars['destinations'][$this->_sections['td']['index']]['destid']; ?>
" <?php if ($this->_tpl_vars['destinations'][$this->_sections['td']['index']]['active']): ?>checked="checked"<?php endif; ?><?php if (! $this->_tpl_vars['tour'] && $this->_tpl_vars['default_destination'] == $this->_tpl_vars['destinations'][$this->_sections['td']['index']]['destid']): ?>checked="checked"<?php endif; ?> />
					<label for="dest_<?php echo $this->_tpl_vars['destinations'][$this->_sections['td']['index']]['destid']; ?>
" class="noblock"><?php echo $this->_tpl_vars['destinations'][$this->_sections['td']['index']]['name']; ?>
</label><br />
					<?php endfor; endif; ?>
					</div>
				</fieldset>
	</div>
	<!--end grabit -->
</div>
<!--end moremeta-->

<fieldset id="metadiv">
		<?php if ($this->_tpl_vars['tour']): ?>
		<p><strong><?php echo smarty_function_gt(array('s' => 'Disponible en'), $this);?>
</strong>:
			<?php unset($this->_sections['nl']);
$this->_sections['nl']['name'] = 'nl';
$this->_sections['nl']['loop'] = is_array($_loop=$this->_tpl_vars['tour']['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
.php?id=<?php echo $this->_tpl_vars['tour']['tourid']; ?>
&amp;lang=<?php echo $this->_tpl_vars['tour']['langs'][$this->_sections['nl']['index']]['lang_code']; ?>
" class="<?php echo $this->_tpl_vars['tour']['langs'][$this->_sections['nl']['index']]['filled']; ?>
"><?php echo $this->_tpl_vars['tour']['langs'][$this->_sections['nl']['index']]['name']; ?>
</a>,
			<?php endfor; endif; ?>
		</p>
		<?php else: ?>
		<p><strong><?php echo smarty_function_gt(array('s' => 'Agregar el tour en'), $this);?>
</strong>: 
			<?php $_from = $this->_tpl_vars['active_langs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
			<a href="<?php echo $this->_tpl_vars['self']; ?>
?lang=<?php echo $this->_tpl_vars['lang']['lang_code']; ?>
"><?php echo $this->_tpl_vars['lang']['lang_name']; ?>
</a>,
			<?php endforeach; else: ?>
			<?php echo smarty_function_gt(array('s' => 'Ops!, debería haber algún lenguaje'), $this);?>

			<?php endif; unset($_from); ?> (se descartarán los cambios no guardados)
		</p>
		<?php endif; ?>
</fieldset>

<?php if ($this->_tpl_vars['msg']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp)); ?>
<?php endif; ?>

<fieldset id="titlediv">
	<p>
		<label id="lname" for="name"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
 (<?php echo smarty_function_gt(array('s' => 'Requerido'), $this);?>
)</label> <br />
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['tour']['name']; ?>
" size="40" maxlength="200" /> 
	</p>
	
	<p>
		<label for="resume" id="lresume"><?php echo smarty_function_gt(array('s' => 'Resumen'), $this);?>
 (<?php echo smarty_function_gt(array('s' => 'Requerido'), $this);?>
)</label> <br />
		<textarea rows="9" cols="40" name="resume" tabindex="2" class="textarea" id="resume"><?php echo $this->_tpl_vars['tour']['resume']; ?>
</textarea>
	</p>
</fieldset>

<p class="submit">
			<input type="submit" name="save" id="save" style="font-weight: bold;" value="<?php echo smarty_function_gt(array('s' => 'Guardar Tour'), $this);?>
" />
			<?php if ($this->_tpl_vars['tour']): ?>
			<input type="submit" name="remove" value="<?php echo smarty_function_gt(array('s' => 'Eliminar Tour'), $this);?>
" onclick="return confirm_msg()" />
			<?php endif; ?>
			<?php echo smarty_function_form_token(array('action' => "update-tour"), $this);?>

			<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
			<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['tour']['tourid']; ?>
" />
</p>

<div id="advancedstuff" class="dbx-group">
	
<fieldset id="itinerarydiv" class="dbx-box">
				<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Itinerario'), $this);?>
</h3>
				<div class="dbx-content">
				<textarea name="itinerary" id="itinerary" cols="4" rows="6" class="textarea"><?php echo $this->_tpl_vars['tour']['itinerary']; ?>
</textarea>
				</div>
			</fieldset>

			<fieldset id="includediv" class="dbx-box">
				<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Incluye'), $this);?>
</h3>
				<div class="dbx-content">
				<textarea name="include" id="include" cols="45" rows="6" class="textarea"><?php echo $this->_tpl_vars['tour']['include']; ?>
</textarea>
				</div>
			</fieldset>
			<fieldset id="notincludediv" class="dbx-box">
				<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'No Incluye'), $this);?>
</h3>
				<div class="dbx-content">
				<textarea name="notinclude" id="notinclude" cols="45" rows="6" class="textarea"><?php echo $this->_tpl_vars['tour']['notinclude']; ?>
</textarea>
				</div>
			</fieldset>
			<fieldset id="notesdiv" class="dbx-box">
				<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Notas'), $this);?>
</h3>
				<div class="dbx-content">
				<textarea name="notes" id="notes" cols="45" rows="6" class="textarea"><?php echo $this->_tpl_vars['tour']['notes']; ?>
</textarea>
				</div>
			</fieldset>
			<fieldset id="picturesdiv" class="dbx-box">
				<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Imágenes'), $this);?>
</h3>
				<div class="dbx-content">
					<div id="whatever"><?php if ($this->_tpl_vars['pictures']): ?>
						<p class="acenter">[<a href="#picturesdiv" onclick="addtourpics(); return false;"><?php echo smarty_function_gt(array('s' => 'Añadir imágenes'), $this);?>
</a>]</p>
						<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pictures']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
						<p id="thumbpiccont<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picid']; ?>
" class="thumbpicitem">
							<img alt="<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['name']; ?>
" src="<?php echo $this->_tpl_vars['picsurl']; ?>
thumb_<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picname']; ?>
" id="pic_<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picid']; ?>
">
							<span><br /><?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['name']; ?>
 <a name="thumbpiccont<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picid']; ?>
" href="#whatever" rel="lnkrmvtour">[<?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
]</a></span>
							<input value="<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picid']; ?>
" id="ipic_<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picid']; ?>
" name="ipictures[]" type="hidden">
						</p>
						<?php endfor; endif; ?>
						<?php else: ?><p class="acenter"><span id="nopicturesmsg"><?php echo smarty_function_gt(array('s' => 'Tour sin imágenes'), $this);?>
</span> [<a href="#picturesdiv" onclick="addtourpics();"><?php echo smarty_function_gt(array('s' => 'Añadir imágenes'), $this);?>
</a>]</p>
						<?php endif; ?>
					</div>
					
					<!--iframe src="picture.php" style="width:100%">						
					</iframe-->
					
				</div>
			</fieldset>
			
			<fieldset id="pdfsdiv" class="dbx-box">
				<h3 class="dbx-handle">PDF</h3>
				<div class="dbx-content">
				<?php unset($this->_sections['pd']);
$this->_sections['pd']['name'] = 'pd';
$this->_sections['pd']['loop'] = is_array($_loop=$this->_tpl_vars['pdfs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<?php if ($this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['file'] == ''): ?>
					<p>
						<label for="pdf_<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang']; ?>
" class="noblock">PDF <?php echo smarty_function_gt(array('s' => 'en'), $this);?>
 '<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang_name']; ?>
':</label><br />
						<input type="file" name="pdf_<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang']; ?>
" id="pdf_<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang']; ?>
" size="60" />
					</p>
					<?php else: ?>
						<p>
							<label for="pdf_<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang']; ?>
" class="noblock">PDF <?php echo smarty_function_gt(array('s' => 'en'), $this);?>
 '<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang_name']; ?>
':</label><br />
							<div id="input<?php echo $this->_tpl_vars['tour']['tourid']; ?>
-<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang']; ?>
">
							<a href="<?php echo $this->_tpl_vars['pdfsurl']; ?>
<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['file']; ?>
" class="pdf" target="_blank"><?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['file']; ?>
</a>
							<a href="<?php echo $this->_tpl_vars['self']; ?>
?id=<?php echo $this->_tpl_vars['tour']['tourid']; ?>
&amp;lang=<?php echo $this->_tpl_vars['tour']['lang_code']; ?>
&amp;deletepdf&amp;<?php echo smarty_function_form_token(array('type' => 'url','action' => "delete-pdf"), $this);?>
" onclick="delete_pdf('<?php echo $this->_tpl_vars['tour']['tourid']; ?>
-<?php echo $this->_tpl_vars['pdfs'][$this->_sections['pd']['index']]['lang']; ?>
'); return false;" class="nb"><img src="<?php echo $this->_tpl_vars['media_url']; ?>
admin/images/delete.png" alt="<?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
" class="nb" /></a>
							</div>
						</p>
					<?php endif; ?>
				<?php endfor; endif; ?>
				<div id="divmsg"></div>
				</div>
			</fieldset>

</div>

</div>
<div class="datadetail">
<p class="updated">
<?php echo smarty_function_gt(array('s' => 'Los enlaces de color <span class="filled">azul</span> indican que el texto existe en ese idioma, caso contrario el enlace aparecerá de color <span class="unfilled">naranja</span>.'), $this);?>

</p>
</div>

</form>

<script type="text/javascript">
//<![CDATA[
	document.getElementById('name').focus();
	<?php echo '
	var a_fields = {
		\'name\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'t\': \'lname\',   // id of the element to highlight if input not validated
			\'mn\': 2
		},
		\'code\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Código'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'f\': \'alphanum\',
			\'mn\': 2
		},
		\'resume\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Resumen'), $this);?>
',  // label
			<?php echo '
			\'r\': true,    // required
			\'t\': \'lresume\',   // id of the element to highlight if input not validated
			\'mn\': 2
		}
	},
	o_config = {
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	
	c= function (tag) { // Crea un elemento
	   return document.createElement(tag);
	}
	d = function (id) { // Retorna un elemento en base al id
	   return document.getElementById(id);
	}
	e = function (evt) { // Retorna el evento
	   return (!evt) ? event : evt;
	}
	f = function (evt) { // Retorna el objeto que genera el evento
	   return evt.srcElement ?  evt.srcElement : evt.target;
	}

	function addtourpics () {
		window.open(\'pictures-popup.php\', \'picturespopup\', \'width=720, height=500, top=100, left=100, scrollbars=yes\');
	}
	
	removetourpicture = function (evt) {
		lnk = f(e(evt));
		el = d(lnk.name);
		el.parentNode.removeChild(el);
	}
	
	wte = d(\'whatever\');
	lnks = wte.getElementsByTagName("A");
	for (var i = 0; i < lnks.length; i++) {
	    if(lnks[i].rel == \'lnkrmvtour\')
	    	lnks[i].onclick = removetourpicture;
	}
	
	function http_request() {
		try {
			objetus = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				objetus= new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				objetus= false;
			}
		}
		
		if (!objetus && typeof XMLHttpRequest!=\'undefined\') {
			objetus = new XMLHttpRequest();
		}
		return objetus;
	}

	function delete_pdf (pdf) {
		if (!confirm_msg()) return false;
		ajax = http_request();
		params = "deletepdf=ajax&pdf=" + pdf;
		'; ?>

		url = "<?php echo $this->_tpl_vars['self']; ?>
?";
		<?php echo '
		ajax.open(\'POST\', url, true);
		ajax.setRequestHeader(\'Content-Type\',\'application/x-www-form-urlencoded\'); 
		ajax.send(\'&\'+params);
		ajax.onreadystatechange = function () {
                if (ajax.readyState==1) {
                        d(\'divmsg\').innerHTML = "Eliminando...";
                }
                else if (ajax.readyState==4) {
                	if (ajax.status==200)  {
                		d(\'divmsg\').innerHTML = ajax.responseText;
                		build_input(\'input\' + pdf);
                	} else
                		d(\'divmsg\').innerHTML = \'Error-[\' + ajax.status + \']-\' + ajax.responseText;
                }
        }
		return false;
	}
	
	function build_input(i) {
		d(i).innerHTML = \'\';
		var lang = i.split(\'-\');
		lang = lang[1];
		inp = c(\'INPUT\');
		inp.type = \'file\';
		inp.name = \'pdf_\' + lang;
		inp.id = inp.name;
		inp.size = 60;
		d(i).appendChild(inp);
		return;
	}
	
	'; ?>

//]]>	
</script>