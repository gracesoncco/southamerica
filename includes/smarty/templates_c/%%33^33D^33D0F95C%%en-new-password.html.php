<?php /* Smarty version 2.6.10, created on 2010-02-12 05:13:46
         compiled from stmt/en-new-password.html */ ?>
<p>You requested a new password for <?php echo $this->_tpl_vars['baseurl']; ?>
.</p>
<p>Your new login information is:</p>
<dl>
	<dt>Email:</dt>
	<dd><?php echo $this->_tpl_vars['user']['email']; ?>
</dd>
	<dt>Password:</dt>
	<dd><?php echo $this->_tpl_vars['newpass']; ?>
</dd>
</dl>
<p>
	For login click: <a href="<?php echo $this->_tpl_vars['baseurl']; ?>
login.php"><?php echo $this->_tpl_vars['baseurl']; ?>
login.php</a>
</p>