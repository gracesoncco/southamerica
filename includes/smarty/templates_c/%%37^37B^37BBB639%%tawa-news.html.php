<?php /* Smarty version 2.6.29, created on 2016-07-01 00:38:08
         compiled from adm/tawa-news.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/tawa-news.html', 4, false),array('function', 'cycle', 'adm/tawa-news.html', 11, false),)), $this); ?>
<div id="devnews">

<p>
<?php echo smarty_function_gt(array('s' => 'Ver: '), $this);?>

<a href="<?php echo $this->_tpl_vars['self']; ?>
"><?php echo smarty_function_gt(array('s' => 'Resúmenes'), $this);?>
</a>
|
<a href="<?php echo $this->_tpl_vars['self']; ?>
?full"><?php echo smarty_function_gt(array('s' => 'Noticias completas'), $this);?>
</a>
</p>

<?php $_from = $this->_tpl_vars['rss']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div class="<?php echo smarty_function_cycle(array('values' => "comment, alternate"), $this);?>
">
	<h4><a href="<?php echo $this->_tpl_vars['item']['link']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a> &#8212; <?php echo $this->_tpl_vars['item']['pubdate']; ?>
</h4>
	<p><?php echo $this->_tpl_vars['item']['description']; ?>
</p>
</div>
<?php endforeach; endif; unset($_from); ?>
</div>