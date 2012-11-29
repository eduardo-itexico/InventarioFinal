<div class="sells view">
<h2><?php  echo __('Sell'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtotal'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['subtotal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iva'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['iva']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customers'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sell['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $sell['Customers']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sell['Users']['id'], array('controller' => 'users', 'action' => 'view', $sell['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facturado'); ?></dt>
		<dd>
			<?php echo h($sell['Sell']['facturado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sell'), array('action' => 'edit', $sell['Sell']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sell'), array('action' => 'delete', $sell['Sell']['id']), null, __('Are you sure you want to delete # %s?', $sell['Sell']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sells'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sell'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($sell['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Categories Id'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th><?php echo __('Imagen'); ?></th>
		<th><?php echo __('Unities Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($sell['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['nombre']; ?></td>
			<td><?php echo $product['descripcion']; ?></td>
			<td><?php echo $product['categories_id']; ?></td>
			<td><?php echo $product['precio']; ?></td>
			<td><?php echo $product['imagen']; ?></td>
			<td><?php echo $product['unities_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
