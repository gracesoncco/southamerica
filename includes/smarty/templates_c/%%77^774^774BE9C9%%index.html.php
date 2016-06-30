<?php /* Smarty version 2.6.10, created on 2016-06-22 23:57:05
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'index.html', 58, false),array('function', 'gt', 'index.html', 58, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $this->_tpl_vars['lang']; ?>
" xml:lang="<?php echo $this->_tpl_vars['lang']; ?>
">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_tags']; ?>
" />
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['theme_url']; ?>
main.css" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php echo $this->_tpl_vars['theme_url']; ?>
print.css" />
	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/moo.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/validator.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/generic.js"></script>
	
<?php if ($this->_tpl_vars['lightbox']): ?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['media_url']; ?>
lightbox/lightbox.css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['media_url']; ?>
js/lightbox_plus.js.php"></script>
<?php endif; ?>
	
<script type="text/javascript">
<?php echo '	
addLoadEvent(function (){ScrollLinks.start();
$S(\'a.popup\').action({onclick: function (evt) {
props = this.rel ? this.rel : \'width=300,height=300\';
props += \',scrollbars=no,toolbar=no,location=no,directories=no,resizable=no\';
win = window.open(this.href, this.className, props);
iz=(screen.width-win.document.body.clientWidth) / 2;
de=(screen.height-win.document.body.clientHeight) / 2;
win.moveTo(iz, de);
win.focus();
if (evt.preventDefault) evt.preventDefault();
return false;
}
});
});	
'; ?>

</script>
	


<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['baseurl']; ?>
favicon.ico" />
<title><?php echo $this->_tpl_vars['section_title']; ?>
</title>
</head>

<body>

<div id="main">

<div id="hnav2">									
<li><a href="http://www.allsouthamerica.com.pe">English Version</a></li>
</div>
			

<div id="header">

<div id="hnav">
<ul>
<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'contact','lang' => $this->_tpl_vars['lang']), $this);?>
"><img src="themes/default/images/i_contact.gif" alt="contact" border="0"><?php echo smarty_function_gt(array('s' => 'Contact Us'), $this);?>
</a></li>
<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'about','lang' => $this->_tpl_vars['lang']), $this);?>
"><img src="themes/default/images/i_about.gif" alt="About Us" border="0"><?php echo smarty_function_gt(array('s' => 'About Us'), $this);?>
</a></li>
<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'tours','lang' => $this->_tpl_vars['lang']), $this);?>
"><img src="themes/default/images/i_tours.gif" alt="Tours" border="0"><?php echo smarty_function_gt(array('s' => 'Tours'), $this);?>
</a></li>
<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'destination','lang' => $this->_tpl_vars['lang']), $this);?>
"><img src="themes/default/images/i_destinations.gif" alt="Destinations" border="0"><?php echo smarty_function_gt(array('s' => 'Destinations'), $this);?>
</a></li>
<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'index','lang' => $this->_tpl_vars['lang']), $this);?>
" title="<?php echo $this->_tpl_vars['site_name']; ?>
"><img src="themes/default/images/i_home.gif" alt="Start page" border="0"><?php echo smarty_function_gt(array('s' => 'Home'), $this);?>
</a></li>
</ul>
</div>

</div>
	
<div id="wrapper">
<div id="content">
	<?php if ($this->_tpl_vars['file']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php else: ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>

</div>	

<div id="nav">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "nav.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div id="footer">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
</div>

</body>
</html>