<?php /* Smarty version 2.6.10, created on 2016-06-23 00:01:12
         compiled from tour.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wrap', 'tour.html', 2, false),array('function', 'gt', 'tour.html', 4, false),array('function', 'rewrite_link', 'tour.html', 6, false),)), $this); ?>
<h1><?php echo $this->_tpl_vars['tour']['name']; ?>
 <?php if ($this->_tpl_vars['tour']['price'] > 0): ?><acronym title="United States Dollar" lang="en">US$</acronym> <?php echo $this->_tpl_vars['tour']['price'];  endif; ?></h1>
<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
<div id="tour-meta">
	<h3><?php echo smarty_function_gt(array('s' => 'Booking &amp; Contact'), $this);?>
</h3>
	<ul>
		<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_book_url','data' => $this->_tpl_vars['tour']), $this);?>
" title="<?php echo smarty_function_gt(array('s' => 'Book now'), $this);?>
 '<?php echo $this->_tpl_vars['tour']['name']; ?>
'"><?php echo smarty_function_gt(array('s' => 'Book now'), $this);?>
</a></li>		
		<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_contact_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
" class="lbOn" title="<?php echo smarty_function_gt(array('s' => 'I want more information about'), $this);?>
 '<?php echo $this->_tpl_vars['tour']['name']; ?>
'"><?php echo smarty_function_gt(array('s' => 'I want more information'), $this);?>
</a></li>
		<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_recommend_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Recommend this tour'), $this);?>
</a></li>
<?php if ($this->_tpl_vars['tour']['pictures']): ?>
		<li><a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_gallery_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
"><?php echo smarty_function_gt(array('s' => 'Photo Gallery'), $this);?>
</li>
		<?php endif; ?>
	</ul>	

	<?php if ($this->_tpl_vars['tour']['pictures']): ?>
	<div id="tour-pictures">
	<?php unset($this->_sections['tp']);
$this->_sections['tp']['name'] = 'tp';
$this->_sections['tp']['loop'] = is_array($_loop=$this->_tpl_vars['tour']['pictures']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tp']['show'] = true;
$this->_sections['tp']['max'] = $this->_sections['tp']['loop'];
$this->_sections['tp']['step'] = 1;
$this->_sections['tp']['start'] = $this->_sections['tp']['step'] > 0 ? 0 : $this->_sections['tp']['loop']-1;
if ($this->_sections['tp']['show']) {
    $this->_sections['tp']['total'] = $this->_sections['tp']['loop'];
    if ($this->_sections['tp']['total'] == 0)
        $this->_sections['tp']['show'] = false;
} else
    $this->_sections['tp']['total'] = 0;
if ($this->_sections['tp']['show']):

            for ($this->_sections['tp']['index'] = $this->_sections['tp']['start'], $this->_sections['tp']['iteration'] = 1;
                 $this->_sections['tp']['iteration'] <= $this->_sections['tp']['total'];
                 $this->_sections['tp']['index'] += $this->_sections['tp']['step'], $this->_sections['tp']['iteration']++):
$this->_sections['tp']['rownum'] = $this->_sections['tp']['iteration'];
$this->_sections['tp']['index_prev'] = $this->_sections['tp']['index'] - $this->_sections['tp']['step'];
$this->_sections['tp']['index_next'] = $this->_sections['tp']['index'] + $this->_sections['tp']['step'];
$this->_sections['tp']['first']      = ($this->_sections['tp']['iteration'] == 1);
$this->_sections['tp']['last']       = ($this->_sections['tp']['iteration'] == $this->_sections['tp']['total']);
?>
	<?php if ($this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['pfor'] != 'm'): ?>
	<p class="thumbpicitem">
		<a href="<?php echo $this->_tpl_vars['picsurl']; ?>
normal_<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['picname']; ?>
" title="<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['name']; ?>
" rel="lightbox1" class="effectable"><img src="<?php echo $this->_tpl_vars['picsurl']; ?>
thumb_<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['picname']; ?>
" alt="<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['name']; ?>
" /></a><br />
		<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['name']; ?>

	</p>
	<?php endif; ?>
	<?php endfor; endif; ?>
	</div>
	<?php endif; ?>
</div>
<!--
<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_book_url','data' => $this->_tpl_vars['tour']), $this);?>
" title="<?php echo smarty_function_gt(array('s' => 'Book now'), $this);?>
 '<?php echo $this->_tpl_vars['tour']['name']; ?>
'"><?php echo smarty_function_gt(array('s' => 'Book now'), $this);?>
</a><br />
<a href="#comments" title="Post your comments about this tour"><?php echo smarty_function_gt(array('s' => 'Comments'), $this);?>
</a><br />
<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_contact_url','data' => $this->_tpl_vars['tour'],'lang' => $this->_tpl_vars['lang']), $this);?>
" class="lbOn" title="<?php echo smarty_function_gt(array('s' => 'I want more information about'), $this);?>
 '<?php echo $this->_tpl_vars['tour']['name']; ?>
'"><?php echo smarty_function_gt(array('s' => 'I want more information'), $this);?>
</a><br />
<?php if ($this->_tpl_vars['tour']['pictures'][0]['pfor'] == 'm'): ?>
<a href="<?php echo $this->_tpl_vars['picsurl']; ?>
normal_<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['picname']; ?>
" title="<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['name']; ?>
" onclick="map('<?php echo $this->_tpl_vars['tour']['pictures'][$this->_sections['tp']['index']]['picname']; ?>
'); return false;"><?php echo smarty_function_gt(array('s' => 'View Map'), $this);?>
</a><br />
<?php endif; ?>
-->

<dl id="data">
<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_tourtype_url','data' => $this->_tpl_vars['tour']['tourtype']), $this);?>
"><?php echo $this->_tpl_vars['tour']['tourtype']['name']; ?>
</a>
	
<dt><?php echo smarty_function_gt(array('s' => 'Visited Destinations'), $this);?>
:</dt>
	<dd>
		<?php unset($this->_sections['otd']);
$this->_sections['otd']['name'] = 'otd';
$this->_sections['otd']['loop'] = is_array($_loop=$this->_tpl_vars['tour']['destinations']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['otd']['show'] = true;
$this->_sections['otd']['max'] = $this->_sections['otd']['loop'];
$this->_sections['otd']['step'] = 1;
$this->_sections['otd']['start'] = $this->_sections['otd']['step'] > 0 ? 0 : $this->_sections['otd']['loop']-1;
if ($this->_sections['otd']['show']) {
    $this->_sections['otd']['total'] = $this->_sections['otd']['loop'];
    if ($this->_sections['otd']['total'] == 0)
        $this->_sections['otd']['show'] = false;
} else
    $this->_sections['otd']['total'] = 0;
if ($this->_sections['otd']['show']):

            for ($this->_sections['otd']['index'] = $this->_sections['otd']['start'], $this->_sections['otd']['iteration'] = 1;
                 $this->_sections['otd']['iteration'] <= $this->_sections['otd']['total'];
                 $this->_sections['otd']['index'] += $this->_sections['otd']['step'], $this->_sections['otd']['iteration']++):
$this->_sections['otd']['rownum'] = $this->_sections['otd']['iteration'];
$this->_sections['otd']['index_prev'] = $this->_sections['otd']['index'] - $this->_sections['otd']['step'];
$this->_sections['otd']['index_next'] = $this->_sections['otd']['index'] + $this->_sections['otd']['step'];
$this->_sections['otd']['first']      = ($this->_sections['otd']['iteration'] == 1);
$this->_sections['otd']['last']       = ($this->_sections['otd']['iteration'] == $this->_sections['otd']['total']);
?>
			<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_destination_url','data' => $this->_tpl_vars['tour']['destinations'][$this->_sections['otd']['index']]), $this);?>
"><?php echo $this->_tpl_vars['tour']['destinations'][$this->_sections['otd']['index']]['name']; ?>
</a> 
		<?php endfor; endif; ?>
	</dd>
</dl>

<?php if ($this->_tpl_vars['tour']['resume']): ?>
<h2 id="resume"><?php echo smarty_function_gt(array('s' => 'Resume'), $this);?>
</h2>
<p>
<?php echo $this->_tpl_vars['tour']['resume']; ?>

</p>
<p class="acenter"><a href="#content" class="top"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>
<?php endif; ?>

<?php if ($this->_tpl_vars['tour']['itinerary']): ?>
<h2 id="itinerary"><?php echo smarty_function_gt(array('s' => 'Itinerary'), $this);?>
</h2>
<?php echo $this->_tpl_vars['tour']['itinerary']; ?>

<p class="acenter"><a href="#content" class="top"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>
<?php endif; ?>

<?php if ($this->_tpl_vars['tour']['include']): ?>
<h2 id="include"><?php echo smarty_function_gt(array('s' => 'Include'), $this);?>
</h2>
<?php echo $this->_tpl_vars['tour']['include']; ?>

<p class="acenter"><a href="#content" class="top"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>
<?php endif; ?>

<?php if ($this->_tpl_vars['tour']['notinclude']): ?>
<h2 id="notinclude"><?php echo smarty_function_gt(array('s' => 'Not Include'), $this);?>
</h2>
<?php echo $this->_tpl_vars['tour']['notinclude']; ?>

<p class="acenter"><a href="#content" class="top"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>
<?php endif; ?>

<?php if ($this->_tpl_vars['tour']['notes']): ?>
<h2 id="notes"><?php echo smarty_function_gt(array('s' => 'Notes'), $this);?>
</h2>
<p>
<?php echo $this->_tpl_vars['tour']['notes']; ?>

</p>
<p class="acenter"><a href="#content" class="top"><?php echo smarty_function_gt(array('s' => 'Top'), $this);?>
 &uarr;</a></p>

<?php endif;  if ($this->_tpl_vars['prices']): ?>
<h2 id="hotels"><?php echo smarty_function_gt(array('s' => 'Hotels'), $this);?>
</h2>
<table class="tabla" summary="<?php echo smarty_function_gt(array('s' => 'Rooms Prices'), $this);?>
" style="width: auto !important; margin: 5px !important;">
<thead>
	<tr>
		<th><?php echo smarty_function_gt(array('s' => 'Hotels'), $this);?>
 (<?php echo $this->_tpl_vars['prices']['cities']; ?>
)</th>
		<th><?php echo smarty_function_gt(array('s' => 'Price US$'), $this);?>
</th>
	</tr>
</thead>
<tbody>
	<tr class="tr01"><th><?php echo smarty_function_gt(array('s' => 'Without Hotel US$'), $this);?>
</th><td class="aright"><?php echo $this->_tpl_vars['tour']['price']; ?>
</td></tr>
	<?php if ($this->_tpl_vars['prices']['price2']): ?><tr class="tr01"><th><?php echo $this->_tpl_vars['prices']['name2']; ?>
</th><td class="aright"><?php echo $this->_tpl_vars['prices']['price2']; ?>
</td></tr><?php endif; ?>
	<?php if ($this->_tpl_vars['prices']['price3']): ?><tr class="tr02"><th><?php echo $this->_tpl_vars['prices']['name3']; ?>
</th><td class="aright"><?php echo $this->_tpl_vars['prices']['price3']; ?>
</td></tr><?php endif; ?>
	<?php if ($this->_tpl_vars['prices']['price4']): ?><tr class="tr01"><th><?php echo $this->_tpl_vars['prices']['name4']; ?>
</th><td class="aright"><?php echo $this->_tpl_vars['prices']['price4']; ?>
</td></tr><?php endif; ?>
	<?php if ($this->_tpl_vars['prices']['price5']): ?><tr class="tr02"><th><?php echo $this->_tpl_vars['prices']['name5']; ?>
</th><td class="aright"><?php echo $this->_tpl_vars['prices']['price5']; ?>
</td></tr><?php endif; ?>
</tbody>
</table>
<?php endif; ?>

<p class="acenter big">
<a href="<?php echo smarty_function_rewrite_link(array('func' => 'template_book_url','data' => $this->_tpl_vars['tour']), $this);?>
"><strong><?php echo smarty_function_gt(array('s' => 'Book now'), $this);?>
 '<?php echo $this->_tpl_vars['tour']['name']; ?>
'</strong></a>
</p>
