<div class="environmentsUsers index">
	<h2><?php echo __('Environments Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('environment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($environmentsUsers as $environmentsUser): ?>
	<tr>
		<td><?php echo h($environmentsUser['EnvironmentsUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($environmentsUser['User']['username'], array('controller' => 'users', 'action' => 'view', $environmentsUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($environmentsUser['Environment']['name'], array('controller' => 'environments', 'action' => 'view', $environmentsUser['Environment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($environmentsUser['Group']['name'], array('controller' => 'groups', 'action' => 'view', $environmentsUser['Group']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $environmentsUser['EnvironmentsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $environmentsUser['EnvironmentsUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $environmentsUser['EnvironmentsUser']['id']), null, __('Are you sure you want to delete # %s?', $environmentsUser['EnvironmentsUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Environments User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Environments'), array('controller' => 'environments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('controller' => 'environments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
