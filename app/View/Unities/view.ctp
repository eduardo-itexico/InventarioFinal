<div class="unities view">
<h2><?php  echo __('Unity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unity['Unity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($unity['Unity']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unity'), array('action' => 'edit', $unity['Unity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unity'), array('action' => 'delete', $unity['Unity']['id']), null, __('Are you sure you want to delete # %s?', $unity['Unity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Unities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unity'), array('action' => 'add')); ?> </li>
	</ul>
</div>
