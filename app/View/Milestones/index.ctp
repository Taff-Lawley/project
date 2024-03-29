<div class="milestones index">
	<h2><?php echo __('Milestones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('due_date'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('deliverytype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('project_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($milestones as $milestone): ?>
	<tr>
		<td><?php echo h($milestone['Milestone']['id']); ?>&nbsp;</td>
		<td><?php echo h($milestone['Milestone']['name']); ?>&nbsp;</td>
		<td><?php echo h($milestone['Milestone']['due_date']); ?>&nbsp;</td>
		<td><?php echo h($milestone['Milestone']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($milestone['Deliverytype']['name'], array('controller' => 'deliverytypes', 'action' => 'view', $milestone['Deliverytype']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($milestone['Project']['name'], array('controller' => 'projects', 'action' => 'view', $milestone['Project']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $milestone['Milestone']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $milestone['Milestone']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $milestone['Milestone']['id']), null, __('Are you sure you want to delete # %s?', $milestone['Milestone']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Milestone'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Deliverytypes'), array('controller' => 'deliverytypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deliverytype'), array('controller' => 'deliverytypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
