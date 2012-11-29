<div class="unities form">
<?php echo $this->Form->create('Unity'); ?>
	<fieldset>
		<legend><?php echo __('Edit Unity'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Unity.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Unity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Unities'), array('action' => 'index')); ?></li>
	</ul>
</div>
