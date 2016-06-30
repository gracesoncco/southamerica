<?php /* Smarty version 2.6.10, created on 2010-02-12 06:19:06
         compiled from adm/reserve.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/reserve.html', 4, false),array('function', 'cycle', 'adm/reserve.html', 108, false),array('function', 'form_token', 'adm/reserve.html', 118, false),array('modifier', 'wrap', 'adm/reserve.html', 5, false),array('modifier', 'date_format', 'adm/reserve.html', 51, false),)), $this); ?>
<?php if ($this->_tpl_vars['reserve']): ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm">
<fieldset class="datadetail">
	<legend><?php echo smarty_function_gt(array('s' => 'Información Personal'), $this);?>
</legend>
	<?php if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>
	<p>
		<label id="lrname"><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['name']; ?>

	</p>
	<p>
		<label id="lremail"><?php echo smarty_function_gt(array('s' => 'E-Mail'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['email']; ?>

	</p>
	<?php if ($this->_tpl_vars['reserve']['city']): ?>
	<p>
		<label><?php echo smarty_function_gt(array('s' => 'Ciudad'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['city']; ?>

	</p>
	<?php endif; ?>
	<p>
		<label><?php echo smarty_function_gt(array('s' => 'País'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['country_name']; ?>

	</p>
	<?php if ($this->_tpl_vars['reserve']['phone']): ?>
	<p>
		<label><?php echo smarty_function_gt(array('s' => 'Teléfono'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['phone']; ?>

	</p>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['reserve']['fax']): ?>
	<p>
		<label><?php echo smarty_function_gt(array('s' => 'Fax'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['fax']; ?>

	</p>
	<?php endif; ?>
</fieldset>
<fieldset class="datadetail">
	<legend><?php echo smarty_function_gt(array('s' => 'Información de la Reserva'), $this);?>
</legend>
	<?php if ($this->_tpl_vars['reserve']['userdata']): ?>
	<p>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Referido por'), $this);?>
:</label>
		<a href="<?php echo $this->_tpl_vars['admurl']; ?>
user.php?id=<?php echo $this->_tpl_vars['reserve']['userdata']['userid']; ?>
"><?php echo $this->_tpl_vars['reserve']['userdata']['name']; ?>
</a>
	</p>
	<p>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Comisión'), $this);?>
:</label>
		US$ <?php echo $this->_tpl_vars['commission']; ?>

	</p>
	<?php endif; ?>
	<p>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Fecha de la reserva'), $this);?>
:</label>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['reserve']['freserve'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %B %Y %H:%m") : smarty_modifier_date_format($_tmp, "%d %B %Y %H:%m")); ?>

	</p>
	<p>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Fecha de arribo'), $this);?>
:</label>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['reserve']['adate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %B %Y") : smarty_modifier_date_format($_tmp, "%d %B %Y")); ?>

	</p>
	<p>
		<label><?php echo smarty_function_gt(array('s' => 'Cantidad de Paxs'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['adults']; ?>
 <?php echo smarty_function_gt(array('s' => 'Adultos'), $this);?>
, 
		<?php echo $this->_tpl_vars['reserve']['children']; ?>
 <?php echo smarty_function_gt(array('s' => 'Niños'), $this);?>
, 
		<?php echo $this->_tpl_vars['reserve']['students']; ?>
 <?php echo smarty_function_gt(array('s' => 'Estudiantes'), $this);?>

	</p>

	<p>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Tour reservado'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['tourname']; ?>

	</p>
	<p>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Información de hospedaje'), $this);?>
</label>
		<?php echo $this->_tpl_vars['lodge_details']['lname']; ?>
 US$ <?php echo $this->_tpl_vars['lodge_details']['lprice']; ?>

	</p>
	<div>
		<label class="noblock"><?php echo smarty_function_gt(array('s' => 'Requerimientos adicionales'), $this);?>
:</label>
		<?php echo $this->_tpl_vars['reserve']['comments']; ?>

	</div>
	<p class="submit">
		<input type="submit" name="remove" id="remove" value="<?php echo smarty_function_gt(array('s' => 'Borrar Reserva'), $this);?>
" onclick="return confirm_msg()" title="<?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
 '<?php echo $this->_tpl_vars['reserve']['name']; ?>
'" />
		<input type="button" name="cancel" id="cancel" value="<?php echo smarty_function_gt(array('s' => 'Cancelar'), $this);?>
" onclick="location.href = '<?php echo $this->_tpl_vars['self']; ?>
'" />
		<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
		<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['reserve']['reserveid']; ?>
" />
	</p>
</fieldset>
</form>
<?php else: ?>
<form action="<?php echo $this->_tpl_vars['self']; ?>
" method="post" name="frm" id="frm">
<input type="hidden" name="action" id="action" value="<?php echo $this->_tpl_vars['action']; ?>
" />
<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['reserve']['reserveid']; ?>
" />
</form>
<?php endif;  if ($this->_tpl_vars['msg']):  echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wrap', true, $_tmp) : smarty_modifier_wrap($_tmp));  endif; ?>

<div class="datadetail">
<table class="datalist" summary="Listado de Reservas" id="lista">
	<caption><?php echo smarty_function_gt(array('s' => 'Lista de Reservas'), $this);?>
</caption>
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Estado'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'País'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Tour'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Fecha'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Referido por'), $this);?>
</th>			
			<th><?php echo smarty_function_gt(array('s' => 'Acciones'), $this);?>
</th>
		</tr>
	</thead>
	<tbody>
		<?php unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['reserves']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<tr class="<?php echo smarty_function_cycle(array('values' => "tr01, tr02"), $this);?>
">
			<td class="<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['css_class']; ?>
">
				<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['status_desc']; ?>

			</td>
			<td><a href="<?php echo $this->_tpl_vars['self']; ?>
?id=<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['reserveid']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Mostrar'), $this);?>
 '<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['name']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['country']; ?>
</td>
			<td><?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['tourname']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['reserves'][$this->_sections['n']['index']]['freserve'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %B %Y %H:%m") : smarty_modifier_date_format($_tmp, "%d %B %Y %H:%m")); ?>
</td>			
			<td><?php if ($this->_tpl_vars['reserves'][$this->_sections['n']['index']]['username']): ?><a href="<?php echo $this->_tpl_vars['admurl']; ?>
user.php?id=<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['userid']; ?>
"><?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['username']; ?>
</a><?php else:  echo smarty_function_gt(array('s' => 'Cliente común'), $this); endif; ?></td>			
			<td class="acenter">
				<a href="<?php echo $this->_tpl_vars['self']; ?>
?id=<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['reserveid']; ?>
&amp;remove&amp;<?php echo smarty_function_form_token(array('action' => "remove-booking",'type' => 'url'), $this);?>
" class="delete" title="<?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
 '<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['name']; ?>
'" onclick="return confirm_msg()"><?php echo smarty_function_gt(array('s' => 'Eliminar'), $this);?>
</a>
			</td>
		</tr>
		<?php endfor; else: ?>
		<tr class="tr01">
			<td colspan="6" class="acenter"><?php echo smarty_function_gt(array('s' => 'No hay datos que mostrar'), $this);?>
</td>
		</tr>
		<?php endif; ?>
	</tbody>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm/paginator.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>