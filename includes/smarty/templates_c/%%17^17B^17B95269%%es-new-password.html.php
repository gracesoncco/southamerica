<?php /* Smarty version 2.6.10, created on 2009-03-26 00:00:09
         compiled from stmt/es-new-password.html */ ?>
<p>Usted ha solicitado una nueva contrasena para acceder a <?php echo $this->_tpl_vars['baseurl']; ?>
.</p>
<p>Sus datos para ingresar al sitio son:</p>
<dl>
	<dt>Email:</dt>
	<dd><?php echo $this->_tpl_vars['user']['email']; ?>
</dd>
	<dt>Contrasena:</dt>
	<dd><?php echo $this->_tpl_vars['newpass']; ?>
</dd>
</dl>
<p>
	Para ingresar al sitio siga el siguiente enlace: <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
login.php"><?php echo $this->_tpl_vars['baseurl']; ?>
login.php</a>
</p>