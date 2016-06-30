<?php /* Smarty version 2.6.10, created on 2010-02-12 05:17:42
         compiled from comments.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'comments.html', 1, false),array('function', 'html_spam', 'comments.html', 38, false),array('function', 'form_token', 'comments.html', 47, false),array('modifier', 'escape', 'comments.html', 8, false),array('modifier', 'nl2br', 'comments.html', 9, false),)), $this); ?>
<h2 id="comments"><?php echo smarty_function_gt(array('s' => 'Comments'), $this);?>
 (<a href="#commentsform"><?php echo smarty_function_gt(array('s' => 'Post a comment'), $this);?>
</a>)</h2>

<?php if ($this->_tpl_vars['comments']): ?>
	<ol id="comment-list">
	<?php unset($this->_sections['cm']);
$this->_sections['cm']['name'] = 'cm';
$this->_sections['cm']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cm']['show'] = true;
$this->_sections['cm']['max'] = $this->_sections['cm']['loop'];
$this->_sections['cm']['step'] = 1;
$this->_sections['cm']['start'] = $this->_sections['cm']['step'] > 0 ? 0 : $this->_sections['cm']['loop']-1;
if ($this->_sections['cm']['show']) {
    $this->_sections['cm']['total'] = $this->_sections['cm']['loop'];
    if ($this->_sections['cm']['total'] == 0)
        $this->_sections['cm']['show'] = false;
} else
    $this->_sections['cm']['total'] = 0;
if ($this->_sections['cm']['show']):

            for ($this->_sections['cm']['index'] = $this->_sections['cm']['start'], $this->_sections['cm']['iteration'] = 1;
                 $this->_sections['cm']['iteration'] <= $this->_sections['cm']['total'];
                 $this->_sections['cm']['index'] += $this->_sections['cm']['step'], $this->_sections['cm']['iteration']++):
$this->_sections['cm']['rownum'] = $this->_sections['cm']['iteration'];
$this->_sections['cm']['index_prev'] = $this->_sections['cm']['index'] - $this->_sections['cm']['step'];
$this->_sections['cm']['index_next'] = $this->_sections['cm']['index'] + $this->_sections['cm']['step'];
$this->_sections['cm']['first']      = ($this->_sections['cm']['iteration'] == 1);
$this->_sections['cm']['last']       = ($this->_sections['cm']['iteration'] == $this->_sections['cm']['total']);
?>
	<li class="comment-box" id="comment-<?php echo $this->_tpl_vars['comments'][$this->_sections['cm']['index']]['commentid']; ?>
">
		<div class="comment">
			<p class="comment_meta" id="<?php echo $this->_tpl_vars['comments'][$this->_sections['cm']['index']]['commentid']; ?>
"><em><?php echo ((is_array($_tmp=$this->_tpl_vars['comments'][$this->_sections['cm']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall') : smarty_modifier_escape($_tmp, 'htmlall')); ?>
</em> <?php echo $this->_tpl_vars['comments'][$this->_sections['cm']['index']]['pdate']; ?>
</p>
			<p><?php echo ((is_array($_tmp=$this->_tpl_vars['comments'][$this->_sections['cm']['index']]['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
		</div>
	</li>
	<?php endfor; endif; ?>
	</ol>
<?php else: ?>
	<p><?php echo smarty_function_gt(array('s' => 'There are no comments'), $this);?>
</p>
<?php endif; ?>
<p class="acenter"><a href="#content" class="top"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>

<h2 id="commentsform"><?php echo smarty_function_gt(array('s' => 'Post a comment'), $this);?>
</h2>

<?php if ($this->_tpl_vars['moderation']): ?>
<p class="warning"><?php echo smarty_function_gt(array('s' => "Thanks for sharing your feedback! If your feedback does not appear right away, please be patient, it may take some time to publish because the site's administrator is moderating comments."), $this);?>
.</p>
<?php endif; ?>

<form action="<?php echo $this->_tpl_vars['baseurl']; ?>
comment.php" method="post" id="frmcomments">
	<fieldset>
		<legend><?php echo smarty_function_gt(array('s' => 'Comment Data'), $this);?>
</legend>
		<p><label for="name" class="noblock"><?php echo smarty_function_gt(array('s' => 'Name'), $this);?>
:</label> <br />
		<input type="text" name="name" id="name" size="40" maxlength="200" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span></p>
		<p><label for="email" class="noblock"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label><br />
		<input type="text" name="email" id="email" size="40" maxlength="100" /> <span class="req" title="<?php echo smarty_function_gt(array('s' => 'Required field'), $this);?>
">*</span>
		</p>
		
		<p><label for="description" class="noblock"><?php echo smarty_function_gt(array('s' => 'Consults, comments or suggestions'), $this);?>
:</label><br /> 
		<textarea name="description" id="description" cols="45" rows="6"></textarea></p>
		
		<p>
		<?php echo smarty_function_html_spam(array(), $this);?>

		</p>
		
		<p id="msg" <?php if ($this->_tpl_vars['msg']): ?>class="msg"<?php endif; ?>><?php echo $this->_tpl_vars['msg']; ?>
</p>
		
		<p class="button">
			<input type="submit" name="save" id="save" value="<?php echo smarty_function_gt(array('s' => 'Send'), $this);?>
" onclick="" />
			<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['tour']['tourid']; ?>
" />
			<input type="hidden" name="lang" id="lang" value="<?php echo $this->_tpl_vars['lang']; ?>
" />
			<?php echo smarty_function_form_token(array(), $this);?>

		</p>
	</fieldset>
</form>