<div class="tasksUsers index">
	<h2><?php echo __('Tasks Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('task_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('worktype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($tasksUsers as $tasksUser): ?>
	<tr>
		<td><?php echo h($tasksUser['TasksUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tasksUser['Task']['title'], array('controller' => 'tasks', 'action' => 'view', $tasksUser['Task']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tasksUser['User']['username'], array('controller' => 'users', 'action' => 'view', $tasksUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tasksUser['Worktype']['name'], array('controller' => 'worktypes', 'action' => 'view', $tasksUser['Worktype']['id'])); ?>
		</td>
		<td><?php echo h($tasksUser['TasksUser']['time']); ?>&nbsp;</td>
		<td><?php echo h($tasksUser['TasksUser']['description']); ?>&nbsp;</td>
		<td><?php echo h($tasksUser['TasksUser']['date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tasksUser['TasksUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tasksUser['TasksUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tasksUser['TasksUser']['id']), null, __('Are you sure you want to delete # %s?', $tasksUser['TasksUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tasks User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Worktypes'), array('controller' => 'worktypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worktype'), array('controller' => 'worktypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
