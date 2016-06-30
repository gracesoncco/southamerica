<?php /* Smarty version 2.6.10, created on 2010-02-15 10:42:07
         compiled from adm/about.html */ ?>
<div id="zeitgeist">
	<h2>Noticias</h2>
	<ul>
	<?php $_from = $this->_tpl_vars['rss']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<li><a href="<?php echo $this->_tpl_vars['item']['link']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></li>
	<?php endforeach; else: ?>
		<li>No hay ninguna noticia.</li>
	<?php endif; unset($_from); ?>
	</ul>
</div>


<h3>Misión</h3>

<p>Colaborar con nuestros clientes en la optimización de sus procesos y el logro de sus objetivos, explotando la creatividad de nuestros profesionales para brindar productos y servicios innovadores y de calidad.</p>

<h3>Visión</h3>

<p>Consolidarnos como el mejor proveedor de soluciones informáticas en el sector turismo de la Región</p>