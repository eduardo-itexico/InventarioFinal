
<div class="sells index">
	<h2><?php echo __('Sells'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('subtotal'); ?></th>
			<th><?php echo $this->Paginator->sort('iva'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('customers_id'); ?></th>
			<th><?php echo $this->Paginator->sort('users_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('facturado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($sells as $sell): ?>
	<tr>
		<td><?php echo h($sell['Sell']['id']); ?>&nbsp;</td>
		<td><?php echo h($sell['Sell']['subtotal']); ?>&nbsp;</td>
		<td><?php echo h($sell['Sell']['iva']); ?>&nbsp;</td>
		<td><?php echo h($sell['Sell']['total']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sell['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $sell['Customers']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sell['Users']['id'], array('controller' => 'users', 'action' => 'view', $sell['Users']['id'])); ?>
		</td>
		<td><?php echo h($sell['Sell']['date']); ?>&nbsp;</td>
		<td><?php echo h($sell['Sell']['facturado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sell['Sell']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sell['Sell']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sell['Sell']['id']), null, __('Are you sure you want to delete # %s?', $sell['Sell']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sell'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
