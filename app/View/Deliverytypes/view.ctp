<div class="deliverytypes view">
<h2><?php  echo __('Deliverytype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($deliverytype['Deliverytype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($deliverytype['Deliverytype']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Deliverytype'), array('action' => 'edit', $deliverytype['Deliverytype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Deliverytype'), array('action' => 'delete', $deliverytype['Deliverytype']['id']), null, __('Are you sure you want to delete # %s?', $deliverytype['Deliverytype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Deliverytypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deliverytype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('controller' => 'milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestone'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Milestones'); ?></h3>
	<?php if (!empty($deliverytype['Milestone'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Due Date'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Deliverytype Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($deliverytype['Milestone'] as $milestone): ?>
		<tr>
			<td><?php echo $milestone['id']; ?></td>
			<td><?php echo $milestone['name']; ?></td>
			<td><?php echo $milestone['due_date']; ?></td>
			<td><?php echo $milestone['description']; ?></td>
			<td><?php echo $milestone['deliverytype_id']; ?></td>
			<td><?php echo $milestone['project_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'milestones', 'action' => 'view', $milestone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'milestones', 'action' => 'edit', $milestone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'milestones', 'action' => 'delete', $milestone['id']), null, __('Are you sure you want to delete # %s?', $milestone['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Milestone'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
