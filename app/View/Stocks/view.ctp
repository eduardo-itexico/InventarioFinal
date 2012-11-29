<div class="stocks view">
<h2><?php  echo __('Stock'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minimo'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximo'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actual'); ?></dt>
		<dd>
			<?php echo h($stock['Stock']['actual']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Products'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stock['Products']['id'], array('controller' => 'products', 'action' => 'view', $stock['Products']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stock'), array('action' => 'edit', $stock['Stock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stock'), array('action' => 'delete', $stock['Stock']['id']), null, __('Are you sure you want to delete # %s?', $stock['Stock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
