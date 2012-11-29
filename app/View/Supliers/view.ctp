<div class="supliers view">
<h2><?php  echo __('Suplier'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($suplier['Suplier']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($suplier['Suplier']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($suplier['Suplier']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($suplier['Suplier']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rfc'); ?></dt>
		<dd>
			<?php echo h($suplier['Suplier']['rfc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($suplier['Suplier']['ciudad']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Suplier'), array('action' => 'edit', $suplier['Suplier']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Suplier'), array('action' => 'delete', $suplier['Suplier']['id']), null, __('Are you sure you want to delete # %s?', $suplier['Suplier']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Supliers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Suplier'), array('action' => 'add')); ?> </li>
	</ul>
</div>
