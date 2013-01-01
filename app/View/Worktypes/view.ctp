<div class="worktypes view">
<h2><?php  echo __('Worktype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($worktype['Worktype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($worktype['Worktype']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Worktype'), array('action' => 'edit', $worktype['Worktype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Worktype'), array('action' => 'delete', $worktype['Worktype']['id']), null, __('Are you sure you want to delete # %s?', $worktype['Worktype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Worktypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worktype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks Users'), array('controller' => 'tasks_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tasks User'), array('controller' => 'tasks_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tasks Users'); ?></h3>
	<?php if (!empty($worktype['TasksUser'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Task Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Worktype Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($worktype['TasksUser'] as $tasksUser): ?>
		<tr>
			<td><?php echo $tasksUser['id']; ?></td>
			<td><?php echo $tasksUser['task_id']; ?></td>
			<td><?php echo $tasksUser['user_id']; ?></td>
			<td><?php echo $tasksUser['worktype_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tasks_users', 'action' => 'view', $tasksUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks_users', 'action' => 'edit', $tasksUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks_users', 'action' => 'delete', $tasksUser['id']), null, __('Are you sure you want to delete # %s?', $tasksUser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tasks User'), array('controller' => 'tasks_users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
