<?php /* Smarty version 2.6.10, created on 2010-02-12 05:45:36
         compiled from account.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite_link', 'account.html', 6, false),array('function', 'gt', 'account.html', 6, false),array('function', 'html_options', 'account.html', 24, false),array('modifier', 'wrap', 'account.html', 12, false),)), $this); ?>
<h1>
	<?php echo $this->_tpl_vars['section_title']; ?>

</h1>

<ul id="accounttabs">
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'account','lang' => $this->_tpl_vars['lang']), $this);?>
" class="current"><?php echo smarty_function_gt(array('s' => 'My Information'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'utours','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Tours'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'banners','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Banners'), $this);?>
</a></li>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'logout','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Logout'), $this);?>
</a></li>
</ul>

<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" id="frm" onsubmit="return v.exec()">
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Personal Information'), $this);?>
</legend>
		<p><label for="name" id="lname"><?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
:</label> 
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['user']['name']; ?>
" size="40" maxlength="200" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p><label for="email" id="lemail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" size="40" maxlength="100" disabled="disabled" name="demail" id="demail" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
		<input type="hidden" name="email" id="email" value="<?php echo $this->_tpl_vars['user']['email']; ?>
" />
		</p>
		<p><label for="country_code"><?php echo smarty_function_gt(array('s' => 'Country'), $this);?>
:</label> 
		<select name="country_code" id="country_code">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['user']['country_code']), $this);?>

		</select>
		</p>
	</fieldset>
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'System Information'), $this);?>
</legend>
		<p><label for="pwd" id="lpwd"><?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
:</label> 
		<input type="password" name="pwd" id="pwd" <?php if ($this->_tpl_vars['action'] != 'update'): ?>value="<?php echo $this->_tpl_vars['user']['pwd']; ?>
"<?php endif; ?> size="20" maxlength="15" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p><label for="pwd2" id="lpwd2"><?php echo smarty_function_gt(array('s' => 'Again'), $this);?>
:</label> 
		<input type="password" name="pwd2" id="pwd2" <?php if ($this->_tpl_vars['action'] != 'update'): ?>value="<?php echo $this->_tpl_vars['user']['pwd']; ?>
"<?php endif; ?> size="20" maxlength="15" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p class="tip"><?php echo smarty_function_gt(array('s' => 'If you don\'t change the password, don\'t write'), $this);?>
</p>
	</fieldset>
	<fieldset>
		<legend accesskey="U"><?php echo smarty_function_gt(array('s' => 'Company\'s Information'), $this);?>
</legend>
		<p><label for="iata"><?php echo smarty_function_gt(array('s' => 'IATA Number'), $this);?>
:</label>
		<input type="text" name="iata" id="iata" value="<?php echo $this->_tpl_vars['agency']['iata']; ?>
" size="40" maxlength="12" /></p>
		<p><label for="legalname"><?php echo smarty_function_gt(array('s' => 'Legal Name'), $this);?>
:</label>
		<input type="text" name="legalname" id="legalname" value="<?php echo $this->_tpl_vars['agency']['legalname']; ?>
" size="40" maxlength="200" /></p>
		<p><label for="dbaname"><?php echo smarty_function_gt(array('s' => 'DBA Name'), $this);?>
:</label>
		<input type="text" name="dbaname" id="dbaname" value="<?php echo $this->_tpl_vars['agency']['dbaname']; ?>
" size="40" maxlength="200" /></p>
		<p><label for="agencyname"><?php echo smarty_function_gt(array('s' => 'Company Name'), $this);?>
:</label>
		<input type="text" name="agencyname" id="agencyname" value="<?php echo $this->_tpl_vars['agency']['agencyname']; ?>
" size="40" maxlength="200" /></p>
	</fieldset>
	
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Primary Contact'), $this);?>
</legend>
		<p><label for="primaryname"><?php echo smarty_function_gt(array('s' => 'Contact Name'), $this);?>
:</label> 
		<input type="text" name="primaryname" id="primaryname" value="<?php echo $this->_tpl_vars['agency']['primaryname']; ?>
" size="40" maxlength="200" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('name','primaryname'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
		<p><label for="primaryemail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['primaryemail']; ?>
" size="40" maxlength="100" name="primaryemail" id="primaryemail" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('email','primaryemail'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
		<p><label for="siteinfo"><?php echo smarty_function_gt(array('s' => 'Site URL'), $this);?>
:</label> 
		<input type="text" name="siteinfo" id="siteinfo" value="<?php echo $this->_tpl_vars['agency']['siteinfo']; ?>
" size="40" maxlength="200" /></p>
		<p><label for="primarycountry"><?php echo smarty_function_gt(array('s' => 'Country'), $this);?>
:</label> 
		<select name="primarycountry" id="primarycountry">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['agency']['primarycountry']), $this);?>

		</select>
		 <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('country_code','primarycountry'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a>
		</p>
		<p><label for="primarycity"><?php echo smarty_function_gt(array('s' => 'City'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['primarycity']; ?>
" size="20" maxlength="50" name="primarycity" id="primarycity" /></p>
		<p><label for="primarystate"><?php echo smarty_function_gt(array('s' => 'State/Province'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['primarystate']; ?>
" size="20" maxlength="50" name="primarystate" id="primarystate" /></p>
		<p><label for="zipcode"><?php echo smarty_function_gt(array('s' => 'ZIP Code'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['zipcode']; ?>
" size="20" maxlength="10" name="zipcode" id="zipcode" /></p>
		<p><label for="address"><?php echo smarty_function_gt(array('s' => 'Address'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['address']; ?>
" size="20" maxlength="100" name="address" id="address" /></p>
		<p><label for="primaryphone"><?php echo smarty_function_gt(array('s' => 'Phone'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['primaryphone']; ?>
" size="20" maxlength="20" name="primaryphone" id="primaryphone" /></p>
		<p><label for="primaryfax"><?php echo smarty_function_gt(array('s' => 'Fax'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['primaryfax']; ?>
" size="20" maxlength="20" name="primaryfax" id="primaryfax" /></p>
		<p class="tip"><?php echo smarty_function_gt(array('s' => 'Enter the contact information for the person who will receive all communications concerning the affiliate program'), $this);?>
</p>
	</fieldset>
	
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Information for Comission Checks'), $this);?>
</legend>
		<p><label for="paytoname"><?php echo smarty_function_gt(array('s' => 'Pay to Name'), $this);?>
:</label> 
		<input type="text" name="paytoname" id="paytoname" value="<?php echo $this->_tpl_vars['agency']['paytoname']; ?>
" size="40" maxlength="200" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('name','paytoname'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
		<p><label for="paytoemail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['paytoemail']; ?>
" size="40" maxlength="100" name="paytoemail" id="paytoemail" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('email','paytoemail'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
		<p><label for="paytocountry"><?php echo smarty_function_gt(array('s' => 'Country'), $this);?>
:</label> 
		<select name="paytocountry" id="paytocountry">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['agency']['paytocountry']), $this);?>

		</select>
		 <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('country_code','paytocountry'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a>
		</p>
		<p><label for="paytocity"><?php echo smarty_function_gt(array('s' => 'City'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['paytocity']; ?>
" size="20" maxlength="50" name="paytocity" id="paytocity" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('primarycity','paytocity'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
		<p><label for="paytostate"><?php echo smarty_function_gt(array('s' => 'State/Province'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['paytostate']; ?>
" size="20" maxlength="50" name="paytostate" id="paytostate" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('primarystate','paytostate'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
		<p><label for="paytozip"><?php echo smarty_function_gt(array('s' => 'ZIP Code'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['paytozip']; ?>
" size="20" maxlength="10" name="paytozip" id="paytozip" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('zipcode','paytozip'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
		<p><label for="paytoaddress"><?php echo smarty_function_gt(array('s' => 'Address'), $this);?>
:</label> 
		<input type="text" value="<?php echo $this->_tpl_vars['agency']['paytoaddress']; ?>
" size="20" maxlength="100" name="paytoaddress" id="paytoaddress" /> <a href="<?php echo $this->_tpl_vars['self']; ?>
" onclick="copyfield('address','paytoaddress'); return false;"><?php echo smarty_function_gt(array('s' => 'Same'), $this);?>
 &uarr;</a></p>
	</fieldset>
	
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Bank Information'), $this);?>
</legend>
		<p><label for="bankname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Name of your bank'), $this);?>
:</label> <br />
		<input type="text" name="bankname" id="bankname" value="<?php echo $this->_tpl_vars['agency']['bankname']; ?>
" size="40" maxlength="200" /></p>
		<p><label for="bankaccountname" class="noblock"><?php echo smarty_function_gt(array('s' => 'Name of your bank account'), $this);?>
:</label> <br />
		<input type="text" name="bankaccountname" id="bankaccountname" value="<?php echo $this->_tpl_vars['agency']['bankaccountname']; ?>
" size="40" maxlength="200" /></p>
		<p><label for="routenumber" class="noblock"><?php echo smarty_function_gt(array('s' => 'Route number'), $this);?>
:</label> <br />
		<input type="text" name="routenumber" id="routenumber" value="<?php echo $this->_tpl_vars['agency']['routenumber']; ?>
" size="40" maxlength="50" /></p>
		<p><label for="accountnumber" class="noblock"><?php echo smarty_function_gt(array('s' => 'Account number'), $this);?>
:</label> <br />
		<input type="text" name="accountnumber" id="accountnumber" value="<?php echo $this->_tpl_vars['agency']['accountnumber']; ?>
" size="40" maxlength="50" /></p>
		<p><label for="statehold" class="noblock"><?php echo smarty_function_gt(array('s' => 'State where the account is hold'), $this);?>
:</label> <br />
		<input type="text" name="statehold" id="statehold" value="<?php echo $this->_tpl_vars['agency']['statehold']; ?>
" size="40" maxlength="100" /></p>
		
	</fieldset>
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Privacy and Policy'), $this);?>
</legend>
		<p>
			<textarea rows="10" cols="50" class="ohp"><?php echo $this->_tpl_vars['policy']; ?>
</textarea>
		</p>
	</fieldset>
	<p class="button">
		<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'I read the policies and I\'m agree'), $this);?>
" />
		<input type="button" name="cancel" id="cancel" value="<?php echo smarty_function_gt(array('s' => 'Cancel'), $this);?>
" onclick="location.href = '<?php echo $this->_tpl_vars['baseurl']; ?>
'" />
		<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
		<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['user']['userid']; ?>
" />
	</p>
</form>
<script type="text/javascript">
	document.getElementById('name').focus();
	<?php echo '
	var a_fields = {
		\'name\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
',  // label
			<?php echo '
			\'r\': true,
			\'t\': \'lname\',
			\'mn\': 2
		},
		\'pwd\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Password'), $this);?>
',  // label
			<?php echo '
			\'f\': \'alphanum\',
			\'t\': \'lpwd\',
			\'m\' : \'pwd2\'
		},
		
		\'pwd2\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Password Again'), $this);?>
',  // label
			<?php echo '
			\'f\': \'alphanum\',
			\'t\': \'lpwd2\'
		}
		
	},
	o_config = {
		\'to_disable\' : [\'save\'],
		\'alert\' : 0
	}
	var v = new validator(\'frm\', a_fields, o_config);
	
	copyfield = function(p, q) {
		document.getElementById(q).value = document.getElementById(p).value;
		return false;
	}
	'; ?>

</script>