<?php /* Smarty version 2.6.10, created on 2010-02-12 06:07:04
         compiled from adm/intro.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'adm/intro.html', 1, false),array('function', 'cycle', 'adm/intro.html', 14, false),array('modifier', 'date_format', 'adm/intro.html', 18, false),)), $this); ?>
<h3><?php echo smarty_function_gt(array('s' => 'Escoge una opción para empezar'), $this);?>
</h3>
<table class="datalist" summary="Últimas reservas">
	<caption><?php echo smarty_function_gt(array('s' => 'Últimas reservas'), $this);?>
</caption>
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Nombre'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'País'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Tour'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Fecha'), $this);?>
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
			<td><a href="<?php echo $this->_tpl_vars['admurl']; ?>
reserve.php?id=<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['reserveid']; ?>
" title="<?php echo smarty_function_gt(array('s' => 'Ver reserva'), $this);?>
 '<?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['name']; ?>
'"><?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['name']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['country']; ?>
</td>
			<td><?php echo $this->_tpl_vars['reserves'][$this->_sections['n']['index']]['tourname']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['reserves'][$this->_sections['n']['index']]['freserve'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d %B %Y %H:%m") : smarty_modifier_date_format($_tmp, "%d %B %Y %H:%m")); ?>
</td>
		</tr>
		<?php endfor; else: ?>
		<tr class="tr01">
			<td colspan="4" class="acenter"><?php echo smarty_function_gt(array('s' => 'No hay reservas'), $this);?>
</td>
		</tr>
		<?php endif; ?>
		<tr>
			<td colspan="4"><a href="<?php echo $this->_tpl_vars['admurl']; ?>
reserve.php#lista"><?php echo smarty_function_gt(array('s' => 'Ver todas las reservas'), $this);?>
 &raquo;</a></td>
		</tr>
	</tbody>
</table>

<table class="datalist">
	<caption>Destinos</caption>
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Opción'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Descripción'), $this);?>
</th>
		</tr>
	</thead>
	<tbody>
		<tr class="tr01">
			<td><a href="<?php echo $this->_tpl_vars['admurl']; ?>
destination.php"><?php echo smarty_function_gt(array('s' => 'Destinos'), $this);?>
</a></td>
			<td><?php echo smarty_function_gt(array('s' => 'Añadir, editar, eliminar nuevos Destinos'), $this);?>
</td>
		</tr>
	</tbody>
</table>

<table class="datalist">
	<caption><?php echo smarty_function_gt(array('s' => 'Paquetes'), $this);?>
</caption>
	<thead>
		<tr>
			<th><?php echo smarty_function_gt(array('s' => 'Opción'), $this);?>
</th>
			<th><?php echo smarty_function_gt(array('s' => 'Descripción'), $this);?>
</th>
		</tr>
	</thead>
	<tbody>
		<tr class="tr01">
			<td><a href="<?php echo $this->_tpl_vars['admurl']; ?>
tourtype.php"><?php echo smarty_function_gt(array('s' => 'Tipos de Tour'), $this);?>
</a></td>
			<td><?php echo smarty_function_gt(array('s' => 'Añadir, editar, eliminar nuevos Tipos de Tour'), $this);?>
</td>
		</tr>
		<tr class="tr02">
			<td><a href="<?php echo $this->_tpl_vars['admurl']; ?>
picture.php"><?php echo smarty_function_gt(array('s' => 'Imágenes'), $this);?>
</a></td>
			<td><?php echo smarty_function_gt(array('s' => 'Añadir, editar, eliminar nuevas imágenes'), $this);?>
</td>
		</tr>
		<tr class="tr01">
			<td><a href="<?php echo $this->_tpl_vars['admurl']; ?>
tour.php"><?php echo smarty_function_gt(array('s' => 'Paquetes'), $this);?>
</a></td>
			<td><?php echo smarty_function_gt(array('s' => 'Añadir, editar, eliminar nuevos Paquetes'), $this);?>
</td>
		</tr>
	</tbody>
</table>