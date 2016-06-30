<?php /* Smarty version 2.6.10, created on 2007-03-09 18:56:55
         compiled from stmt/de-home.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'stmt/de-home.html', 6, false),)), $this); ?>
<h1>Willkommen</h1>
<p><strong>RED DESCUBRIENDO PERU</strong> Heisst sie herzlich willkommen und lädt sie ein, Die architektonischen wunder dieser tausende von jahre alten und einstige hauptstadt des inka-imperiums sowie von peru zu besuchen. abenteuer, exkursionen, lange wege und viele weitere dinge die wir ihnen anbieten, sind einmalige erfahrungen, die nur wir ihnen offerieren können.</p>
<p>Professionelle führer (alle spanisch und die von ihnen gewünschte sprache sprechend) sowie eine exzellente bedienung und ein erstklassiger service ist unser markenzeichen.</p>
<p>Um mehr ueber unsere verschiedene programme zu lesen, bitten wir sie, auf die verschiedenen programme zu klicken. Zögern sie nicht, bei irgendwelchen fragen oder anregungen sowie für individuelle spezielle reisewünsche uns per e-mail zu kontaktieren (<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
contact.php?lang=<?php echo $this->_tpl_vars['lang']; ?>
">inkastravels@hotmail.com</a>).</p>
<p>Ebenfalls im angebot haben wir weltweite flug, kreuzfahrt-sowie bahntarife zu den günstigsten preisen für sie bereit. Bitte ebenfalls per e-mail kontaktieren. Wir werden sie zu ihrer vollsten zufriedenheit bedienen.</p>
<h1><?php echo smarty_function_gt(array('s' => 'Our Tours'), $this);?>
</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tour-results.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>