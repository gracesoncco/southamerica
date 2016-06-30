<?php /* Smarty version 2.6.10, created on 2016-06-23 00:28:24
         compiled from reserve.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'reserve.html', 2, false),array('function', 'rewrite_link', 'reserve.html', 2, false),array('function', 'html_options', 'reserve.html', 23, false),array('function', 'html_select_date', 'reserve.html', 51, false),array('modifier', 'wrap', 'reserve.html', 4, false),)), $this); ?>
<?php if ($this->_tpl_vars['tour']): ?>
<h1><?php echo smarty_function_gt(array('s' => 'Book'), $this);?>
: <a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo $this->_tpl_vars['tour']['name']; ?>
</a></h1>
<p><?php echo $this->_tpl_vars['tour']['resume']; ?>
</p>
<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" id="frmreserve" onsubmit="return v.exec()">
<fieldset>
	<legend><?php echo smarty_function_gt(array('s' => 'Personal Information'), $this);?>
</legend>
	<p>
		<label for="rname" id="lrname"><?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
:</label>
		<input type="text" id="rname" name="rname" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="remail" id="lremail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label>
		<input type="text" id="remail" name="remail" size="40" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
	</p>
	<p>
		<label for="rcity"><?php echo smarty_function_gt(array('s' => 'City'), $this);?>
:</label>
		<input type="text" id="rcity" name="rcity" />
	</p>
	<p>
		<label for="rctry"><?php echo smarty_function_gt(array('s' => 'Country'), $this);?>
:</label>
		<select name="rctry" id="rctry">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['default_country']), $this);?>

		</select>
	</p>
	<p>
		<label for="rphone"><?php echo smarty_function_gt(array('s' => 'Phone'), $this);?>
:</label>
		<input type="text" id="rphone" name="rphone" />
	</p>
	<p>
		<label for="rfax"><?php echo smarty_function_gt(array('s' => 'Fax'), $this);?>
:</label>
		<input type="text" id="rfax" name="rfax" />
	</p>
</fieldset>
<fieldset>
	<legend><?php echo smarty_function_gt(array('s' => 'Rooms Prices'), $this);?>
</legend>
	<ul class="clear" style="list-style-type: none;">
		<li><input type="radio" name="price" id="price1" checked="checked" value="price1" /> <label for="price1" class="noblock"><?php echo smarty_function_gt(array('s' => 'Without Hotel US$'), $this); echo $this->_tpl_vars['tour']['price']; ?>
</label></li>
		<?php if ($this->_tpl_vars['prices']): ?>
		<?php if ($this->_tpl_vars['prices']['price2']): ?><li><input type="radio" name="price" id="price2" value="price2" /> <label for="price2" class="noblock"><?php echo $this->_tpl_vars['prices']['name2']; ?>
 - <?php echo $this->_tpl_vars['prices']['city2']; ?>
  US$<?php echo $this->_tpl_vars['prices']['price2']; ?>
 (<?php echo smarty_function_gt(array('s' => '2 Stars Hotel'), $this);?>
)</li><?php endif; ?>
		<?php if ($this->_tpl_vars['prices']['price3']): ?><li><input type="radio" name="price" id="price3" value="price3" /> <label for="price3" class="noblock"><?php echo $this->_tpl_vars['prices']['name3']; ?>
 - <?php echo $this->_tpl_vars['prices']['city3']; ?>
  US$<?php echo $this->_tpl_vars['prices']['price3']; ?>
 (<?php echo smarty_function_gt(array('s' => '3 Stars Hotel'), $this);?>
)</li><?php endif; ?>
		<?php if ($this->_tpl_vars['prices']['price4']): ?><li><input type="radio" name="price" id="price4" value="price4" /> <label for="price4" class="noblock"><?php echo $this->_tpl_vars['prices']['name4']; ?>
 - <?php echo $this->_tpl_vars['prices']['city4']; ?>
  US$<?php echo $this->_tpl_vars['prices']['price4']; ?>
 (<?php echo smarty_function_gt(array('s' => '4 Stars Hotel'), $this);?>
)</li><?php endif; ?>
		<?php if ($this->_tpl_vars['prices']['price5']): ?><li><input type="radio" name="price" id="price5" value="price5" /> <label for="price5" class="noblock"><?php echo $this->_tpl_vars['prices']['name5']; ?>
 - <?php echo $this->_tpl_vars['prices']['city5']; ?>
  US$<?php echo $this->_tpl_vars['prices']['price5']; ?>
 (<?php echo smarty_function_gt(array('s' => '5 Stars Hotel'), $this);?>
)</li><?php endif; ?>
		<?php endif; ?>
	</ul>
</fieldset>
<fieldset>
	<legend><?php echo smarty_function_gt(array('s' => 'Reservation Information'), $this);?>
</legend>
	<p>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Arrival Date'), $this);?>
:</label><br />
		<?php echo smarty_function_html_select_date(array('prefix' => 'r_','start_year' => "-0",'end_year' => "+10",'field_order' => 'DMY'), $this);?>

	</p>
	<div id="reservedetails">
	<p class="fleft">
		<label class="noblock" for="radults"><?php echo smarty_function_gt(array('s' => 'Adults'), $this);?>
:</label><br />
		<select name="radults" id="radults">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['radults']), $this);?>

		</select>
	</p>
	<p class="fleft">
		<label class="noblock" for="rchilds"><?php echo smarty_function_gt(array('s' => 'Children'), $this);?>
:</label><br />
		<select name="rchilds" id="rchilds">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['rchildstudents']), $this);?>

		</select>
	</p>
	<p class="fleft">
		<label class="noblock" for="rstudents"><?php echo smarty_function_gt(array('s' => 'Students'), $this);?>
:</label><br />
		<select name="rstudents" id="rstudents">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['rchildstudents']), $this);?>

		</select>
	</p>
	<p class="clear">
		<label for="rcomm" class="noblock"><?php echo smarty_function_gt(array('s' => 'Additional Requirements'), $this);?>
:</label><br />
		<textarea id="rcomm" name="rcomm" cols="60" rows="7"></textarea>
	</p>
	<p class="button">
		<input type="submit" name="rsub" id="rsub" value="<?php echo smarty_function_gt(array('s' => 'Reserve'), $this);?>
" />
		<input type="reset" name="reset" id="reset" value="<?php echo smarty_function_gt(array('s' => 'Reset'), $this);?>
" />
		<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['tour']['tourid']; ?>
" />
		<input type="hidden" name="lang" id="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" />
	</p>
	</div>
</fieldset>
</form>

<script type="text/javascript">
	document.getElementById('rname').focus();
	<?php echo '
	var a_fields = {
		\'rname\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
',
			<?php echo '
			\'r\': true,
			\'t\': \'lrname\',
			\'mn\': 4
		},
		\'remail\': {
			'; ?>

			'l': '<?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
',
			<?php echo '
			\'r\': true,
			\'f\': \'email\',
			\'t\': \'lremail\',
			\'mn\': 4
		}
	},
	o_config = {
		\'to_disable\' : [\'rsub\'],
		\'alert\' : 0
	}
	var v = new validator(\'frmreserve\', a_fields, o_config);
	'; ?>

</script>
<?php else: ?>
<h1><?php echo smarty_function_gt(array('s' => 'Tour booking'), $this);?>
</h1>

<p><?php echo smarty_function_gt(array('s' => 'We could not find the tour you have selected. If you want more information about something, please'), $this);?>

 <a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_normal_url','data' => 'contact','lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'contact us'), $this);?>
.</a>
</p>

<?php if ($this->_tpl_vars['tours']): ?>
<p><?php echo smarty_function_gt(array('s' => 'This tours are related to the tour you were trying to book'), $this);?>
:</p>
<ul>
<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['tours']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
	<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tour_url','lang' => $this->_tpl_vars['lang'],'data' => $this->_tpl_vars['tours'][$this->_sections['n']['index']]), $this);?>
"><?php echo $this->_tpl_vars['tours'][$this->_sections['n']['index']]['name']; ?>
</a></li>
<?php endfor; endif; ?>
</ul>
<?php endif; ?>

<?php endif; ?>