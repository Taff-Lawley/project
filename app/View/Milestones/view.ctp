<div class="milestones view">
<h2><?php  echo __('Milestone'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($milestone['Milestone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($milestone['Milestone']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Date'); ?></dt>
		<dd>
			<?php echo h($milestone['Milestone']['due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($milestone['Milestone']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deliverytype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($milestone['Deliverytype']['name'], array('controller' => 'deliverytypes', 'action' => 'view', $milestone['Deliverytype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($milestone['Project']['name'], array('controller' => 'projects', 'action' => 'view', $milestone['Project']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Milestone'), array('action' => 'edit', $milestone['Milestone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Milestone'), array('action' => 'delete', $milestone['Milestone']['id']), null, __('Are you sure you want to delete # %s?', $milestone['Milestone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliverytypes'), array('controller' => 'deliverytypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deliverytype'), array('controller' => 'deliverytypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tasks'); ?></h3>
	<?php if (!empty($milestone['Task'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Milestone Id'); ?></th>
		<th><?php echo __('Due Date'); ?></th>
		<th><?php echo __('Remarks'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Reporter Id'); ?></th>
		<th><?php echo __('Complete'); ?></th>
		<th><?php echo __('In Progress'); ?></th>
		<th><?php echo __('Tasktitle'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($milestone['Task'] as $task): ?>
		<tr>
			<td><?php echo $task['id']; ?></td>
			<td><?php echo $task['milestone_id']; ?></td>
			<td><?php echo $task['due_date']; ?></td>
			<td><?php echo $task['remarks']; ?></td>
			<td><?php echo $task['title']; ?></td>
			<td><?php echo $task['description']; ?></td>
			<td><?php echo $task['user_id']; ?></td>
			<td><?php echo $task['reporter_id']; ?></td>
			<td><?php echo $task['complete']; ?></td>
			<td><?php echo $task['in_progress']; ?></td>
			<td><?php echo $task['tasktitle']; ?></td>
			<td><?php echo $task['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), null, __('Are you sure you want to delete # %s?', $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
