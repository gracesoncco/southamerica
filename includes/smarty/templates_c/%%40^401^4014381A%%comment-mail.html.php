<?php /* Smarty version 2.6.10, created on 2010-05-20 06:38:32
         compiled from stmt/comment-mail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'stmt/comment-mail.html', 2, false),)), $this); ?>
<p><?php echo $this->_tpl_vars['name']; ?>
 acaba de hacer un comentario, para ver los detalles del comentario ingrese a:<br />
<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
#comments</a></p>