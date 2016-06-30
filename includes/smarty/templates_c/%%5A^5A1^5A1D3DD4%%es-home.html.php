<?php /* Smarty version 2.6.10, created on 2010-02-15 10:22:14
         compiled from stmt/es-home.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'stmt/es-home.html', 12, false),)), $this); ?>
<table align="center" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0">
	
<tr>
<td width="455" valign ="top"> 

<h1>Bienvenido a Perú </h1> 
		 
La cultura peruana es una y muchas al mismo tiempo. El peruano de hoy es heredero de costumbres y tradiciones de civilizaciones que florecieron por siglos antes de la llegada de los europeos. Y la mezcla que produjo ese contacto se enriqueció aún más con el aporte de africanos y asiáticos, que también echaron raíces en esta tierra. 

<h1>Bienvenido a <?php echo $this->_tpl_vars['site_name']; ?>
</h1>
All South America ......................................................
<h2><?php echo smarty_function_gt(array('s' => 'We are at'), $this);?>
</h2>

<a href="http://www.peru.info" target="_blank">
<img src="themes/default/images/promperu.gif" alt="Comisión de Promoción del Perú" title="Comisión de Promoción del Perú" /></a>

<a href="http://dirceturcusco.gob.pe/dircetur/lista.php?pg=4" target="_blank">
<img src="themes/default/images/dircetur.gif" alt="Dirección Regional de Turismo - Cusco" title="Dirección Regional de Turismo - Cusco" /></a>			
			

<a href="http://www.nahui.gob.pe" target="_blank">
<img src="themes/default/images/inc.gif" alt="Direcci�n Regional de Cultura Cusco" title="Dirección Regional de Cultura - Cusco" /></a>


</td> 
<td  valign ="top"> 

<h2>Ubicación Geográfica de Perú</h2> 
<iframe width="300" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps/ms?ie=UTF8&amp;hl=es&amp;msa=0&amp;msid=113932291474361944012.000469fbe1e23cd196ef0&amp;ll=-17.978733,-61.171875&amp;spn=63.676374,52.734375&amp;t=p&amp;z=3&amp;output=embed"></iframe><br /><small>Ver <a href="http://maps.google.com/maps/ms?ie=UTF8&amp;hl=es&amp;msa=0&amp;msid=113932291474361944012.000469fbe1e23cd196ef0&amp;ll=-17.978733,-61.171875&amp;spn=63.676374,52.734375&amp;t=p&amp;z=3&amp;source=embed" style="color:#0000FF;text-align:left">Perú</a> en un mapa más grande</small>

</td> 


</tr> 

</table>
<table align="center" bgcolor="#ffffff" border="0" cellpadding="10" cellspacing="0">
	
<tr>

<td width="720" valign ="top"> 
<h1><?php echo smarty_function_gt(array('s' => 'Our Tours'), $this);?>
 en <?php echo $this->_tpl_vars['site_name']; ?>
</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tour-results.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</td> 

</tr> 

</table>