<div class="supliers form">
<?php echo $this->Form->create('Suplier'); ?>
	<fieldset>
		<legend><?php echo __('Add Suplier'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('direccion');
		echo $this->Form->input('telefono');
		echo $this->Form->input('rfc');
		echo $this->Form->input('ciudad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Supliers'), array('action' => 'index')); ?></li>
	</ul>
</div>
