<div class="products view">
<h2><?php  echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($product['Product']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($product['Product']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categories'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Categories']['name'], array('controller' => 'categories', 'action' => 'view', $product['Categories']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($product['Product']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo h($product['Product']['imagen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unities'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Unities']['name'], array('controller' => 'unities', 'action' => 'view', $product['Unities']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Unities'), array('controller' => 'unities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unities'), array('controller' => 'unities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sells'), array('controller' => 'sells', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($product['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Subtotal'); ?></th>
		<th><?php echo __('Iva'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Supliers Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['id']; ?></td>
			<td><?php echo $order['fecha']; ?></td>
			<td><?php echo $order['subtotal']; ?></td>
			<td><?php echo $order['iva']; ?></td>
			<td><?php echo $order['total']; ?></td>
			<td><?php echo $order['supliers_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, __('Are you sure you want to delete # %s?', $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sells'); ?></h3>
	<?php if (!empty($product['Sell'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Subtotal'); ?></th>
		<th><?php echo __('Iva'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Customers Id'); ?></th>
		<th><?php echo __('Users Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Facturado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Sell'] as $sell): ?>
		<tr>
			<td><?php echo $sell['id']; ?></td>
			<td><?php echo $sell['subtotal']; ?></td>
			<td><?php echo $sell['iva']; ?></td>
			<td><?php echo $sell['total']; ?></td>
			<td><?php echo $sell['customers_id']; ?></td>
			<td><?php echo $sell['users_id']; ?></td>
			<td><?php echo $sell['date']; ?></td>
			<td><?php echo $sell['facturado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sells', 'action' => 'view', $sell['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sells', 'action' => 'edit', $sell['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sells', 'action' => 'delete', $sell['id']), null, __('Are you sure you want to delete # %s?', $sell['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sell'), array('controller' => 'sells', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
