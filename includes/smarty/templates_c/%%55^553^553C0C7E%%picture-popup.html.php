<?php /* Smarty version 2.6.10, created on 2010-02-23 18:04:56
         compiled from adm/picture-popup.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/picture-popup.html', 26, false),array('function', 'html_options', 'adm/picture-popup.html', 119, false),array('modifier', 'wrap', 'adm/picture-popup.html', 115, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['media_url']; ?>
admin/style.css" />
	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/generic.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/validator.js"></script>
	<script type="text/javascript">
		/*
			Este es un script totálmente improvisado, cualquier queja a su mamá :)
		*/
		<?php echo '
		c = function (tag) {
		   return window.opener.document.createElement(tag);
		}
		
		d = function (id) {
			return window.opener.document.getElementById(id);
		}
		
		addpictotour = function (picid, picname, name) {
			if ( window.opener == null ) {
				'; ?>

				alert('<?php echo smarty_function_gt(array('s' => 'Impossible to add picture.'), $this);?>
');
				<?php echo '
				self.close();
				return false;
			} else {
				if (d(\'ipic_\' + picid)) {
					'; ?>

					alert('This picture already exists.')
					<?php echo '
					return false;
				} else {
					var whatever = d(\'whatever\');
					npm = d(\'nopicturesmsg\')
					if(npm != null) npm.parentNode.removeChild(npm);
					p = c(\'P\');
					p.className = \'thumbpicitem\';
					p.id = \'thumbpiccont\' + picid;
					
					img = c(\'IMG\');
					img.id = \'pic_\' + picid;
					'; ?>

					img.src = '<?php echo $this->_tpl_vars['picsurl']; ?>
' + picname;
					<?php echo '
					img.alt = name;
					
					a = c(\'A\');
					a.href = \'#whatever\';
					'; ?>

					a.innerHTML = '[<?php echo smarty_function_gt(array('s' => 'Remove'), $this);?>
]';
					<?php echo '
					a.onclick = window.opener.removetourpicture
					a.name = p.id; 
					
					span = c(\'SPAN\');
					span.innerHTML = \'<br />\' +  name + \' \';
					span.appendChild(a);
					
					input = c(\'INPUT\');
					input.type = \'hidden\';
					input.name = \'ipictures[]\';
					input.id = \'ipic_\' + picid;
					input.value = picid;
					
					p.appendChild(img);
					p.appendChild(span);
					p.appendChild(input);
					
					whatever.appendChild(p);
				}
			}
		}	
		var a_fields = {
			\'name\': {
				'; ?>
'l': '<?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
',  // label<?php echo '
				\'r\': true,    // required
				\'t\': \'lname\',   // id of the element to highlight if input not validated
				\'mn\': 2
			},
			\'pic\': {
				'; ?>
'l': '<?php echo smarty_function_gt(array('s' => 'Picture'), $this);?>
',  // label<?php echo '
				\'r\': true,    // required
				\'t\': \'lpic\'
			}
			
		},
		o_config = {
			\'to_disable\' : [\'save\'],
			\'alert\' : 0
		}
		var v = new validator(\'frm\', a_fields, o_config);
		var cookie = \'pics-popup\';
		'; ?>

	
	</script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/moo.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/fat.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/dbx.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/dbx-key.js"></script>
	<title><?php echo $this->_tpl_vars['section_title']; ?>
</title>
</head>
<body>
	<div id="main" class="wrap">	

		<div id="advancedstuff" class="dbx-group datadetail">
		
			<fieldset id="new-pic" class="dbx-box">
				<h3 class="dbx-handle"><?php echo smarty_function_gt(array('s' => 'Nueva imagen'), $this);?>
</h3>
				<div class="dbx-content">
				<form id="frm" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['self']; ?>
" method="POST" onsubmit="return v.exec();">
					<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>		
					<p>
						<label for="t2"><?php echo smarty_function_gt(array('s' => 'Tipo'), $this);?>
:</label><br />
						<select name="t" id="t2">
							<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['pfors']), $this);?>

						</select>
					</p>
					
			
					<p><label for="name" id="lname"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
:</label> <br />
					<input type="text" name="name" id="name" size="40" maxlength="100" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
			
					<p><label for="pic" id="lpic"><?php echo smarty_function_gt(array('s' => 'Foto'), $this);?>
:</label> <br />
					<input type="file" name="pic" id="pic" size="45" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
			
					<p class="submit">
						<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'Guardar'), $this);?>
" />
						<input type="hidden" name="id" id="id" value="0" />
					</p>
				</form>
				</div>			
			</fieldset>
		</div>
			<fieldset id="lista" class="datadetail">
				<legend><?php echo smarty_function_gt(array('s' => 'Fotos existentes'), $this);?>
</legend>
				
				<form name="pfrm" id="pfrm" action="<?php echo $this->_tpl_vars['self']; ?>
" method="get">
				<label for="t" class="noblock"><?php echo smarty_function_gt(array('s' => 'Show Pictures'), $this);?>
:</label>
					<select name="t" id="t">
					<?php echo smarty_function_html_options(array('selected' => $this->_tpl_vars['t'],'options' => $this->_tpl_vars['pfors']), $this);?>

					</select>
					<input type="submit" name="psubmit" id="psubmit" value="<?php echo smarty_function_gt(array('s' => 'Show'), $this);?>
" />
				</form>
				
				<ul id="image-gallery">
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
				<li>
					<img src="<?php echo $this->_tpl_vars['picsurl']; ?>
thumb_<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picname']; ?>
" alt="<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picname']; ?>
" /><br />
					<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['name']; ?>
 [<a href="#" onclick="addpictotour(<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picid']; ?>
, 'thumb_<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['picname']; ?>
', '<?php echo $this->_tpl_vars['pictures'][$this->_sections['p']['index']]['name']; ?>
')"><?php echo smarty_function_gt(array('s' => 'Add'), $this);?>
</a>]
				</li>
				<?php endfor; else: ?>
				<p class="acenter"><?php echo smarty_function_gt(array('s' => 'No hay imágenes que mostrar'), $this);?>
</p>
				<?php endif; ?>
				</ul>
				
				<br style="clear:both" />
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<p class="acenter"><input type="button" class="button" value="<?php echo smarty_function_gt(array('s' => 'Close'), $this);?>
" name="closebutton" id="closebutton" onclick="self.close();" /></p>
			</fieldset>			

	</div>
</body>
</html>