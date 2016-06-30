<?php /* Smarty version 2.6.10, created on 2016-07-01 00:29:38
         compiled from adm/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'adm/index.html', 48, false),array('function', 'gt', 'adm/index.html', 48, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['media_url']; ?>
admin/style.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/moo.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/generic.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/fat.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/validator.js"></script>
	
	<?php if ($this->_tpl_vars['lightbox']): ?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['media_url']; ?>
lightbox/lightbox.css" />
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/lightbox_plus.js.php"></script>
	<?php endif; ?>	
	
	<?php if ($this->_tpl_vars['js']): ?>	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/dbx.js"></script>
	
	<script type="text/javascript">
	//<![CDATA[		
	var cookie = '<?php echo $this->_tpl_vars['cookiename']; ?>
';	
	<?php echo '
	function addLoadEvent(func) { // Does not work on
		if ( typeof wpOnload != \'function\' ) {
			wpOnload = func;
		} else {
			var oldonload = wpOnload;
			wpOnload = function() {
	  			oldonload();
	  			func();
			}
		}
	}
	//]]>
	</script>
	<style type="text/css">* html { overflow-x: hidden; }</style>
	'; ?>

	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/dbx-key.js"></script>
	<?php endif; ?>
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
favicon.ico" />
	<title><?php echo $this->_tpl_vars['section_title']; ?>
</title>
</head>
<body>
<div id="head">
<h1><?php echo ((is_array($_tmp=@$this->_tpl_vars['site_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Illay') : smarty_modifier_default($_tmp, 'Illay')); ?>
 <span>(<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
"><?php echo smarty_function_gt(array('s' => 'Ver sitio &raquo;'), $this);?>
</a>)</span></h1>

</div>
<div id="user_info"><p>Hola, <strong><?php echo $this->_tpl_vars['user']['name']; ?>
</strong>. [<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
logout.php" title="<?php echo smarty_function_gt(array('s' => 'Salir de esta cuenta'), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Salir'), $this);?>
</a>, <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
account.php"><?php echo smarty_function_gt(array('s' => 'Mi Cuenta'), $this);?>
</a>] </p></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="wrap">

<?php if ($this->_tpl_vars['section_title']): ?>
	<h2>
		<?php echo $this->_tpl_vars['section_title']; ?>

		<?php if ($this->_tpl_vars['lang_name']): ?><span id="lang_name">[<?php echo $this->_tpl_vars['lang_name']; ?>
]</span><?php endif; ?>
		<?php if ($this->_tpl_vars['has_tabs']): ?>		
					<span id="innav">
					( <a href="<?php echo $this->_tpl_vars['page_name']; ?>
.php" id="new_item"><?php echo smarty_function_gt(array('s' => 'Nuevo'), $this);?>
</a> |
					<a href="<?php if ($this->_tpl_vars['has_tabs'] === 1): ?>#lista<?php else:  echo $this->_tpl_vars['page_name']; ?>
-list.php<?php endif; ?>" id="list_item"><?php echo smarty_function_gt(array('s' => 'Ver lista'), $this);?>
</a> )
					</span>
		<?php endif; ?>
	</h2>
<?php endif; ?>

<?php if ($this->_tpl_vars['file']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  else: ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/intro.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
				
</div>

<?php if ($this->_tpl_vars['js']): ?>
<script type="text/javascript">if (typeof wpOnload == 'function') wpOnload();</script>
<?php endif; ?>

<div id="footer">
	<p><a href="http://tawateam.com"><img src="<?php echo $this->_tpl_vars['media_url']; ?>
admin/images/logo.gif" alt="Tawa Team Logo" title="Tawa Team" /></a></p>
</div>

</body>
</html>