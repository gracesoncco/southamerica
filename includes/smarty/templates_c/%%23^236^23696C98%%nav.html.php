<?php /* Smarty version 2.6.10, created on 2016-07-01 00:29:38
         compiled from adm/nav.html */ ?>
<ul id="adminmenu">
<?php $_from = $this->_tpl_vars['admin_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
   <li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
adm/<?php echo $this->_tpl_vars['item']['page']; ?>
" <?php if ($this->_tpl_vars['item']['section'] && $this->_tpl_vars['item']['section'] == $this->_tpl_vars['admin_item']): ?>class="current"<?php endif; ?>><?php echo $this->_tpl_vars['item']['title']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>

<?php if ($this->_tpl_vars['subitems']): ?>
<ul id="submenu">	
<?php $_from = $this->_tpl_vars['subitems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['page']):
?>
	<li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
adm/<?php echo $this->_tpl_vars['page']; ?>
" <?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['sub_item']): ?>class="current"<?php endif; ?>><?php echo $this->_tpl_vars['title']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>